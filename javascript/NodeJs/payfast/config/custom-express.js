var express = require("express");
var consign = require('consign');
var bodyparser = require('body-parser');
var expressValidator = require('express-validator');
var morgan = require("morgan");
var logger = require("../servicos/logger");

module.exports = function(){
    var app = express();

    app.use(morgan("common", {
        stream: {
            write: function(mensagem){
                logger.info(mensagem);
            }
        }
    }));

    app.use(bodyparser.urlencoded({extended: true}));
    app.use(bodyparser.json());
    app.use(expressValidator());
    
    consign()
    .include('controllers')
    .then('persistencia')
    .then('servicos')
    // .then('util')
    .into(app);


    return app;
};