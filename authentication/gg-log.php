<?php

include './config.php';

include './components/functions/createDBConnection.php';

$conn = createDBConnection();

$email = $conn->real_escape_string($_SESSION['User_email']);
$name = $conn->real_escape_string($_SESSION['User_name']);
$lname = $conn->real_escape_string($_SESSION['User_lname']);

$sql = "SELECT * FROM userdb WHERE User_name = '$name' AND User_lastName = '$lname' AND User_email = '$email';";
$result = $conn->query($sql);

if($result){

    if($result->num_rows > 0){ //if the user exists
        foreach($result as $r){
            $_SESSION['userid'] = $r['User_ID'];
        }
        //we redirect the user to the calendar page
        header('Location: ../calendar/redirect.php');
        exit();
    }else{ //the user doesen't appear
        //we redirect to the register page
        header('Location: ./gg-reg.php');
        exit();

    }

}



?>