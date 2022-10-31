<?php

session_start();

$_SESSION['month'] = date('m');
$_SESSION['year'] = date('Y');

header('Location: ./index.php');
exit();


?>