const eventFill = (month, year, date, x)=>{

    /**
     * RESULTARRAY ESHTE ARRAY ASHTU SIC MERET NGA DB
     * resultArray[i]['Title], ku i eshte indeksi per cdo event ne
     * scope, dallohen nga Activity_ID, jo nga pozicionimi ne kete array
     */

    //kjo variabel do mbaje daten me formatin qe meret nga databaza
    let thisDate = year+"-";

    if(parseInt(month) < 10){
        thisDate+="0";
    }
    thisDate+=(month+"-");

    if(parseInt(date) < 10){
        thisDate+="0";
    }
    thisDate+=date;

    //vandosim daten si elementin e pare
    dayDates[x] = {0: thisDate};

    for(let i=0; i<dbResults.length; i++){

        //i marim eventet me radhe, duke llogaritur per cdo date
        if(eventDefineOnIndex(dbResults[i], thisDate)){
            eventArray[x][i] = {0: dbResults[i]['Title'], 1: dbResults[i]['Activity_ID']};
        }

    }


};