module.exports = function (app) {
	app.get('/', function (req,res) {
		var connection = app.infra.connectionFactory();

		var produtosDAO = new app.infra.ProdutosDAO(connection); 

		produtosDAO.lista(function (err, results, next) {
			if(err){
				// next(err);
				console.log(err);
				return res.status(500).render('erros/500');
			}
			res.format({
				html: function () {
					res.render("home/index", {livros: results});		
				}
				
			});
			connection.end();
		});
	});
}