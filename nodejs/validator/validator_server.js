var http = require("http");
var url = require("url"); 
var fs = require("fs");
var querystring = require("querystring");
var Validator = require('validator').Validator;
var mysql = require('mysql');

//create database connection
var db = mysql.createConnection({
	user: 'root',
	password: 'root',
	database: 'ledger'
});


//catch all errors into this._errors array
Validator.prototype.error = function (msg) {
    this._errors.push(msg);
    return this;
	}

//returns all errors from this._errors array
Validator.prototype.getErrors = function () {
    return this._errors;
}

http.createServer(function(request, response) {  
	//get current url being visited by the user
    var url_request = url.parse(request.url).pathname;  
	
	//if requested url is /validate run validator
    if(url_request === "/validate") {  
    	//get information being pass in the url
		var data_query = url.parse(request.url).query;
		var form_data = querystring.parse(data_query);

		var validator = new Validator();
		validator.check(form_data.first_name).isAlpha();
		validator.check(form_data.last_name).isAlpha();
		validator.check(form_data.email).isEmail();

	// get errors from validation checks
		var errors = validator.getErrors();


	// if no errors, add the name to db and store new user saved message to errors
		if (errors.length == 0) {
			db.query("INSERT INTO clients (`first_name`, `last_name`, `email`, `created_at`) VALUES ('" + form_data.first_name + "', '" +form_data.last_name + "', '" + form_data.email + "', NOW());");
			
			errors.push("Client has been added.");
		};

	//  pass the errors out
		response.end(JSON.stringify(errors));  			
    }  
    else {  
    	// loading files and routing
		var file_path = ""
		var mimes         = {
								'css':  'text/css',
								'js':   'text/javascript',
								'htm':  'text/html',
								'html': 'text/html',
								'ico':  'image/vnd.microsoft.icon'
							}
							
		var tmp           = url_request.lastIndexOf(".")
		var ext           = url_request.substring((tmp + 1))
		
		if (ext == 'css' || ext == 'js' || ext == 'ico' || ext == 'png' || ext == 'jpg')
			file_path = url_request.replace("/", "");
		else
		{
			if(url_request == "/" || url_request == "/index_validator.html")
				file_path = "index_validator.html"
		}
		
		fs.readFile(file_path, function(error, data){
			if(error)
			{
				response.writeHeader(500, {"Content-Type": "text/html"});  
				response.write("<h1>Internal Server Error!</h1>");    
			}
			else
			{
				response.writeHeader(200, {"Content-Type": mimes[ext]});  
				response.write(data);
			}

			response.end();  
		});
    }  
}).listen(8080);  
  
console.log("Server running at http://localhost:8080/"); 
