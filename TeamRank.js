
//@ts-check

function TeamRank(pc,teamName) {

    this.pc = pc;
    this.teamName = teamName;
   
   this.getPC = function() {
      return this.pc;
   }
   
   this.getTeamName = function() {
      return this.teamName;
   } 
   
   
   this.setPC = function(edit){
      this.percentageChance = edit;
   }
   
   this.setTeamName = function(edit){
      this.teamName = edit; 
   }
     
}
   