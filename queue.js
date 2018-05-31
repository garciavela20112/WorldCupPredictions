function Queue() 
{

    this.queue = new Array();
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

