var app = require('./config/express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

// app.set('view engine', 'ejs');

// var rotasProdutos = require('./app/routes/produtos')(app);

app.set('io', io);


http.listen(3000, function () {
	var data = new Date();
	console.log("servidor rodando as " + data.getHours() + ':' + data.getMinutes());
});

// var app = require('./config/express')();
// var http = require('http').Server(app);
// var io = require('socket.io')(http);    

// app.set('io',io);    

// var porta = process.env.PORT || 3000;
// var server = http.listen(porta, function () {

//     var host = server.address().address;
//     var port = server.address().port;

//     console.log('Example app listening at http://%s:%s', host, port);

// });