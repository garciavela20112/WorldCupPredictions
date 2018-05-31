<?php
 
require 'DB_Connection.php';

    $query = mysqli_query($connection, "SELECT TeamToWin, count(TeamToWin) AS VOTES FROM Prediction_Entries GROUP BY TeamToWin ORDER BY VOTES DESC");

    $rows = array();

    while( $values = mysqli_fetch_array($query)){
        
         array_push($rows,$values);
    }
    //used to calculate total num of votes
    $summedVotes = 0; 
    foreach($rows as $row){ 
        $summedVotes += $row['VOTES'];
    }

    $i = 0;

    
    $results = array();
    
    foreach($rows as $row){
        $i++;
        $percentage = ($row['VOTES']/$summedVotes)*100;
        array_push($results, array("teamToWin" => $row['TeamToWin'], "pc" => $percentage));
        
    }
?>