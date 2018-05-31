//@ts-check
/* #Usign Queue as Model 
function Queue() 
{
    //variables
    this.queue = new Array();
    //methods
    this.pop=function(){
        return this.queue.shift();
    }
    this.push=function(item){
        this.queue.push(item);
    }
    this.size=function(){
        return this.queue.length;
    }
}

*/
function BinaryMaxHeap() {  //eslint-disable-line no-use-before-define

    //variables
        this.heap = new Array();
        this.heap[0] = new TeamRank(0,null); 
    //methods
    this.insert = function(pc, teamName) { // achieving O(log n) functionality
        

        if(this.heap.length==1) this.heap[1] = new TeamRank(pc,teamName);
        else {
           var newNode = new TeamRank(pc,teamName);
           this.heap.push(newNode);
           let currentNodeIndex = this.heap.length-1;
           this.heapUp(newNode,currentNodeIndex);
 
        }
    
    }
    
    this.heapUp = function(TeamRank, index) {
        var parentIndex = Math.floor(index/2);
        var parentTeamRank = this.heap[parentIndex];
        //alert(parentTeamRank.getPC()); -- just checking!
        if(parentIndex != 0  &&  (TeamRank.getPC() > parentTeamRank.getPC())){ //compare respective teamRank IF parent index is not 0 because
            //this means that the Team has bubbled to the top 
            var curr = this.heap[index];
            this.heap[index] = this.heap[parentIndex];
            this.heap[parentIndex] = curr;
            this.heapUp(TeamRank,parentIndex);
        }
        
    }
    
    this.heapDown = function(TeamRank, index){ // achieving O(log n) functionality
        
        if(2*index > this.heap.length-1 && 2*index+1 > this.heap.length-1) return;
        else if(2*index == this.heap.length-1){
          if(this.heap[2*index].getPC()>TeamRank.getPC()){ //swap and recursively call heapDown 
            this.heap[index] = this.heap[2*index];
            this.heap[2*index] = TeamRank;
            this.heapDown(TeamRank, 2 * index);
          } else return;    
        }
        else{
            if(this.heap[index].getPC() > this.heap[2*index].getPC() && this.heap[index].getPC()>this.heap[2*index+1].getPC()) return;
            else if(this.heap[2*index].getPC()>this.heap[2*index+1].getPC()){ //swap with left child and recursively call heapDown 
                this.heap[index] = this.heap[2*index];
                this.heap[2*index] = TeamRank;
                this.heapDown(TeamRank, 2 * index);
                
            } else { //swap with right child and recursively call heapDown
                this.heap[index] = this.heap[2*index+1];
                this.heap[2*index+1] = TeamRank;
                this.heapDown(TeamRank, 2 * index + 1); 
            } 
        }   
    }
    
    this.remove = function () { //achieving O(log n) functionality
     if(this.heap.lenngth != 1){
         const heapLengthIndex = this.heap.length-1;
         this.heap[1] = this.heap[heapLengthIndex];
         this.heap[heapLengthIndex] = null;
         
         this.heapDown(this.heap[1], 1);    
     }     
    }
    
     this.peek = function() { //achievign O(1) functionality
       if(this.heap.length == 1)
            return null;
       else return this.heap[1];
    }
    
}



