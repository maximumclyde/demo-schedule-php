<?php

if(isset($_POST['submit-register'])){
    
    $conn = createDBConnection();

    //if the two passwords are different 
    if(strcmp($_POST['password'], $_POST['password-2']) != 0){
        $conn->close();
        header('Location: ./register.php');
        return;
    }else{
        $email = $conn->real_escape_string($_POST['email']);
        //we chech if there is another user with this email
        $sql = "SELECT * FROM userdb WHERE User_email = '$email';";
        $result = $conn->query($sql);
        if($result->num_rows == 0){
            $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $pass = $conn->real_escape_string($pass);

            $name = $conn->real_escape_string($_POST['name']);
            $lname = $conn->real_escape_string($_POST['lname']);

            //if there is noone registered with this email
            $sql = "INSERT INTO userdb (User_name, User_lastName, User_email, User_password) 
            VALUES ('$name', '$lname', '$email', '$pass');";
            $conn->query($sql);

            $sql = "SELECT User_ID FROM userdb WHERE User_email = '$email';";
            $result2 = $conn->query($sql);
            if($result2){
                $r = $result2->fetch_assoc();
                $_SESSION['userid'] = $r['User_ID'];
            } 

            $conn->close();
            header("Location: ../calendar/redirect.php");
            exit();

        }else{
            $conn->close();
            header('Location: ./login.php');
            exit();

        }

    }
}

?>