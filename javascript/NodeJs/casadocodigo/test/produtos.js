const express = require('../config/express');
var DatabaseCleaner = require('database-cleaner');


// var request = require('supertest')(express);

const request = require('supertest');

describe('#ProdutosController', function () {
	const app = express();
	const agent = request.agent(app);
	var databaseCleaner = new DatabaseCleaner('mysql');


	beforeEach( done => {
		var conn = app.infra.connectionFactory();

		databaseCleaner.clean(conn, (err, results) => {
			if(!err){
				done();
			}else{
				console.log(err);
			}
		});
	});

	if(process.env.NODE_ENV == 'test'){
		console.log('Usando ambiente de teste');
	};

	it('#listagem json', done => {
		agent
		.get('/produtos')
		.set('Accept','application/json')
		.expect('Content-Type', /json/)
		.expect(200,done);

	});

	it('#cadastro dados inválidos', done =>{
		agent.post('/produtos')
		.send({
			titulo:'',
			descricao:'novo livro',

		})
		.expect(400,done);
	});

	it('#cadastro dados válidos', done =>{
		agent.post('/produtos')
		.send({
			titulo:'teste mocha',
			preco:'110.03',
			descricao:'novo livro'

		})
		.expect(302,done);
	});
});