const monthDays = { 1: "31", 2: "28", 3: "31", 4: "30", 5: "31", 6: "30", 7: "31", 8: "31", 9: "30", 10: "31", 11: "30", 12: "31" };

const date = new Date();

const listTitle = document.querySelector("#to-do-title");

const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
];

const weekDayIndex = ["sun", "mon", "tue", "wed", "thu", "fri", "sat"];

document.querySelector('.cm-date #current-day').innerHTML = date.getDate() + "&nbsp;";

document.querySelector('.cm-date #current-month').innerHTML = months[date.getMonth()] + "&nbsp;";

document.querySelector('.cm-date #current-year').innerHTML = date.getFullYear() + "&nbsp;|&nbsp;";


let days = "";
let eventArray = [];
let dayDates = [];
var dbResults;
var todayIndex;
var fetchedData;

const displayDates = (month, year, resultArray) => {

    dbResults = resultArray;
    fetchedData = resultArray;
    /**
     * THIS MAKES A 2D ARRAY
     */
    for (let i = 0; i < 42; i++) {
        eventArray[i] = {};
        dayDates[i] = {};
    }

    //nga data 14 e muajit te kaluar ne daten 24 te muajit tjerer, 42 data gjithsej

    let tmpDate = new Date();
    tmpDate.setDate(1);

    date.setDate(1);

    date.setMonth(parseInt(month) - 1);
    date.setFullYear(parseInt(year));

    const monthsDays = document.querySelector('.day-dates');
    const firstDayIndex = date.getDay();

    const currentLastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();

    const prevLastDay = new Date(date.getFullYear(), date.getMonth(), 0).getDate();

    const currentLastDayIndex = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDay();
    
    document.querySelector('.cm-head #month-name').innerHTML = months[date.getMonth()]+"&nbsp;";
    
    document.querySelector('.cm-head #year-displayed').innerHTML = date.getFullYear();

    let x = 0; //indexi i cdo dite


    /**
        * DITET E MUAJIT TE KALUAR
        */

    let a = 0;
    if (firstDayIndex === 0) { //nqs dita e pare e muajit eshte e djele
        a = 6;
    } else if (firstDayIndex != 0 && firstDayIndex != 1) {
        a = firstDayIndex - 1;
    }

    //indeksi a do llogarisi numrin e diteve te muajit te kaluar qe do rregjistrohen
    for (let i = 1; i <= a; i++) {
        days += `<div class="date other-month" id="day-${x}">`;
        days += `<table class="activity-table">
          <tr class="date-nr">`;

        //na duhet nje algoritem qe percakton nese kemi apo jo event ne kete date
        let tmpMonth = (parseInt(month) - 1).toString();
        let tmpYear = year;

        if (month == 1) {
            tmpMonth = "12";
            tmpYear = (parseInt(year) - 1).toString();
        }

        //mer muajin e kaluar dhe daten konkrete bashke me indeksin e dites
        eventFill(tmpMonth, tmpYear, prevLastDay - a + i, x);

        //indexi 0 eshte i zene me daten
        if (Object.keys(eventArray[x]).length > 5) { //ka 4 ose me shum evente
            days += `<th class="plus-act">`;
        } else {
            days += `<th>`;
        }
        days += `${prevLastDay - a + i}</th>
          </tr>`;

        fillDateTable(x);
        x++;

    }


    /**
     * DITET E KETIJ MUAJI
     */
    for (let i = 1; i <= currentLastDay; i++) {

        eventFill(month, year, i, x);

        if (i === new Date().getDate() && date.getMonth() === new Date().getMonth() && date.getFullYear() === new Date().getFullYear()) {
            days += `<div class="date this-month today" id="day-${x}">`;
            if ((tmpDate.getMonth() + 1) != month) {
                todayIndex = -1;
            } else {
                todayIndex = x;
            }
        } else {
            days += `<div class="date this-month" id="day-${x}">`;
        }

        days += `
              <table class="activity-table">
                  <tr class="date-nr">`;
        /*<th>${i}</th>
    </tr>`;*/

        if (Object.keys(eventArray[x]).length > 5) {
            days += `<th class="plus-act">`;
        } else {
            days += `<th>`;
        }

        days += `${i}</th>
          </tr>`;

        fillDateTable(x);
        x++;

    }


    /**
     * DITET E MUAJIT TJETER
     */
    let i = 1;

    while (x < 42) {
        //fillEventArray(resultArray, (parseInt(selectedMonth)+1).toString(), selectedYear, i, x);
        let tmpMonth = (parseInt(month) + 1).toString();
        let tmpYear = year;
        if (month == '12') {
            tmpMonth = "1";
            tmpYear = (parseInt(year) + 1).toString();
        }

        eventFill(tmpMonth, tmpYear, i, x);

        if (currentLastDayIndex === 0 && x == 42)
            break;

        days +=
            `<div class="date other-month" id="day-${x}">`;

        days += `
          <table class="activity-table">
              <tr class="date-nr">`;


        if (Object.keys(eventArray[x]).length > 5) {
            days += `<th class="plus-act">`;
        } else {
            days += `<th>`;
        }

        days += `${i}</th>
          </tr>`;

        fillDateTable(x);
        x++;
        i++;

    }


    monthsDays.innerHTML = days;
    days = "";
    console.log(eventArray);
    console.log(dayDates);

};



/**
 * A FUNCTION THAT SETS THE TIME IN THE CALENDAR
 */
setInterval(() => {

    const date = new Date();

    document.querySelector('.cm-date #current-hour').innerHTML = date.getHours() + ":";

    document.querySelector('.cm-date #current-minute').innerHTML = date.getMinutes() + ":";

    document.querySelector('.cm-date #current-second').innerHTML = date.getSeconds();
}, 1000);