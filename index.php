<?php

session_start();

if(isset($_POST['login'])){
    header('Location: ./authentication/login.php');
    exit();
}

if(isset($_POST['register'])){
    header('Location: ./authentication/register.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="./index.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet"> 

</head>
<body>

    <!--THIS IS THE NAV COMPONENT-->
    <div class="nav-container">

        <div class="nav-elements-container">
            <div class="nav-title-container">
                <span id="nav-title">Test App</span>
            </div>
        </div>
    </div>


    <div class="center-box-container">
        <div class="letter-display-container" id="letters-1">
            <ul class="dynamic-text">
                <li></li>
            </ul>
        </div>

        <div class="form-container">
            <span id="form-title">Get started: </span>
            <div class="button-section">
                <form action="index.php" method="post">
                    <button type="submit" name="login" id="login">Login</button>
                </form>
                
                <form action="index.php" method="post">
                    <button type="submit" name="register" id="register">Register</button>
                </form>
            </div>
        </div>

    </div>
    

    <script src="./index.js"></script>
    <script>
        const regButton = document.querySelector('#register');
        const logButton = document.querySelector('#login');

        regButton.addEventListener('submit', ()=>{
            preventDefault();
        });

        logButton.addEventListener('submit', ()=>{
            preventDefault();
        });
    </script>
    
</body>
</html>