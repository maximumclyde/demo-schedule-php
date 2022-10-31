const weekRepeatCheck = document.getElementsByClassName('week-rep-check');
const weekRep = document.getElementsByClassName('week-rep-row');

weekRepeatCheck[0].addEventListener("change", ()=>{
    if(weekRep[0].style.display == "flex"){
        weekRep[0].style.display = "none";
    }else{
        weekRep[0].style.display = "flex";
    }
});
weekRepeatCheck[1].addEventListener("change", ()=>{
    if(weekRep[1].style.display == "flex"){
        weekRep[1].style.display = "none";
    }else{
        weekRep[1].style.display = "flex";
    }
});

const altProfReg = document.getElementsByClassName('alt-prof');

for(let i=0; i<2; i++){
    altProfReg[i].addEventListener('click', ()=>{

        if(classRegForm.style.display == 'block' || labRegForm.style.display == 'flex'){
            setTimeout(()=>{
                profRegForm.style.display = "flex";
                profRegForm.style.opacity = 1;
            }, 200);
            classRegForm.style.display = 'none';
            classRegForm.style.opacity = 0;
            labRegForm.style.display = 'none';
            labRegForm.style.opacity = 0;
        }
    
    });
}