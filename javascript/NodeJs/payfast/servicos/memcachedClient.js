var Memcached = require('memcached');


function MemcachedClient(){
    return criaMemcachedClient();
}

function criaMemcachedClient(){
    var cliente = new Memcached("192.168.15.4:11211", {
        retries: 10,
        retry: 10000,
        remove: true
    });
    return cliente;
}

module.exports = function(){
    return MemcachedClient;
}
