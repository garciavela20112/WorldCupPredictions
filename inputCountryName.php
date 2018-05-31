<?php

    require 'DB_connection.php';

    $query = mysqli_query($connection, "Select countryName FROM country_names");
    $rows = array();

    while( $values = mysqli_fetch_array($query)){
        
         array_push($rows,$values);
    }
    
    mysqli_close($connection);

?>