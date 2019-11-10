module.exports = function (app) {
	app.get('/promocoes/form', function (req,res) {
		var connection = app.infra.connectionFactory();

		var produtosDAO = new app.infra.ProdutosDAO(connection); 

		produtosDAO.lista(function (err, results) {
			if(err){
				res.status(500).render('erros/500');
				return next(err);
			}
			res.format({
				html: function () {
					res.render("promocoes/form", {lista: results});		
				}
				
			});
		});
	});


	app.post('/promocoes', function(req, res){

		var promocao = req.body;

		console.log(req.body.livro.id);

		app.get('io').emit('novaPromocao', promocao);

		res.redirect('/promocoes/form');
	});
};