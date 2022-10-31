<!DOCTYPE html>
<html lang="en">

<body>

    <div id="register-lab-container" class="register-form-conainers">
        <form action="index.php" method="post" id="register-lab-form">

            <div id="title-row" class="row">
                <input type="text" name="title-input" id="title-input" placeholder="Lab name">
                <div id="innerfirstrow">
                    <span>Credits:</span>
                    <input type="number" name="credits" id="credits" min="1" class="num-input">
                </div>
            </div>

            <div id="prof-name-row" class="row">
                <select name="prof-name" id="prof-name" value="default">
                    <option value="default">--Select existing professor</option>
                </select>
                <span class="scndrowspan">OR</span>
                <span id="prof-register-span" class="scndrowspan alt-prof">Register a new professor</span>
            </div>

            <div id="class-day-duration-row" class="row">
                <label>Date duration: </label>
                <div id="inner-day-duration">
                    <div id="second-inner-day">
                        <span>from</span>
                        <input type="date" name="start-day" id="start-day">
                    </div>
                    <div id="second-inner-day">
                        <span>to</span>
                        <input type="date" name="end-day" id="end-day">
                    </div>
                </div>
            </div>

            <div id="class-time-duration-row" class="row">
                <label>Time duration: </label>
                <div id="inner-time-duration">
                    <div id="second-inner-time">
                        <span>from</span>
                        <input type="time" name="start-time" id="start-time">
                    </div>
                    <div id="second-inner-time-2">
                        <span>to</span>
                        <input type="time" name="end-time" id="end-time">
                    </div>
                </div>
            </div>

            <div id="repetition-days-row" class="row">
                <label>Week repetition days:</label>
                <div id="weekdays">
                    <input type="checkbox" name="mon" id="mon" class="weekdays">
                    <input type="checkbox" name="tue" id="tue" class="weekdays">
                    <input type="checkbox" name="wed" id="wed" class="weekdays">
                    <input type="checkbox" name="thu" id="thu" class="weekdays">
                    <input type="checkbox" name="fri" id="fri" class="weekdays">
                    <input type="checkbox" name="sat" id="sat" class="weekdays">
                    <input type="checkbox" name="sun" id="sun" class="weekdays">
                </div>
            </div>

            <div id="week-frequency-button" class="row">
                <span>No weekly breaks throughout the whole duration</span>
                <input type="checkbox" name="week-rep-check" id="week-rep-check" class="specific-display week-rep-check" checked="checked">
            </div>

            <div id="week-frequency-row" class="row week-rep-row">
                <div id="inner-week-freq">
                    <span>This lab repeats every </span>
                    <input type="number" name="freq" id="freq" min="0" class="num-input">
                    <span> weeks,</span>
                </div>
                <div id="inner-week-freq-2">
                    <span>for a duration of </span>
                    <input type="number" name="duration" id="duration" min="1" class="num-input">
                    <span> week/s per repetition</span>
                </div>
            </div>

            <div id="notes-row" class="row">
                <textarea name="notes" id="notes" cols="30" rows="5" placeholder="Notes..." style="resize:none"></textarea>
            </div>

            <div id="submit-row" class="row">
                <button type="submit" name="submit-lab" class="submit sub-lab">Save</button>
            </div>
        </form>
    </div>

</body>

</html>