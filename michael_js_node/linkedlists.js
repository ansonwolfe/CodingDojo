function Node(x)
{
	this.value = x;
	this.child = undefined;
	this.parent = undefined;
}

function TrainMaster(y)
{
	this.lastNode = new Node(y);

	this.addNodeAtEnd = function(x)
		{
			var new_node = new Node(x)
			this.lastNode.child = new_node
			this.lastNode = new_node //tail of list
		};

	this.insertNode = function(x, fromEnd)
		{
			var new_node = new Node(x)
			this.
		// identify position where to insert = given
		
		// identify child of node prior to position
		
		// create a node call it something_node
		// assign this something_node's child to the child of previous node
		// assign something_node's parent property to previous node
		// change previous nodoe's child to something_node
		// change something_node's parent to something_node
		
	}	
	
}

var master = new TrainMaster(5)

//first node(5)