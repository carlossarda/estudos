var fs = require("fs");

module.exports = function(app){

    app.post("/upload/imagem", function(req, res){
        console.log("recebendo imagem");

        var nome = req.headers.filename;

        req.pipe(fs.createWriteStream("files/" + nome)).on("finish", function(){
            res.status(201).send("fim");
        });

    });
}