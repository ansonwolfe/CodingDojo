function Circle(cx, cy, html_id)
	{
		var html_id = html_id;
		this.info = { 
						cx: cx,  
						cy: cy 
					};
		
		//private function that generates a random number
		var randomNumberBetween = function(min, max){
			return Math.random()*(max-min) + min;
		}

        // random color
		function getRandomColor() {
		    var letters = '0123456789ABCDEF'.split('');
		    var color = '#';
		    for (var i = 0; i < 6; i++ ) {
		        color += letters[Math.round(Math.random() * 15)];
		    }
		    return color;
		}

		this.initialize = function(){
			//give a random velocity for the circle
			this.info.velocity = {
				x: randomNumberBetween(-3,3),
				y: randomNumberBetween(-3,3)
			}

			//create a circle 
			var circle = makeSVG('circle', 
				{ 	cx: this.info.cx,
				  	cy: this.info.cy,
				  	r:  randomNumberBetween(1,20),
				  	id: html_id,
				  	style: "fill: " + getRandomColor()
				});

			document.getElementById('svg').appendChild(circle);
		}

		this.update = function(time){
			var el = document.getElementById(html_id);

			//see if the circle is going outside the browser. if it is, reverse the velocity
			if( this.info.cx > document.body.clientWidth || this.info.cx < 0)
			{
				this.info.velocity.x = this.info.velocity.x * -1;
			}
			if( this.info.cy > document.body.clientHeight || this.info.cy < 0)
			{
				this.info.velocity.y = this.info.velocity.y * -1;
			}

			this.info.cx = this.info.cx + this.info.velocity.x*time;
			this.info.cy = this.info.cy + this.info.velocity.y*time;

			el.setAttribute("cx", this.info.cx);
			el.setAttribute("cy", this.info.cy);
		}

		//creates the SVG element and returns it
		var makeSVG = function(tag, attrs) {
	        var el= document.createElementNS('http://www.w3.org/2000/svg', tag);
	        for (var k in attrs)
	        {
	            el.setAttribute(k, attrs[k]);
	        }
	        return el;
	    }

	    this.initialize();
	}

	function PlayGround()
	{
		var counter = 0;  //counts the number of circles created
		var circles = [ ]; //array that will hold all the circles created in the app

		//a loop that updates the circle's position on the screen
		this.loop = function(){
			for(circle in circles)
			{
				circles[circle].update(1);
			}
		}

		this.createNewCircle = function(x,y){
			var new_circle = new Circle(x,y,counter++);
			circles.push(new_circle);
			// console.log('created a new circle!', new_circle);
		}

		//create one circle when the game starts
		//this.createNewCircle(document.body.clientWidth/2, document.body.clientHeight/2);
	}

	var playground = new PlayGround();
	setInterval(playground.loop, 15);

	document.onclick = function(e) {
		var time_begin = new Date()
		
		// loop over to create 50 circles
		var i = 0;
		while (i < 50){
			playground.createNewCircle(e.x,e.y);
			i++;	
		}
		var time_end = new Date();
		var time_diff = time_end - time_begin;
		console.log('It takes ' + time_diff + ' miliseconds long to make these circles.');
		
	}