var fs = require("fs");
var arquivo = process.argv[2];

fs.createReadStream(arquivo)
.pipe(fs.createWriteStream("stream-" + arquivo))
.on("finish", function(){
    console.log("terminou");
});