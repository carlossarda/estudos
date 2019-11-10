var app = require('./config/custom-express')();

var data = new Date();

app.listen(3000, function(){
    console.log("Servidor rodando na porta 3000 as " + data.getHours() + ":" + data.getMinutes() + ".");
});