<?php

include './config.php';

include './components/functions/createDBConnection.php';

$conn = createDBConnection();

$email = $conn->real_escape_string($_SESSION['User_email']);
$name = $conn->real_escape_string($_SESSION['User_name']);
$lname = $conn->real_escape_string($_SESSION['User_lname']);
$pass = strval(time());
$pass = password_hash($pass, PASSWORD_DEFAULT);
$pass = $conn->real_escape_string($pass);

$sql = "SELECT * FROM userdb WHERE User_name = '$name' AND User_lastName = '$lname' AND User_email = '$email';";
$result = $conn->query($sql);

//firstly we check if the user we want to register already exists
if($result){
    if($result->num_rows > 0){ //if there's a user we want to redirect to the login processer
        header('Location: ./gg-log.php');
        exit();
    }else{
        //we register the new user then we perform the login
        $sql = "INSERT INTO userdb (User_name, User_lastName, User_email, User_password) VALUES ('$name', '$lname', '$email', '$pass');";
        $conn->query($sql);
        header('Location: ./gg-log.php');
        exit();
    }
}



?>