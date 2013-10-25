//http server
var http = require('http');
var fs = require('fs');
var url = require('url');

server = http.createServer(function (request, response){
	response.writeHead(200, {'Content-type': 'text/html'});

	var write_results = function (errors, contents){
		response.write(contents);	

		fs.writeFile('to_do_basic2.php', contents, 'utf8', function (){
			response.end();
		});
	}

	fs.readFile('ledger.sql', 'utf8', write_results);
	response.write('LOADING Database details...\r\n hi');

});
server.listen(8000);
console.log("Running in localhost at port 8000");