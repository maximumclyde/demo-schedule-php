const eweekRepeatCheck = document.querySelector("#e-week-rep-check");
const eweekRep = document.querySelector("#e-week-frequency-row");
const weeksDaysRow = document.querySelector('#e-repetition-days-row');

eweekRepeatCheck.addEventListener("change", ()=>{
    if(eweekRep.style.display == "flex"){
        eweekRep.style.display = "none";
        weeksDaysRow.style.display = 'none';
    }else{
        eweekRep.style.display = "flex";
    }
});


const allDayCheck = document.querySelector('#e-all-day-check');
const specificTime = document.querySelector('#e-time-duration-row');
allDayCheck.addEventListener("change", ()=>{
    if(specificTime.style.display == "flex"){
        specificTime.style.display = "none";
    }else{
        specificTime.style.display = "flex";
    }
});


const repAttr = document.querySelector('#e-repeat-attr');
const repAttrSpan = document.querySelector('#rep-att-span');

repAttr.addEventListener('change', ()=>{

    if(repAttr.value == 'weeks'){
        weeksDaysRow.style.display = 'flex';
        repAttrSpan.innerHTML = 'weeks';
    }else{
        weeksDaysRow.style.display = 'none';
        repAttrSpan.innerHTML = repAttr.value;
    }

});