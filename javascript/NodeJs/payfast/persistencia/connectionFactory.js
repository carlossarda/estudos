var mysql = require('mysql');

function createDbConnection() {

	if(!process.env.NODE_ENV){
		return mysql.createConnection({
			host: 'localhost',
			user: 'root',
			password: '',
			database: 'payfast'
		});
	}
};

module.exports = function(){
	return createDbConnection;
}