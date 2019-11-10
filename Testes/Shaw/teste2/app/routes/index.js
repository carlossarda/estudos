var api = require('../api'),
    path = require('path');

module.exports  = function(app) {
    
    app.route('/api/users')
        .get(api.lista);

    app.route('/api/users/:userId')
        .get(api.busca)

    app.get('/api/repos', api.listaGrupos)
    app.get('/api/repos/:userId/:reposId', api.listaPorGrupo);
        

    // habilitando HTML5MODE
    app.all('/*', function(req, res) {
        res.sendFile(path.resolve('public/index.html'));
    });
};