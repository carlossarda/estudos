function ProdutosDAO(connection) {
	this._connection = connection;
};


ProdutosDAO.prototype.lista = function (callback) {
	this._connection.query('select * from livros', callback);
};

ProdutosDAO.prototype.salva = function (produto, callback) {
	this._connection.query('insert into livros set ?', produto, callback);
};
ProdutosDAO.prototype.remove = function (id, callback) {
	this._connection.query('delete from livros where id= ?', id, callback);
	
};

// ProdutosDAO.prototype.salva = function (produto, callback) {
//     this._connection.query('insert into produtos (titulo, preco, descricao) values (?, ?, ?)',  [produto.titulo, produto.preco, produto.descricao], callback);
// }

module.exports  = function () {

	return ProdutosDAO;
	
	// return function (connection) {

	// 	return ProdutosBanco;
		
		// this.lista = function (callback) {
		// 	connection.query('select * from livros', callback);
		// };

		// this.remove = function (id, callback) {
		// 	connection.query('delete from livros where id ='+id, callback);
		// };
		// console.log(this);

		// return this;
	// };
};