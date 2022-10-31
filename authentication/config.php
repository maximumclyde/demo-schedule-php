<?php

if($_SERVER['PHP_SELF'] == '/project/calendar/index.php'){
    require_once '../authentication/vendor/autoload.php';
}else{
    require_once './vendor/autoload.php';
}

//creating a new google client object
$google_client = new Google_Client();

//setting the client id and secret keys provided by google cloud developers
$google_client->setClientId('707134812175-97l5ob2269se4hvj6i3i0hibptefcc0c.apps.googleusercontent.com');
$google_client->setClientSecret('g7j0BzRW9Ff8kYYFL_2z_Kf-');

//setting the redirect uri (needs to be the same as the one input in the cloud)
if($_SERVER['PHP_SELF'] == "/project/authentication/login.php"){
    $google_client->setRedirectUri('http://localhost:8080/project/authentication/login.php');
}else if($_SERVER['PHP_SELF'] == "/project/authentication/register.php"){
    $google_client->setRedirectUri('http://localhost:8080/project/authentication/register.php');
}

//setting the scope for the google api
$google_client->addScope('email');
$google_client->addScope('profile');

/**
 *  the scope is a method to define the scpoe of client info
 * that you require by google. It can provide the email, profile pic,
 * name etc.
 */

session_start();

?>