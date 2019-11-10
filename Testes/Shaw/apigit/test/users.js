const express = require('../config/express');

const request = require('supertest');

const app = express();
const agent = request.agent(app);


	agent.get('/api/users')
	// .set('Accept','application/json')
	.expect('Content-Type', /json/)
	.expect(400)
	.end(function(err, res) {
    	
  	});


	// it('#listagem json', done => {
	// 	agent
	// 	.get('/api/users/carlossarda')
	// 	.set('Accept','application/json')
	// 	.expect('Content-Type', /json/)
	// 	.expect(200,done);

	// });

	// it('#listagem json', done => {
	// 	agent
	// 	.get('/api/users/carlossarda/repos')
	// 	.set('Accept','application/json')
	// 	.expect('Content-Type', /json/)
	// 	.expect(200,done);

	// });