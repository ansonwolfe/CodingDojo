//http server
var http = require('http');
var fs = require('fs');
var url = require('url');

server = http.createServer(function (request, response){
	response.writeHead(200, {'Content-type': 'text/html'});

	var get_text = function (errors, contents){
		response.write(contents);	

		// sample writing data to file
		fs.writeFile('new_file_name.txt', contents, 'utf8', function (){
			response.end();
		});

		//get current date and time
		var currentTime = new Date()

		//lets just log if request.url is equal to '/'
		if(request.url != '/favicon.ico')
		{
			//sample of appending data to file
			fs.appendFile('append.txt', '\r\n updated contents of new_file.txt on '+ currentTime, 'utf8', function (){
				//response.end();
			});
		}

	}

	//sample of read file
	fs.readFile('sample.txt', 'utf8', get_text);
	response.write('reading, writing and appending of text files took so long I will run first');

});
server.listen(8000);
console.log("Running in localhost at port 8000");