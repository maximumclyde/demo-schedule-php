<?php

//the session is started here
//we got the google client object with added scopes
include './config.php';

include './components/functions/createDBConnection.php';

//this includes even the other file in the required
include './login_required/gg_button.php';

//next we'll include the normal authentication methods
include './components/post-functions/normal_login.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Login</title>

    <link rel="stylesheet" href="./styles/bodyStyle.css">
    <link rel="stylesheet" href="./styles/formStyle.css">
    <link rel="stylesheet" href="./styles/formItems.css">
    <link rel="stylesheet" href="./styles/googleButton.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet"> 
</head>
<body>

    <div id="login-form-container">
        <form action="login.php" method="post" id="login-form">

            <div id="form-item-container">
                <div id="form-title" class="form-item">
                    <span id="title">Login your account</span>
                </div>

                <div id="form-email" class="form-item">
                    <label for="email" id="email-label" class="form-label">Email: </label>
                    <input type="email" name="email" id="email" class="form-input">
                </div>

                <div id="form-password" class="form-item">
                    <label for="password" id="password-label" class="form-label">Password: </label>
                    <input type="password" name="password" id="password" class="form-input">
                </div>

                <div id="form-submit" class="form-item">
                    <button type="submit" id="login" name="submit-login">Login</button>
                </div>

                <?php
                
                //this is the case in which the user has logged in
                //in this case we will perform a redirect
                if($google_button == ""){
                    header('Location: ./gg-log.php');
                    exit();
                }else{
                    echo $google_button;
                }
                
                ?>

            </div>

        </form>
    </div>


    <script>
        document.querySelector('#login').addEventListener('submit', ()=>{
            preventDefault();
        })
    </script>
    
</body>
</html>