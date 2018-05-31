<?php

    require 'DB_connection.php';

    $date = new DateTime();
  

    $name = $_POST['email'];
    $query1 = mysqli_query($connection, "Select Email FROM Prediction_Entries WHERE Email LIKE '%".$name."%'");
    if(!(mysqli_num_rows($query1) == 0)) {
        $query2  = mysqli_query($connection, "UPDATE Prediction_Entries SET TeamToWin = '".$_POST['countryName']."', Input_Date = '".$date->format('Y-m-d')."' WHERE Email = '".$_POST['email']."'");    
    }
    else {
      $query3 = mysqli_query($connection, "Insert into Prediction_Entries(Email, TeamToWin, Input_Date) VALUES('".$_POST['email']."','".$_POST['countryName']."','".$date->format('Y-m-d')."')");      
    }
    
    mysqli_close($connection);

    header("Refresh:0.1, url=CSProject.php");
?>

