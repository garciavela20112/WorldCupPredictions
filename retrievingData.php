<?php

require 'DB_connection.php';

$handle = fopen("predictions.csv", "r");
for ($i = 0; $row = fgets($handle); ++$i) {
    if($i != 0) {
       $array = explode(",", $row);
       $teamName = $array{0};
       $numberOfAdditions = ceil($array{sizeOf($array)-1} * 1000);
       echo $numberOfAdditions;// for Alrgeria -- floor(0.00012 * 1000) = 0; and so on.... 
       for($num = 0; $num <= $numberOfAdditions; ++$num){
          $query = "INSERT INTO Prediction_Entries (teamToWin) VALUES('" .$teamName ."')";
           echo $query;
          $result = mysqli_query($connection, $query); 
          if(!$result){
            echo mysqli_errno($connection).": " . mysqli_error($connection);
            echo 'Error';
          } 
       }
    }        
}
fclose($handle);

?>