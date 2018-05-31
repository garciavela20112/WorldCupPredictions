<?php

    $connection =mysqli_connect('localhost','oscar', '1999lGV_2001oGV','WorldCupPredictions','33006');

    //Checking Connection
    if ( mysqli_connect_errno ()) {
            echo "Failed to connnected to MySQL: " . mysqli_connect_error ();
    }
    
?>