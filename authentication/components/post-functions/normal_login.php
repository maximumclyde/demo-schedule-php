<?php

if(isset($_POST['submit-login'])){

    $conn = createDBConnection();

    $pass = $_POST['password'];

    $email = $conn->real_escape_string($_POST['email']);

    $result = $conn->query("SELECT * FROM userdb WHERE User_email = '$email';");

    if($result){
        $row = $result -> fetch_assoc();
        if(password_verify($pass, $row['User_password']) == TRUE){
            $_SESSION['User_name'] = $row['User_name'];
            $_SESSION['userid'] = $row['User_ID'];
            $_SESSION['User_lname'] = $row['User_lastName'];

            $conn->close();
            header("Location: ../calendar/redirect.php");
            exit();
        }
    }
    
    $conn->close();

    header("Location: ./login.php");
    return;

}

?>