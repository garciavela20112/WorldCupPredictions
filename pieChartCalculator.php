<?php

    require 'teamPercentages.php';

    $i = 0; 
    foreach($results as $row){
        $i++;
        echo "{ y: ".$row['pc'].", label: '".$row['teamToWin']."' }"; 
        if($i < sizeOf($results)){  
            echo ", ";
        }
    }
    mysqli_close($connection);
    

?>