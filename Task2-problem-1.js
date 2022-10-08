class Node {
    
    constructor(element) {
        this.element = element;
        this.next = null
    }
}

class LinkedList {
    constructor() {
        this.head = null;
        this.size = 0;
    }
 
    
    add(element) {
        var node = new Node(element);
 
        var current;
 
        if (this.head == null)
            this.head = node;
        else {
            current = this.head;
 
            while (current.next) {
                current = current.next;
            }
 
            current.next = node;
        }
        this.size++;
    }
    addLastNodeToNodeAt(index){
        let addressIndex = this.head;
        let lastIndex = this.head;
        while(lastIndex.next){
            if(index == 0){
                addressIndex = lastIndex;
            }
            lastIndex = lastIndex.next;
            index--;
        }
        lastIndex.next = addressIndex;
    }
 
    getHead(){
        return this.head;
    }
    

 
}

function isCyclicOrNot(){
    let s = new Set();
    while(head != null){
        if(s.has(head)){
            return true;
        }
        s.add(head);
        head = head.next;
    }

    return false;

}

 
//case 1
let l1 = new LinkedList();
 
l1.add(3);
l1.add(2);
l1.add(0);
l1.add(-4);
l1.addLastNodeToNodeAt(1);
 

let head = l1.getHead();
console.log(head)
console.log(isCyclicOrNot(head));
console.log("\n\n\n")

//case 2
let l2 = new LinkedList();
 
l2.add(1);
l2.add(2);
l2.addLastNodeToNodeAt(0)
 

head = l2.getHead();

console.log(head)
console.log(isCyclicOrNot(head));
console.log("\n\n\n")

//case3
let l3 = new LinkedList();
 
l3.add(1);


head = l3.getHead();

console.log(head)
console.log(isCyclicOrNot(head));
console.log("\n\n\n")

