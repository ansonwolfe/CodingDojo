//Create a function that returns a random nmber between 1 and 255

var Random = function(){
	document.write(Math.floor((Math.random()*255)+1));
	//document.getElementById("random").innerHTML="My First JavaScript Function";
	// document.getElementById("demo").innerHTML="My First JavaScript Function";
	};

	Random();

// Create a function that returns a JS object where there are 3 properties, including a string, number and array

var returnObject = function(){
	var a = {
		str: "something something",
		num: 2342342,
		arr: [1,2,3,4,"hello"]

	}
	console.log(a);
	document.write(a.str, a.num, a.arr);

}
	returnObject();


//function that draws a SVG rectangle
var drawRectangle = function(){
	document.getElementById("drawRectangle");
		var ctx=c.getContext("2d");
		ctx.rect(20,20,150,100);
		ctx.stroke();
}
	drawRectangle();