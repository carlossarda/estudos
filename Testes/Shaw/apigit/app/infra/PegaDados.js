var request = require('request');

function PegaDados() {
	
};

PegaDados.prototype.getUsers = function (callback) {
	// request({
	// 	url: 'https://api.github.com/users',
	// 	headers: {
 //    		'User-Agent': 'carlossarda'
 // 		}
	// }, callback);
	console.log('ola');
	callback();
};

PegaDados.prototype.getUser = function (login,callback) {
	request({
		url: 'https://api.github.com/users/' + login,
		headers: {
    		'User-Agent': 'carlossarda'
 		}
	}, callback);
};

PegaDados.prototype.getRepos = function (login,callback) {
	request({
		url: 'https://api.github.com/users/' + login + '/repos',
		headers: {
    		'User-Agent': 'carlossarda'
 		}
	}, callback);
};

module.exports = function(){
	return PegaDados;
};