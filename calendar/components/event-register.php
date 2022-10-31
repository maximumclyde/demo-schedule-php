<!DOCTYPE html>
<html lang="en">

<body>

    <div id="event-register-container" class="register-form-conainers">
        <form action="index.php" method="post" id="event-register-form">
            <div id="title-row" class="row">
                <input type="text" name="title-input" id="title-input" placeholder="Event title">
            </div>

            <div id="class-all-day-row" class="row">
                <span>All day duration</span>
                <input type="checkbox" name="all-day-check" id="e-all-day-check" class="specific-display" checked="checked">
            </div>

            <div id="e-time-duration-row" class="row">
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

            <div id="week-frequency-button" class="row">
                <span>No breaks throughout the whole duration</span>
                <input type="checkbox" name="week-rep-check" id="e-week-rep-check" class="specific-display" checked="checked">
            </div>

            <div id="e-week-frequency-row" class="row">
                <div id="inner-week-freq">
                    <span>This event repeats every </span>
                    <input type="number" name="freq" id="freq" min="1" class="num-input">
                    <select name="repeat-attr" id="e-repeat-attr" value="days">
                        <option value="days">days</option>
                        <option value="weeks">weeks</option>
                        <option value="months">months</option>
                        <option value="years">years</option>
                    </select>
                </div>
                <div id="inner-week-freq-2">
                    <span>for a duration of </span>
                    <input type="number" name="duration" id="duration" min="1" class="num-input">
                    <span> <span id="rep-att-span">days</span> per repetition</span>
                </div>
            </div>

            <div id="e-repetition-days-row" class="row">
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

            <div id="notes-row" class="row">
                <textarea name="notes" id="notes" cols="30" rows="5" placeholder="Notes..." style="resize:none"></textarea>
            </div>

            <div id="submit-row" class="row">
                <button type="submit" name="submit-event" class="submit" id="submit-event">Save</button>
            </div>
        </form>
    </div>

</body>

</html>