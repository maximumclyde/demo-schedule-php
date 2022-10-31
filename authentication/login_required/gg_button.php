<?php

$google_button = "";

//this is the code that gets the access token as well as the user info
include './login_required/gg_url_get.php';

/**
 *  IN CASE OF A FRESH LOGIN THE PAGE SHALL DISPLAY HTML CODE
 * IN THE FORM OF A VARIABLE WHICH WILL BE ECHOED. THIS IS THE CASE
 * WHEN THE USER HASN'T YET LOGGED IN SO AN ACCESS TOKEN IS NOT SET
 */
if (!isset($_SESSION['access_token'])) {

    $tmp='<div id="gSignInWrapper">
            <span class="label">';

    //we differentiate between the login and sign up
    if ($_SERVER['PHP_SELF'] == "/project/authentication/login.php") {
        $tmp =$tmp. 'Login with:';
    } else if ($_SERVER['PHP_SELF'] == "/project/authentication/register.php") {
        $tmp =$tmp. 'Sign up with:';
    }

    $tmp =$tmp. '</span>
            <div id="customBtn" class="customGPlusSignIn">
            <a href="'. $google_client->createAuthUrl() .'" id="gglogin_url"></a>
                <span class="icon"></span>
                <span class="buttonText">Google</span>
            </div>
        </div>
    <div id="name"></div>';
    $google_button =$google_button . $tmp;
}
