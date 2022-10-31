<?php

//we want to authenticate code from the google api oauth
if(isset($_GET['code'])){
    //this exchanges the code from the google api to a token
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);

    if(!isset($token['error'])){
        $google_client->setAccessToken($token['access_token']);

        //we store the access token in a session variable
        $_SESSION['access_token'] = $token['access_token'];

        //we create an object from the google auth data
        $google_service = new Google_Service_Oauth2($google_client);

        //we get the user profile data (email,name,profile pic, gender details)
        $data = $google_service->userinfo->get();

        //we get the name info
        if(!empty($data['given_name'])){
            $_SESSION['User_name'] = $data['given_name'];
        }

        //last nae details
        if(!empty($data['family_name'])){
            $_SESSION['User_lname'] = $data['family_name'];
        }

        //email details
        if(!empty($data['email'])){
            $_SESSION['User_email'] = $data['email'];
        }

    }
}


?>