<?php

function createDBConnection(){
    $conn = new mysqli("127.0.0.1:3308", "root", "", "generaldb");
    if($conn->connect_error){
        die("Could not connect to the database: ".$conn->error);
    }

    return $conn;
}


?>