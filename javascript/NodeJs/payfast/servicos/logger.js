var winston = require("winston");
var fs = require("fs");

if(!fs.existsSync("logs")){
    fs.mkdirSync("logs");
}

module.exports = winston.createLogger({
    format: winston.format.json(),
    transports: [
        new winston.transports.File({ filename: "logs/payfast.log", level:"info" })
    ]
});

// logger.log({
//     level:"info",
//     message:"hello world mais uma vez"
// });

// logger.info("hello world de outro jeito");