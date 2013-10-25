var http = require('http');
var fs = require('fs');

//simple nodejs server

server = http.createServer(function(request, response){
	response.writeHead(200, {'Content-type': 'text/html'});
	response.end('hello world');
});

server.listen(8000);

console.log('Server running at port 8000');

console.log('Hello World');