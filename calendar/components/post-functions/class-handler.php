<?php

if(isset($_POST['submit-class'])){

    $conn = createDBConnection();

    $class = array();
    $class['title'] = $_POST['title-input'];
    $class['credits'] = $_POST['credits'];
    $class['prof-name'] = $_POST['prof-name'];
    $class['credits'] = $_POST['credits'];
    $class['start-day'] = $_POST['start-day'];
    $class['end-day'] = $_POST['end-day'];
    $class['start-time'] = $_POST['start-time'];
    $class['end-time'] = $_POST['end-time'];
    
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

    if(isset($_POST['week-rep-check'])){
        $class['freq'] = 0;
        $class['duration'] = 1;
    }else{
        $class['freq'] = $_POST['freq'];
        $class['duration'] = $_POST['duration'];
    }

    $class['notes'] = $_POST['notes'];

    $sql = "insert into activitiesdb (User_ID, Start_time, End_time, Title, Duration, Start_day, End_day, Notes, Weekdays, Repeat_attribute, Frequency) 
    values(".$_SESSION['userid'].",'".$class['start-time']."','".$class['end-time']."','".$class['title']."','".$class['duration']."','".$class['start-day']."','".$class['end-day']."','".$class['notes']."','".$class['weekdays']."','weeks','".$class['freq']."');";
    $conn->query($sql);

    $sql = "select * from activitiesdb where User_ID = ".$_SESSION['userid']." order by Activity_ID desc limit 1;";
    $result = $conn->query($sql);
    if($result){
        foreach($result as $r){
            $id = $r['Activity_ID'];
        }
        $id = $conn->real_escape_string($id);
        $sql = "INSERT INTO subjectdb (Activity_ID, Subject_name ";
        if(isset($class['credits'])){
            $sql = $sql.", Credits";
        }
        $sql = $sql.") VALUES($id, '".$class['title']."'";
        if(isset($class['credits'])){
            $sql = $sql.", ".$class['credits'];
        }
        $sql = $sql.");";
        $conn->query($sql);
        
    }

    $conn->close();

    header('Location: ./index.php');
    return;

}


?>