<?php

function labGet(){

    $_SESSION['lab_row'] = array();

    $conn = createDBConnection();
    //$tmp = $_SESSION['tmp'];
    $tmp = json_decode($_SESSION['class_row'], true);
    $sql = "SELECT * FROM labdb WHERE";
    foreach($tmp as $r){
        $sql = $sql." Subject_ID = ".$r['Subject_ID']." OR";
    }

    //$sql = $sql.chr(8).chr(8).";";
    $sql = substr($sql, 0, -2);
    $sql = $sql.";";

    $result = $conn->query($sql);
    if($result){
        $i=0;
        if($result->num_rows > 0){
            foreach($result as $r){
                $_SESSION['lab_row'][$i]['Subject_ID'] = $r['Subject_ID'];
                $_SESSION['lab_row'][$i]['Lab_ID'] = $r['Lab_ID'];
                $_SESSION['lab_row'][$i]['Lab_name'] = $r['Lab_name'];
                $i++;
            }
            
        }
    }

    $_SESSION['lab_row'] = json_encode($_SESSION['lab_row']);
    $conn->close();

}


?>