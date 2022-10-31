<?php

if(isset($_POST['submit-left'])){
    if((int)$_SESSION['month'] == 1){
        $_SESSION['month'] = "13";
        $_SESSION['year'] = strval((int)$_SESSION['year']-1);
    }
    $_SESSION['month'] = strval((int)$_SESSION['month']-1);
    header('Location: ./index.php');
    return;
}

if(isset($_POST['submit-right'])){
    if((int)$_SESSION['month'] == 12){
        $_SESSION['month'] = "0";
        $_SESSION['year'] = strval((int)$_SESSION['year']+1);
    }
    $_SESSION['month'] = strval((int)$_SESSION['month']+1);
    header('Location: ./index.php');
    return;
}



?>