var soap = require('soap');

function ServicosCorreios(){
    this._url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.asmx?wsdl";
}

ServicosCorreios.prototype.calculaPrazo = function(options, callback){
        soap.createClient(this._url, function(err, client){
            if(err) console.log(err);
            client.CalcPrazo(options, callback);
        });
}

module.exports = function(){
    return ServicosCorreios;
}
