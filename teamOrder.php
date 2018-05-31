<?php
    require 'DB_Connection.php';

    $query = mysqli_query($connection, "SELECT TeamToWin AS team, count(TeamToWin) AS VOTES FROM Prediction_Entries GROUP BY TeamToWin ORDER BY VOTES DESC");
    $rows = array();   
    $results = array();

    foreach($rows as $row) {
        array_push($results, $row['team']);
    }

?>