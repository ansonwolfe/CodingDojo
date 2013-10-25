var mysql = require('mysql');

//create database connection
var db = mysql.createConnection({
	user: 'root',
	password: 'root',
	database: 'ledger'
});

get_clients = function (errors, results, fields) {
	results.forEach(function (result){
		console.log(result.first_name + ' ' + result.last_name + ' ' + result.email);
	})
}

db.query('SELECT * FROM clients', get_clients);

