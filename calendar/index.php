<?php

include '../authentication/config.php';

include './components/functions/createDBConnection.php';
include './components/functions/dataGet.php';
include './components/functions/monthChangeHandler.php';
include './components/functions/profListGet.php';
include './components/functions/subjectGet.php';
include './components/functions/labGet.php';

include './components/post-functions/class-handler.php';
include './components/post-functions/event-handler.php';
include './components/post-functions/prof-handler.php';
include './components/post-functions/lab-handler.php';
include './components/post-functions/logout.php';

dataGet($_SESSION['month'], $_SESSION['year']);
subjectGet();
profListGet();
labGet();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Page</title>
    <link rel="stylesheet" href="./styles/main-page/body-NavStyle.css">
    <link rel="stylesheet" href="./styles/main-page/calendar-Style.css">
    <link rel="stylesheet" href="./styles/main-page/todo-style1.css">

    <link rel="stylesheet" href="./styles/forms/initialselection.css">
    <link rel="stylesheet" href="./styles/forms/class-style.css">
    <link rel="stylesheet" href="./styles/forms/prof-style.css">
    <link rel="stylesheet" href="./styles/forms/event-register.css">
    <link rel="stylesheet" href="./styles/forms/lab-style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet"> 
</head>
<body>

    <?php
    
    include './components/navsection.php';
    include './components/todo-section.php';
    include './components/calendar-section.php';
    include './components/initial-selection.php';
    include './components/class-register.php';
    include './components/prof-register.php';
    include './components/event-register.php';
    include './components/lab-register.php';

    ?>


    <script src="./scripts/displayDates.js"></script>
    <script src="./scripts/eventFill.js"></script>
    <script src="./scripts/eventDefineOnIndex.js"></script>
    <script src="./scripts/daysPassedFromStart.js"></script>
    <script src="./scripts/monthsPassedFromStart.js"></script>
    <script src="./scripts/fillDateTable.js"></script>

    <?php
    
    echo "<script>displayDates(".$_SESSION['month'].", ".$_SESSION['year'].", ".$_SESSION['row'].");</script>";
    
    ?>

    <script>

        /**
            THE EVENTLISTENERS OF THE ARROWS
         */

        const btnLeft = ()=>{
            preventDefault();
            date.setMonth(date.getMonth()-1);
        };

        const btnRight = ()=>{
            preventDefault();
            date.setMonth(date.getMonth()+1);
        };

        document.querySelector('#submit-left').addEventListener('submit', btnLeft);

        document.querySelector('#submit-right').addEventListener('submit', btnRight);

    </script>

    

    <script src="./scripts/todoRenderer.js"></script>
    <script src="./scripts/firstChoice.js"></script>
    <script src="./scripts/class-inner.js"></script>
    <script src="./scripts/selectFill.js"></script>
    <script src="./scripts/event-register.js"></script>
    <script src="./scripts/colorClass.js"></script>
    <script src="./scripts/labColor.js"></script>

    <?php
    
    echo "<script>selectFill(".$_SESSION['prof-list'].");</script>";
    echo "<script>colorClass(".$_SESSION['class_row'].");</script>";
    echo "<script>labColor(".$_SESSION['lab_row'].");</script>";
    
    ?>
    
</body>
</html>