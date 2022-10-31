/**
 * KY FUNKSIONI DO KTHEJE NJE BOOL QE PERCAKTON EGZISTENCEN E NJE EVENTI
 * NE NJE DATE TE CAKTUAR
 */
const eventDefineOnIndex = (resultsObject, thisDate)=>{

    //firstly we spit the dates used to determine an event

    let resultStartDay = [];
    resultStartDay[0] = parseInt(resultsObject['Start_day'].substr(0, 4));
    resultStartDay[1] = parseInt(resultsObject['Start_day'].substr(5, 2));
    resultStartDay[2] = parseInt(resultsObject['Start_day'].substr(8, 2));

    let resultEndDay = [];
    resultEndDay[0] = parseInt(resultsObject['End_day'].substr(0, 4));
    resultEndDay[1] = parseInt(resultsObject['End_day'].substr(5, 2));
    resultEndDay[2] = parseInt(resultsObject['End_day'].substr(8, 2));

    let thisDateSplit = [];
    thisDateSplit[0] = parseInt(thisDate.substr(0, 4));
    thisDateSplit[1] = parseInt(thisDate.substr(5, 2));
    thisDateSplit[2] = parseInt(thisDate.substr(8, 2));

    //kushtet e mosshfaqes
    //i njejti muaji me diference ditesh nga fillimi
    if(resultStartDay[0] == thisDateSplit[0] && resultStartDay[1] == thisDateSplit[1]){
        if(resultStartDay[2] > thisDateSplit[2]){
            return false;
        }
    }

    //i njejti muaji me diference ditesh nga fundi
    if(resultEndDay[0] == thisDateSplit[0] && resultEndDay[1] == thisDateSplit[1]){
        if(resultEndDay[2] < thisDateSplit[2]){
            return false;
        }
    }

    //i njejti vit po eventi nuk ka filluar akoma ose ka mbaruar (diference muajsh)
    if((thisDateSplit[1] < resultStartDay[1] || thisDateSplit[1] > resultEndDay[1]) && (thisDateSplit[0] == resultStartDay[0] || thisDateSplit[0] == resultEndDay[0])){
        return false;
    }

    //eventi ka mbaruar per diference vitesh
    if(thisDateSplit[0] > resultEndDay[0]){
        return false;
    }

    //eventi nuk ka filluar per diference vitesh
    if(thisDateSplit[0] < resultStartDay[0]){
        return false;
    }

    //me duhet nje algoritem qe me kthen true nqs eventi egziston ne kete date te caktuar
    if(resultsObject['Repeat_attribute'] == "days"){

        let sum = daysPassedFromStart(resultStartDay, thisDateSplit); //we get the total days
        if(sum == -1){
            return false;
        }else{
            if(sum % (parseInt(resultsObject['Duration']) + parseInt(resultsObject['Frequency'])) <  parseInt(resultsObject['Duration'])|| sum == 0){
                return true;
            }else{
                return false;
            }
        }

    }else if(resultsObject['Repeat_attribute'] == "weeks"){

        let tmp = daysPassedFromStart(resultStartDay, thisDateSplit);
        tmp = parseInt(tmp/7);
        let condition = false;
        if(tmp % (parseInt(resultsObject['Duration']) + parseInt(resultsObject['Frequency'])) < parseInt(resultsObject['Duration']) || tmp == 0){
            //THIS IS THE FINAL EVALUATION AFTER DETERMENING THAT THIS IS A WEEK OF EVENTS
            let tmpDate = new Date(thisDateSplit[0], (thisDateSplit[1]-1), thisDateSplit[2]);
            let tmpIndex = tmpDate.getDay();
            for(let i=0; i<resultsObject['Weekdays'].length/3; i++){
                let weekDay = resultsObject['Weekdays'].substr(i*3, 3);
                if(weekDay == weekDayIndex[tmpIndex]){
                    condition = true;
                }
            }

        }
        return condition;


    }else if(resultsObject['Repeat_attribute'] == "months"){

        let sum = monthsPassedFromStart(resultStartDay, thisDateSplit);
        if(sum % (parseInt(resultsObject['Duration']) + parseInt(resultsObject['Frequency'])) < (parseInt(resultsObject['Duration'])) || sum == 0){
            if(parseInt(thisDateSplit[2]) < (parseInt(resultStartDay[2])+parseInt(resultsObject['Days_duration'])) && parseInt(thisDateSplit[2]) >= parseInt(resultStartDay[2])){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }

    }else{

        let sum = monthsPassedFromStart(resultStartDay, thisDateSplit);
        sum/=12;
        if(sum % (parseInt(resultsObject['Duration']) + parseInt(resultsObject['Frequency'])) < (parseInt(resultsObject['Duration'])) || sum == 0){
            if(currentMonth == startMonth){
                if(parseInt(thisDateSplit[2]) < (parseInt(resultStartDay[2])+parseInt(resultsObject['Days_duration'])) && parseInt(thisDateSplit[2]) >= parseInt(resultStartDay[2])){
                    return true;
                }else{
                    return false;
                }
            }
        }else{
            return false;
        }

    }

};