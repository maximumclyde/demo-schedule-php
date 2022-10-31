<?php

function profListGet(){
    $_SESSION['prof-list'] = array();
    
    $conn = createDBConnection();

    $userid = $conn->real_escape_string($_SESSION['userid']);

    $sql = "SELECT * FROM profdb WHERE User_ID = $userid;";
    $result = $conn->query($sql);

    if($result){
        if($result->num_rows > 0){
            $i=0;

            foreach($result as $r){
                $_SESSION['prof-list'][$i]['id'] = $r['Prof_ID'];
                $_SESSION['prof-list'][$i]['userid'] = $r['User_ID'];
                $_SESSION['prof-list'][$i]['name'] = $r['Prof_name'];
                $_SESSION['prof-list'][$i]['lname'] = $r['Prof_lastName'];

                $i++;
            }
        }
    }
    
    $_SESSION['prof-list'] = json_encode($_SESSION['prof-list']);

    $conn->close();
}



?>