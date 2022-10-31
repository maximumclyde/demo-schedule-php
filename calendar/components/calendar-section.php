<!DOCTYPE html>
<html lang="en">
<body>

<div class="calendar-container">

<div class="calendar">

    <div class="c-head">
        <div class="c-button" id="c-btn-left">
            <form action="index.php" method="POST">
                <button type="submit" name="submit-left" style="background-color:inherit" id="submit-left" class="arrow">&lt;</button>
            </form>
        </div>
        
        <div class="c-month">
            <div class="cm-head">
                <span id="month-name" class="month-name"></span><span id="year-displayed"></span>
            </div>
            
            <div class="cm-date">
                <span id="current-day"></span> <span id="current-month"></span> <span id="current-year"></span>
                <span id="current-hour"></span><span id="current-minute"></span><span id="current-second"></span>
            </div>
        </div>

        <div class="c-button" id="c-btn-right">
            <form action="index.php" method="POST">
                <button type="submit" name="submit-right" style="background-color:inherit" id="submit-right" class="arrow">&gt;</button>
            </form>
        </div>
    </div>



    <div class="c-body">
        <div class="day-names">
        <div class="day" id="monday">Monday</div>
        <div class="day">Tuesday</div>
        <div class="day">Wednesday</div>
        <div class="day">Thursday</div>
        <div class="day">Friday</div>
        <div class="day">Saturday</div>
        <div class="day" id="sunday">Sunday</div>
        </div>

        <div class="day-dates">
            
        </div>
    </div>

</div>

</div>
    
</body>
</html>