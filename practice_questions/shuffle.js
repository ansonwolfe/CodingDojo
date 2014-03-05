var array = [3,5,7,1,8,4]; 
var newArr = [];
var j = array.length

function shuffle(array) {
	for (i = 0; i < j; i++){
	
		function Rand(){
			Math.floor(Math.random()* i +1);
		};

	if (newArr[Rand] == "") 
	  newArr[Rand] = array[i];
	else
		Rand();
	};

	return newArr;

};
	console.log(shuffle(array))
