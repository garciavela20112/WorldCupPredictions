<?php

    require 'DB_Connection.php';

    $query = mysqli_query($connection, "SELECT COUNT(*) AS QUANTITY FROM country_names");
    $row = mysqli_fetch_assoc($query);
    $quantityTeams = $row['QUANTITY'];

?>