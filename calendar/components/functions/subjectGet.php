<?php

function subjectGet(){

    $_SESSION['class_row'] = array();

    $conn = createDBConnection();
    //$tmp = $_SESSION['tmp'];
    $tmp = json_decode($_SESSION['row'], true);
    $sql = "SELECT * FROM subjectdb WHERE";
    foreach($tmp as $r){
        $sql = $sql." Activity_ID = ".$r['Activity_ID']." OR";
    }

    //$sql = $sql.chr(8).chr(8).";";
    $sql = substr($sql, 0, -2);
    $sql = $sql.";";

    $result = $conn->query($sql);
    if($result){
        $i=0;
        if($result->num_rows > 0){
            foreach($result as $r){
                $_SESSION['class_row'][$i]['Activity_ID'] = $r['Activity_ID'];
                $_SESSION['class_row'][$i]['Subject_ID'] = $r['Subject_ID'];
                $_SESSION['class_row'][$i]['Prof_ID'] = $r['Prof_ID'];
                $_SESSION['class_row'][$i]['Subject_name'] = $r['Subject_name'];
                $_SESSION['class_row'][$i]['Credits'] = $r['Credits'];
                $i++;
            }
            
        }
    }

    $_SESSION['class_row'] = json_encode($_SESSION['class_row']);
    $conn->close();

}


?>