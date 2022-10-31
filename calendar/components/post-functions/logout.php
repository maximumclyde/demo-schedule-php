<?php

if(isset($_POST['log-out'])){
    //we reset the oauth access token
    $google_client->revokeToken();
    
    session_destroy();
    header('Location: ../index.php');
    exit();
}


?>