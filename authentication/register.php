<?php

//the session is started here
//we got the google client object with added scopes
include './config.php';

include './components/functions/createDBConnection.php';

//this includes even the other file in the required
include './login_required/gg_button.php';

//next we'll include the normal authentication methods
include './components/post-functions/normal-register.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Register</title>

    <link rel="stylesheet" href="./styles/bodyStyle.css">
    <link rel="stylesheet" href="./styles/formStyle.css">
    <link rel="stylesheet" href="./styles/formItems.css">
    <link rel="stylesheet" href="./styles/googleButton.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet"> 

</head>
<body>
    
    <div id="register-form-container">
        <form action="register.php" method="post" id="register-form">

            <div id="form-item-container">

                <div id="form-title">
                    <span id="title">Register as a new user</span>
                </div>

                <div class="given-name-container">
                    <div id="form-name given-name">
                        <input type="text" name="name" id="name" class="form-input" placeholder="Name">
                    </div>
    
                    <div id="form-lname given-name">
                        <input type="text" name="lname" id="lname" class="form-input" placeholder="Last Name">
                    </div>
                </div>

                <div id="form-email" class="form-item">
                    <label for="email" id="email-label" class="form-label">Email: </label>
                    <input type="email" name="email" id="email" class="form-input">
                </div>

                <div id="form-password" class="form-item">
                    <label for="password" id="password-label" class="form-label">Password: </label>
                    <input type="password" name="password" id="password" class="form-input">
                </div>

                <div id="form-password-2" class="form-item">
                    <label for="password-2" id="password-label-2" class="form-label">Reenter your password: </label>
                    <input type="password" name="password-2" id="password-2" class="form-input">
                </div>

                <div id="form-submit" class="form-item">
                    <button type="submit" id="register" name="submit-register">Register</button>
                </div>

                <?php
                
                //this is the case in which the user has logged in
                //in this case we will perform a redirect
                if($google_button == ''){
                    header('Location: ./gg-reg.php');
                    exit();
                }else{
                    echo $google_button;
                }
                
                ?>

            </div>

        </form>
    </div>


    <script>
        document.querySelector('#register').addEventListener('submit', ()=>{
            preventDefault();
        })
    </script>

</body>
</html>