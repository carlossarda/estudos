var fs = require("fs");

fs.readFile("./files/universo.jpg", function(err, buffer){
    console.log("arquivo carregado");
    console.log(err);
     
    fs.writeFile("./files/universo2.jpg", buffer, function(erro){
        console.log("arquivo escrito");
        console.log(erro);
    });

});