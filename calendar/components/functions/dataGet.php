<?php

function dataGet($month, $year){
    
    $_SESSION['row'] = array();

    //establishing database connection
    /**
     * $conn = new mysqli("127.0.0.1:3308", "root", "", "generaldb");
    if($conn->connect_error){
        die("Error connecting to the database: ".$conn->error);
    }
     */
    $conn = createDBConnection();

    $userid = $conn->real_escape_string($_SESSION['userid']);
    $month = $conn->real_escape_string($month);
    $year = $conn->real_escape_string($year);
    //building the sql query to get the data based on the user id
    $sql = "SELECT * FROM activitiesdb WHERE User_ID = $userid AND (Start_day <= ";
    
    //selecting the values based on the timeframe
    if((int)$month == 12){
        $sql.="'".strval((int)$year+1)."-1-14' AND End_day >= '$year-11-24');";
    }else if((int)$month == 1){
        $sql.="'$year-2-14' AND End_day >= '".strval((int)$year-1)."-12-24');";
    }else{
        $sql.="'$year-".strval((int)$month+1)."-14' AND End_day >= '$year-".strval((int)$month-1)."-24');";
    }

    $result = $conn->query($sql);
    if($result){
        $i =0;
        if($result -> num_rows > 0){

            foreach($result as $r){

                $_SESSION['row'][$i]['Activity_ID'] = $r['Activity_ID'];
                $_SESSION['row'][$i]['Duration'] = $r['Duration'];
                $_SESSION['row'][$i]['Weekdays'] = $r['Weekdays'];
                $_SESSION['row'][$i]['Repeat_attribute'] = $r['Repeat_attribute'];
                $_SESSION['row'][$i]['Start_time'] = $r['Start_time'];
                $_SESSION['row'][$i]['End_time'] = $r['End_time'];
                $_SESSION['row'][$i]['Title'] = $r['Title'];
                $_SESSION['row'][$i]['Frequency'] = $r['Frequency'];
                $_SESSION['row'][$i]['Start_day'] = $r['Start_day'];
                $_SESSION['row'][$i]['End_day'] = $r['End_day']; 
                $_SESSION['row'][$i]['Days_duration'] = $r['Days_duration'];
            
            $i++;

            }
        }

        //$_SESSION['tmp'] = $_SESSION['row'];
        $_SESSION['row'] = json_encode($_SESSION['row']);
    }

    $conn->close();
}


?>