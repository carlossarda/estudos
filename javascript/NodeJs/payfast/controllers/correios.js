module.exports = function(app){
    app.get("/correios", (req,res)=>{
        res.send("correios está ok.");
    });

    app.post('/correios/prazo', (req,res)=>{
        
        var correios = new app.servicos.correiosSoapClient();

        var dadosEntrega = req.body;

        correios.calculaPrazo(dadosEntrega, function(erro,retorno){
            if(erro){
                res.status(500).send(erro);
                return;
            }else{
                res.status(200).json(retorno.CalcPrazoResult.Servicos.cServico);
                return;
            }
        });

    });
};