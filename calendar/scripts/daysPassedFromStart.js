/**
 * KY FUNKSION DO THEJE NJE INT QE TREGON NUMRIN E DITEVE QE KANE KALUAR NGA
 * FILLIMI I EVENTIT, KY FUNKSION NUK DO FUTET NE CIKEL NQS EVENTI NUK KA FILLUAR
 * NE ATO RASTE DO KTHEHET -1
 */

const daysPassedFromStart = (resultStartDay, thisDateSplit)=>{

    let startYear = resultStartDay[0];
    let startMonth = resultStartDay[1];
    let startDay = resultStartDay[2];

    let thisYear = thisDateSplit[0];
    let thisMonth = thisDateSplit[1];
    let thisDay = thisDateSplit[2];

    //nese eventi nuk ka filluar akoma
    if(startYear == thisYear && thisMonth < startMonth){
        return -1;
    }else if(startYear > thisYear){
        return -1;
    }


    //nese eventi ka date fillimi te njejtin muaj
    if(startYear == thisYear && thisMonth == startMonth){
        if(thisDay >= startDay){
            return (thisDay-startDay);
        }else{
            return -1;
        }
    }

    //ne fillim jane ditet e ketij muaji
    let daysPassed = thisDay;
    let cycle = true;
    //llogarisim ditet mbrapsh, blloku do perseritet muaji per muaji
    while(cycle){
        
        if(thisMonth == 1){
            thisYear --;
            thisMonth = 13;
        }

        thisMonth--;

        //muajin shkurt
        if(thisYear%4 == 0 && thisMonth == 2){
            daysPassed++;
        }

        //ky eshte kushti final qe mbaron ciklin, momenti qe barazohen iteratoret
        if(startMonth == thisMonth && startYear == thisYear){
            daysPassed+=(monthDays[thisMonth] - startDay);
            cycle = false;
        }else{
            daysPassed+=monthDays[thisMonth];
        }


    }

    return daysPassed;

};