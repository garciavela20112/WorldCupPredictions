<!DOCTYPE html>
<html>

<head>
        <title>World Cup Predictions</title>
        <meta name="description" content="An interactive way of viewing the biggest sporting event of the year: The World Cup">
        <link rel="stylesheet" href="csProjectMain.css">
        <script src="retrievingData.js"></script>
        <script type="text/javascript" src="canvasjs-2.1.2/canvasjs.min.js"></script>
        <script type="text/javascript" src="canvasjs-2.1.2/jquery.canvasjs.min.js"></script>
    
        <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> 
        <script type="text/javascript" src="datastructureFunctionalities.js"></script>
        <script type="text/javascript">
            function createBMH() {
                
                var bmh = new BinaryMaxHeap();
                
                <?php 
                    require 'teamPercentages.php';
                    foreach($results as $row)
                        echo "bmh.insert(".$row['pc'].", '".$row['teamToWin']."');";
                    
                ?> 
                return bmh;
            }
    
        </script>

        <script src="http://d3js.org/d3.v3.min.js"></script>
        <script src="d3/d3.min.js"></script>
        <script type="text/javascript" src="TeamRank.js"></script>
        <script type='text/javascript' src="queue.js"></script>
        <script type='text/javascript' src="BinaryMaxHeap.js"></script>
        

</head>
    
<body>
  
  
    
<div class="profile-image" style="width:40%; float:right;">
 <a href="#"><img src="brazil.png" style="width:100%" /></a>
 <div class="image_hover_bg"></div>
</div>

<!--
<script type="text/javascript"> alert("Welcome to my CS Project. This is my attempt to integrate two things I enjoy, footy and CS. The following is an analysis of user input and data from external databses in various different data structures including tree's, stacks, queues, and even a new way to demonstrate data that I learned: graphic representations"); </script>
-->    

<h1 style='margin-top:0px;'>World Cup Predictions</h1>
<div style="height:100px;"></div>
<h3 id="firstH3">Who's going to win the upcoming world cup? One will never know, but, as we all know, we may as well make our predictions. Please feel free to use this website to make your predictions and view how others around the world view the odds of each respective team.</h3>
    
<ol id="ol1">
    
    <li>The results are calculated using statistics from previous entries! The predictions may not particularly be educated</li>
    <li>Please do not skew the results by selecting your own nation to win every match and the overall tournament </li>
    
</ol>
    
<h3 id="secondH3" style="margin-bottom:0pt;"> Let's start with the big question: Who will win the whole thing?</h3>
<span id="span2">Input your email to make a prediction! If not, no worries, just view other people's guesses below!</span>

    
<form action="insertData.php" method="post" target='_self' id="form1">
   Email:<input id="email" type="text" name="email" class="emailInput">    
  <br/>
  <select name="countryName" id="selector1">
    
    <option value="-1">Select Country...</option>
    

    <?php  include 'inputCountryName.php'; 
      
       foreach($rows as $row) {
         echo "<option value=".$row['countryName'].">".$row['countryName']."</option>";
       }
     ?> 
   </select>
    
    <br/>   
  <input id="submit" type="submit" name="submit">
</form>


 
<br/><br/><br/><br/><br/>
    
<h1 id="top10">Analysis of Prediction Data</h1>
 
    
<!-- 
Here I use a new graphic representation of Data, a pie chart! 
This is not necessarily a new data structure per se, but acts as a way to maninpulate data for desired effect.
To achieve this, I am using a javascript package from CanvasJS that is free for use online. 
-->

    
<div id="chartContainer" style="height: 300px; width: 40%; margin-left:420px; margin-top:30px;">

<script type="text/javascript">
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "World Cup Winner Predictions"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0.00\"%\"",
		indexLabel: "{label} {y}",
		dataPoints: [
            
            <?php include 'pieChartCalculator.php'; ?>
			/*{y: 79.45, label: "Google"},
			{y: 7.31, label: "Bing"},
			{y: 7.06, label: "Baidu"},
			{y: 4.91, label: "Yahoo"},
			{y: 1.26, label: "Others"}
            */
		]
	}]
});
chart.render();
 

//Queue
    var queue = new Queue();
        <?php include 'topTeamPercentages.php';
            foreach($results as $row){
                $percentage = number_format($row['pc'],2);
                 $b = $row['teamToWin']."---".$percentage."%";
                 echo "queue.push('".$b."');";
             }
         ?>   
    var ulist = document.createElement("UL");
        
    var c = queue.size();
    for(var i = 0; i < c; i++){
    var ilist = document.createElement("LI");
    var tlist = document.createTextNode(""+(i+1)+". "+queue.pop());
    ilist.appendChild(tlist);
    ulist.appendChild(ilist);
    };
    var objTo = document.getElementById('queueDiv');
    objTo.appendChild(ulist);
    //document.body.appendChild(ulist);
    
//Creating BMH w/ heapUp()

 var bmh = createBMH();
 var entries = bmh.heap;
    
//Tree Using BMH and D3JS implementation  
var treeData = [
    {
        "name": "Winner: "+entries[1].getTeamName()+" ",
        "parent": "null",
        "children": [
                {
                    "name": "Semifinal 1: "+entries[2].getTeamName()+" ",
                    "parent": "Winner",
                    "children": [
                        {
                            "name": "Quarterfinal 1: "+entries[4].getTeamName()+" ",
                            "parent": "Semifinal A",
                            "children": [
                                {
                                    "name": "Round 16: "+entries[8].getTeamName()+" ",
                                    "parent": "Quarterfinal AA",
                                    "children": [
                                        {
                                            "name": "Round 32: "+entries[16].getTeamName()+" ",
                                            "parent": "Round 16 AAA"
                                        },
                                        {
                                            "name": "Round 32: "+entries[17].getTeamName()+" ",
                                            "parent": "Round 16 AAA"
                                        }
                                    ]
                                },
                                {
"name": "Round 16: "+entries[9].getTeamName()+" ",
"parent": "Quarterfinal AA",
"children": [
{
"name": "Round 32: "+entries[18].getTeamName()+" ",
"parent": "Round 16 AAA"
},
{
"name": "Round 32: "+entries[19].getTeamName()+" ",
"parent": "Round 16 AAA"
}
]
}
]
},
{
"name": "Quarterfinal 2: "+entries[5].getTeamName()+" ",
"parent": "Semifinal A",
"children": [
{
"name": "Round 16: "+entries[10].getTeamName()+" ",
"parent": "Quarterfinal AA",
"children": [
{
"name": "Round 32: "+entries[20].getTeamName()+" ",
"parent": "Round 16 AAA"
},
{
"name": "Round 32: "+entries[21].getTeamName()+" ",
"parent": "Round 16 AAA"
}
]
},
{
"name": "Round 16: "+entries[11].getTeamName()+" ",
"parent": "Quarterfinal AA",
"children": [
{
"name": "Round 32: "+entries[22].getTeamName()+" ",
"parent": "Round 16 AAA"
},
{
"name": "Round 32: "+entries[23].getTeamName()+" ",
"parent": "Round 16 AAA"
}
]
}
]
}
]
},
{
"name": "Semifinal 2: "+entries[3].getTeamName()+" ",
"parent": "Winner",
"children": [
{
"name": "Quarterfinal 3: "+entries[6].getTeamName()+" ",
"parent": "Semifinal A",
"children": [
{
"name": "Round 16: "+entries[12].getTeamName()+" ",
"parent": "Quarterfinal AA",
"children": [
{
"name": "Round 32: "+entries[24].getTeamName()+" ",
"parent": "Round 16 AAA"
},
{
"name": "Round 32: "+entries[25].getTeamName()+" ",
"parent": "Round 16 AAA"
}
]
},
{
"name": "Round 16: "+entries[13].getTeamName()+" ",
"parent": "Quarterfinal AA",
"children": [
{
"name": "Round 32: "+entries[26].getTeamName()+" ",
"parent": "Round 16 AAA"
},
{
"name": "Round 32: "+entries[27].getTeamName()+" ",
"parent": "Round 16 AAA"
}
]
}
]
},
{
"name": "Quarterfinal 4: "+entries[7].getTeamName()+" ",
"parent": "Semifinal A",
"children": [
{
"name": "Round 16: "+entries[14].getTeamName()+" ",
"parent": "Quarterfinal AA",
"children": [
{
"name": "Round 32: "+entries[28].getTeamName()+" ",
"parent": "Round 16 AAA"
},
{
"name": "Round 32: "+entries[29].getTeamName()+" ",
"parent": "Round 16 AAA"
}
]
},
{
"name": "Round 16: "+entries[15].getTeamName()+" ",
"parent": "Quarterfinal AA",
"children": [
{
"name": "Round 32: "+entries[30].getTeamName()+" ",
"parent": "Round 16 AAA"
},
{
"name": "Round 32: "+entries[31].getTeamName()+" ",
"parent": "Round 16 AAA"
}
]
}
]
}

]
}
]
}
];


// ************** Generate the tree diagram	 *****************
var margin = {top: 20, right: 80, bottom: 20, left: 90},
	width = 960 - margin.right - margin.left,
	height = 500 - margin.top - margin.bottom;
	
var i = 0,
	duration = 750,
	root;

var tree = d3.layout.tree()
	.size([height, width]);

var diagonal = d3.svg.diagonal()
	.projection(function(d) { return [d.y, d.x]; });

var svg = d3.select("body").append("svg")
	.attr("width", width + margin.right + margin.left)
	.attr("height", height + margin.top + margin.bottom)
  .append("g")
	.attr("transform", "translate(" + margin.left + "," + margin.top + ")");

root = treeData[0];
root.x0 = height / 2;
root.y0 = 0;
  
update(root);

d3.select(self.frameElement).style("height", "500px");

function update(source) {

  // Compute the new tree layout.
  var nodes = tree.nodes(root).reverse(),
	  links = tree.links(nodes);

  // Normalize for fixed-depth.
  nodes.forEach(function(d) { d.y = d.depth * 180; });

  // Update the nodes…
  var node = svg.selectAll("g.node")
	  .data(nodes, function(d) { return d.id || (d.id = ++i); });

  // Enter any new nodes at the parent's previous position.
  var nodeEnter = node.enter().append("g")
	  .attr("class", "node")
	  .attr("transform", function(d) { return "translate(" + source.y0 + "," + source.x0 + ")"; })
	  .on("click", click);

  nodeEnter.append("circle")
	  .attr("r", 1e-6)
	  .style("fill", function(d) { return d._children ? "lightsteelblue" : "#fff"; });

  nodeEnter.append("text")
	  .attr("x", function(d) { return d.children || d._children ? -13 : 13; })
	  .attr("dy", ".35em")
	  .attr("text-anchor", function(d) { return d.children || d._children ? "end" : "start"; })
	  .text(function(d) { return d.name; })
	  .style("fill-opacity", 1e-6);

  // Transition nodes to their new position.
  var nodeUpdate = node.transition()
	  .duration(duration)
	  .attr("transform", function(d) { return "translate(" + d.y + "," + d.x + ")"; });

  nodeUpdate.select("circle")
	  .attr("r", 10)
	  .style("fill", function(d) { return d._children ? "lightsteelblue" : "#fff"; });

  nodeUpdate.select("text")
	  .style("fill-opacity", 1);

  // Transition exiting nodes to the parent's new position.
  var nodeExit = node.exit().transition()
	  .duration(duration)
	  .attr("transform", function(d) { return "translate(" + source.y + "," + source.x + ")"; })
	  .remove();

  nodeExit.select("circle")
	  .attr("r", 1e-6);

  nodeExit.select("text")
	  .style("fill-opacity", 1e-6);

  // Update the links…
  var link = svg.selectAll("path.link")
	  .data(links, function(d) { return d.target.id; });

  // Enter any new links at the parent's previous position.
  link.enter().insert("path", "g")
	  .attr("class", "link")
	  .attr("d", function(d) {
		var o = {x: source.x0, y: source.y0};
		return diagonal({source: o, target: o});
	  });

  // Transition links to their new position.
  link.transition()
	  .duration(duration)
	  .attr("d", diagonal);

  // Transition exiting nodes to the parent's new position.
  link.exit().transition()
	  .duration(duration)
	  .attr("d", function(d) {
		var o = {x: source.x, y: source.y};
		return diagonal({source: o, target: o});
	  })
	  .remove();

  // Stash the old positions for transition.
  nodes.forEach(function(d) {
	d.x0 = d.x;
	d.y0 = d.y;
  });
}

// Toggle children on click.
function click(d) {
  if (d.children) {
	d._children = d.children;
	d.children = null;
  } else {
	d.children = d._children;
	d._children = null;
  }
  update(d);
}

} 
</script>  
</div>
    
 <ol id="ol2wDB_Connection"><b>Evidently, <?php
     
     require 'DB_Connection.php';

    $query = mysqli_query($connection, "SELECT TeamToWin, count(TeamToWin) AS VOTES FROM Prediction_Entries GROUP BY TeamToWin ORDER BY VOTES DESC");

    $rows = array();

    while( $values = mysqli_fetch_array($query)){
        
         array_push($rows,$values);
    }
    
     echo $rows[0]['TeamToWin'];
     
     ?> is the most likely to win!</b>
    
</ol>   
    
 
<br/><br/><br/>
 
    <!-- Data Structure #2: Queue with top 10 teams ordered 
-->
  
 <div id="queueDiv">
    <h1 id="top10">Top 10 Most Likely Teams to Win</h1>
 </div>  
    
<!--
Data Structure #3: BinaryMaxHeap's Displayed as Tree using JQUery 
Please View the Following:
1. TeamRank.js -- Objects to be stored in heap
2. BinaryMaxHeap.js -- Has heapDown(), heapUp(), insert(), and remove() -- inset() and remove() have O(log n) functionnality so
the Binary Max Heap is optimized 
--> 
 <div id="mapDiv"> 
    <h1 id="top10">Tree Representation</h1>
</div>   

</body>
</html>