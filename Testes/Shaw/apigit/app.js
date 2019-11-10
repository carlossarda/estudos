var app = require('./config/express')();
var http = require('http').Server(app);
 
http.listen(3000, function () {
	var data = new Date();
	console.log("servidor rodando as " + data.getHours() + ':' + data.getMinutes());
});

