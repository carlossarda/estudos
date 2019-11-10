// var connectionFactory = require('../infra/connectionFactory');
// Factory Method
module.exports = function(app){
	app.get('/produtos', function(req, res, next){
		// res.send("<html><body><h1>Listando os produtos</h1></body></html>");
		// var connection = connectionFactory();
		var connection = app.infra.connectionFactory();

		var produtosDAO = new app.infra.ProdutosDAO(connection); 

		produtosDAO.lista(function (err, results) {
			if(err){
				return next(err);
			}
			res.format({
				html: function () {
					res.render("produtos/lista", {lista: results});		
				},
				json: function () {
					res.json(results);
				}
			});
			
		});

		connection.end();
		// res.render("produtos/lista");
	});

	// app.get('/produtos/json', function(req, res){
	// 	// res.send("<html><body><h1>Listando os produtos</h1></body></html>");
	// 	// var connection = connectionFactory();
	// 	var connection = app.infra.connectionFactory();

	// 	var produtosDAO = new app.infra.ProdutosDAO(connection); 

	// 	produtosDAO.lista(function (err, results) {
	// 		res.json(results);
	// 	});

	// 	// connection.end();
	// 	// res.render("produtos/lista");
	// });

	app.get('/produtos/form', function(req, res){
		res.render('produtos/form', {errosValidacao: {}, produto:{}});

	});

	app.post('/produtos', function(req, res){

		var produto = req.body;

		// var validadorTitulo = req.assert('titulo', 'Titulo é obrigatório');

		// validadorTitulo.notEmpty();

		req.assert('titulo', 'Titulo é obrigatório').notEmpty();
		req.assert('preco', 'Formato inválido').isFloat();

		var erros = req.validationErrors();

		if(erros){
			// console.log(erros);

			res.format({
				html: function () {
					res.status(400).render('produtos/form', {errosValidacao: erros, produto: produto});
				},
				json: function () {
					res.status(400).json(erros);
				}
			});
			
			return;
		}

		var connection = app.infra.connectionFactory();

		var produtosDAO = new app.infra.ProdutosDAO(connection);

		produtosDAO.salva(produto, function (err, results) {
			// console.log(err);
			res.redirect('/produtos');
		});

		connection.end();
	});

	app.get('/produtos/:id', function(req, res){
		var id = req.params.id;

		var connection = app.infra.connectionFactory();

		var produtosDAO = new app.infra.ProdutosDAO(connection);

		console.log(id);

		produtosDAO.remove(id, function (err, results) {
			console.log(err);
			console.log(results);
			res.redirect('/produtos');
		});

		connection.end();

	});

};