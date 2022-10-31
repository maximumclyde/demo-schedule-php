<?php

if(isset($_POST['submit-prof'])){

    $conn = createDBConnection();

    $proftitle = $conn->real_escape_string($_POST['prof-title']);

    $profname = explode(' ', $_POST['prof-name']);
    $name = $profname[0];

    if(sizeof($profname) > 1){
        $lname = $profname[1];
    }
    $name = $conn->real_escape_string($name);
    $lname = $conn->real_escape_string($lname);

    $sql = "INSERT INTO profdb(Prof_name, Prof_lastName, Prof_title, User_ID) 
    VALUES('$name', '$lname', '$proftitle', ".$_SESSION['userid'].");";

    $result = $conn->query($sql);

    header('Location: ./index.php');
    return;

}


?>