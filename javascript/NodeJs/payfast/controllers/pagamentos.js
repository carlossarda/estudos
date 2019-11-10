var defineHateoas = function (res, pagamento){
    res.location('/pagamentos/pagamento/' + pagamento.id);
        // wrapper
        var response = {
            dados_do_pagamento : pagamento,
        // define o hateoas
            links: [
                {
                    href: "http://localhost:3000/pagamentos/pagamento/" + pagamento.id,
                    rel:"confirmar",
                    method: "PUT"
                },
                {
                    href: "http://localhost:3000/pagamentos/pagamento/" + pagamento.id,
                    rel:"cancelar",
                    method: "DELETE"
                }
            ]
        };
    return response;
}

var logger = require("../servicos/logger.js");

module.exports = function(app){
    app.get('/pagamentos', (req,res)=>{
        console.log("ok");
        res.send("Parece ok mesmo.");
    });

    app.get('/pagamentos/pagamento/:id', function (req, res){

        var id = req.params.id;

        var memcachedClient = new app.servicos.memcachedClient();

        memcachedClient.get("pagamento-" + id, function(erro, retorno){
            if(erro | !retorno){
                console.log("MISS - chave não encontrada");
                
                logger.info("MISS - chave " + id + " não encontrada");

                

                var connection = app.persistencia.connectionFactory();

                var pagamentoDao = new app.persistencia.PagamentoDAO(connection);

                pagamentoDao.consultaId(id, function(erro, result){
                    if(erro){
                        console.log(erro);
                        res.status(500).send(erro);
                        return;
                    }else{

                        memcachedClient.set("pagamento-" + result[0].id, result[0], 60, function(erro){
                            if(erro){
                                console.log(erro);
                            }else{
                                console.log("nova chave adicionada");
                            }
                        });

                        console.log("consulta executada com sucesso");
                        res.json(result[0]);
                    }
                });
            }else{
                console.log("HIT - valor: " + JSON.stringify(retorno));
                res.json(retorno);
            }
        });

        
    });


    app.put('/pagamentos/pagamento/:id', (req, res)=>{
        var id = req.params.id;

        var pagamento = {};
        
        var connection = app.persistencia.connectionFactory();
        
        var pagamentoDao = new app.persistencia.PagamentoDAO(connection);

        var memcachedClient = new app.servicos.memcachedClient();

        pagamento.id = id;
        pagamento.status = 'confirmado';

        pagamentoDao.atualiza(pagamento, function(err){
            if(err){
                console.log(err);
                res.status(500).send(err);
                return;
            }else{
                pagamentoDao.consultaId(id, function(erro, result){
                    if(erro){
                        console.log(erro);
                        res.status(500).send(erro);
                        return;
                    }else{
                        memcachedClient.set("pagamento-" + result[0].id, result[0], 60, function(erro){
                            if(erro){
                                console.log(erro);
                            }else{
                                console.log("nova chave adicionada");
                            }
                        });
                    }
                });

                res.send(pagamento);
            }
            
        });
        
    });

    app.delete('/pagamentos/pagamento/:id', (req, res)=>{
        var id = req.params.id;

        var pagamento = {};

        pagamento.id = id;
        pagamento.status = 'cancelado';

        var connection = app.persistencia.connectionFactory();

        var pagamentoDao = new app.persistencia.PagamentoDAO(connection);

        pagamentoDao.atualiza(pagamento, function(err){
            if(err){
                console.log(err);
                res.status(500).send(err);
                return;
            }else{
                console.log("pagamento com id = " + id + " cancelado com sucesso");
                res.status(204).send(pagamento);
            }            
            
        });
        
    });

    app.post('/pagamentos/pagamento', (req, res) => {

        req.assert("pagamento.forma_de_pagamento", "forma de pagamento invalida").notEmpty();

        req.assert("pagamento.valor", "nao pode ser vazio ou deve ter valor decimal").notEmpty().isFloat();

        var erros = req.validationErrors();

        if(erros){
            console.log("erros de validacao encontrados");
            res.status(400).send(erros);
            return;
        }

        var pagamento = req.body["pagamento"];
        console.log("processando pagamento");

        pagamento.status = "criado";
        pagamento.data = new Date;

        var connection = app.persistencia.connectionFactory();

        var pagamentoDao = new app.persistencia.PagamentoDAO(connection);

        pagamentoDao.salva(pagamento, function(err, result){
            if(err){
                console.log(err);
                res.status(500).send(err);
            }else{

                pagamento.id = result.insertId;

                console.log('pagamento criado no db');

                var memcachedClient = app.servicos.memcachedClient();

                memcachedClient.set("pagamento-" + pagamento.id, pagamento, 60, function(erro){
                    if(erro){
                        console.log(erro);
                    }else{
                        console.log("nova chave adicionada");
                    }
                });

                if(pagamento.forma_de_pagamento == "cartao"){
                    
                    var cartao = req.body["cartao"];;

                    var apiCartao = new app.servicos.cartoesClient();

                    apiCartao.autoriza(cartao, function(erro, request, response, retorno){

                        if(!erro && retorno.dados_do_cartao.status == "AUTORIZADO"){
                            
                            pagamento.status = "confirmado";

                            pagamento.cartao = retorno;
                            
                            console.log("pagamento com cartao autorizado");

                            pagamentoDao.atualiza(pagamento, function(error, result){
                                if(error){
                                    console.log(error);
                                }
                            });

                            var response = defineHateoas(res, pagamento);

                            res.status(201).json(response);
                            return;
                        
                        }else{
                            console.log("pagamento com cartao nao autorizado");
                            console.log(erro);
                            res.status(400).json(retorno);
                            return;
                        }
                    });

                }else{

                    var response = defineHateoas(res, pagamento);
    
                    res.status(201).json(response);

                    return;
                }
            }
            
        });
    });
};