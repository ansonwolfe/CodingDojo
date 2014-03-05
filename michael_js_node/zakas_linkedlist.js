var firstNode = {
    data: 12,
    next: null
};
//attach to first node to create list
firstNode.next = {
    data: 99,
    next: null
};

function LinkedList() {
    this._length = 0;
    this._head = null;
}
LinkedList.prototype = {

    add: function (data){

        //create a new node, place data in
        var node = {
                data: data,
                next: null
            },

            //used to traverse the structure
            current;

        //special case: no items in the list yet
        if (this._head === null){
            this._head = node;
        } else {
            current = this._head;

            while(current.next){
                current = current.next;
            }

            current.next = node;
        }

        //don't forget to update the count
        this._length++;

    },

    //more methods here
};

LinkedList.prototype = {
    //more methods

    item: function(index){

        //check for out-of-bounds values
        if (index > -1 && index < this._length){
            var current = this._head,
                i = 0;

            while(i++ < index){
                current = current.next;
            }

            return current.data;
        } else {
            return null;
        }
    },

    //more methods here
};

LinkedList.prototype = {
    //more methods

    remove: function(index){

        //check for out-of-bounds values
        if (index > -1 && index < this._length){

            var current = this._head,
                previous,
                i = 0;

            //special case: removing first item
            if (index === 0){
                this._head = current.next;
            } else {

                //find the right location
                while(i++ < index){
                    previous = current;
                    current = current.next;
                }

                //skip over the item to remove
                previous.next = current.next;
            }

            //decrement the length
            this._length--;

            //return the value
            return current.data;            

        } else {
            return null;
        }

    },

    //more methods here
};

var list = new LinkedList();
list.add("red");
list.add("orange");
list.add("yellow");

alert(list.item(1));   //"orange"

list.remove(1);

alert(list.item(1));   //"yellow"