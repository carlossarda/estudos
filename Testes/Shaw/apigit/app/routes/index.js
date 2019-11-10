module.exports = function (app) {
	app.get('/api/users', function (req,res) {
		var pegaDados = new app.infra.PegaDados();

		pegaDados.getUsers(function (err,results,next) {
			// var parse = JSON.parse(results.body);
			console.log(results);
			// res.render("/app/public/index.html", { usuarios: parse });
			res.render("./partials/");
			
		});
	});

	app.get('/api/users/:userLogin/details', function (req,res) {
		var pegaDados = new app.infra.PegaDados();
		pegaDados.getUser(req.params.userLogin, function (err,results,next) {
			var parse = JSON.parse(results.body);
			console.log(parse);
			// res.render("home/users", { usuarios: parse });
			
		});
	});

	app.get('/api/users/:userLogin/repos', function (req,res) {
		var pegaDados = new app.infra.PegaDados();
		pegaDados.getRepos(req.params.userLogin, function (err,results,next) {
			var parse = JSON.parse(results.body);
			console.log(parse);
			// res.render("home/users", { usuarios: parse });
			
		});
	});

	app.get('/', function (req,res) {

		res.render("index.html");
			
	});

	app.get('/modules', function (req,res) {

		res.render("");
			
	});

};