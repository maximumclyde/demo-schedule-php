<?php

if(isset($_POST['submit-event'])){

    $conn = createDBConnection();

    $class = array();
    $class['title'] = $_POST['title-input'];

    if(isset($_POST['all-day-check'])){
        $class['start-time'] = '00:00:00';
        $class['end-time'] = '23:59:59';
    }else{
        $class['start-time'] = $_POST['start-time'];
        $class['end-time'] = $_POST['end-time'];
    }

    $class['start-day'] = $_POST['start-day'];
    $class['end-day'] = $_POST['end-day'];

    if(isset($_POST['week-rep-check'])){
        //freq rep_attr duration weekdays
        $class['freq'] = 0;
        $class['repeat_attr'] = "days";
        $class['duration'] = 1;
        $class['weekdays'] = "";
    }else{
        $class['freq'] = $_POST['freq'];
        $class['duration'] = $_POST['duration'];
        $class['repeat_attr'] = $_POST['repeat-attr'];

        $wd = "";
        if(isset($_POST['mon'])){
            $wd = $wd."mon";
        }
        if(isset($_POST['tue'])){
            $wd = $wd."tue";
        }
        if(isset($_POST['wed'])){
            $wd = $wd."wed";
        }
        if(isset($_POST['thu'])){
            $wd = $wd."thu";
        }
        if(isset($_POST['fri'])){
            $wd = $wd."fri";
        }
        if(isset($_POST['sat'])){
            $wd = $wd."sat";
        }
        if(isset($_POST['sun'])){
            $wd = $wd."sun";
        }

        $class['weekdays'] = $wd;
    }
    

    $class['notes'] = $_POST['notes'];

    $sql = "insert into activitiesdb (User_ID, Start_time, End_time, Title, Duration, Start_day, End_day, Notes, Weekdays, Repeat_attribute, Frequency) 
    values(".$_SESSION['userid'].",'".$class['start-time']."','".$class['end-time']."','".$class['title']."','".$class['duration']."','".$class['start-day']."','".$class['end-day']."','".$class['notes']."','".$class['weekdays']."','".$class['repeat_attr']."','".$class['freq']."');";
    $conn->query($sql);

    $conn->close();

    header('Location: ./index.php');
    return;

}


?>