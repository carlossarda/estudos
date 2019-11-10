var express = require('express');
var load = require('express-load');
var bodyParser = require('body-parser');
var router = express.Router();
var app = express();

module.exports = function(){
	
	app.use(express.static('./app/public'));
	app.use('/js', express.static('./node_modules/jquery/dist'));
	app.use('/angular', express.static('./node_modules/angular'));
	app.use('/angular-route', express.static('./node_modules/angular-route'));
	app.use('/angular-resource', express.static('./node_modules/angular-resource'));
	app.use('/css', express.static('./node_modules/bootstrap/dist/css'));

	load('routes', {cwd: 'app'})
		.then('infra')
		.into(app);


	return app;
};