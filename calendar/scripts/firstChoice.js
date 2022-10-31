/**
 * THESE ARE THE BUTTONS OF THE FIRST SELECTION DISPLAY
 */
const regSelectContainer = document.querySelector("#register-select-container");
const classRegButton = document.querySelector("#register-select-class");
const profRegButton = document.querySelector("#register-select-prof");
const eventRegButton = document.querySelector("#register-select-event");
const labRegButton = document.querySelector("#register-select-lab");

//the back button
const newFormButton = document.querySelector("#add-event-button");


/**
 * THESE ARE THE SECONDARY DISPLAYS THAT WILL SHOW ACCORDINGLY
 */
const classRegForm = document.querySelector("#register-class-container");
const profRegForm = document.querySelector("#prof-register-container");
const eventRegForm = document.querySelector('#event-register-container');
const labRegForm = document.querySelector('#register-lab-container');

/**
 *  THIS IS THE FUNCTION FOR THE NEW FORM BUTTON
 */

newFormButton.addEventListener("click", ()=>{
    if(newFormButton.innerHTML == "+"){
        newFormButton.innerHTML = "x";
        regSelectContainer.style.display = "flex";
        regSelectContainer.style.opacity = 1;
    }else{
        newFormButton.innerHTML = "+";
        regSelectContainer.style.display = "none";
        regSelectContainer.style.opacity = 0;
        classRegForm.style.display = "none";
        classRegForm.style.opacity = 0;
        profRegForm.style.display = "none";
        profRegForm.style.opacity = 0;
        eventRegForm.style.display = "none";
        eventRegForm.style.opacity = 0;
        labRegForm.style.display = "none";
        labRegForm.style.opacity = 0;
    }
});

/**
 * THESE ARE THE FUCNTIONS FOR EACH BUTTON
 */

//class register
classRegButton.addEventListener("click", ()=>{
    setTimeout(()=>{
        classRegForm.style.opacity = 1;
        classRegForm.style.display = "block";
    }, 200);
    regSelectContainer.style.display = "none";
    regSelectContainer.style.opacity = 0;
    newFormButton.style.display = "block";
    newFormButton.style.opacity = 1;
});

//prof register
profRegButton.addEventListener("click", ()=>{
    setTimeout(()=>{
        profRegForm.style.opacity = 1;
        profRegForm.style.display = "flex";
    }, 200);
    regSelectContainer.style.display = "none";
    regSelectContainer.style.opacity = 0;
    newFormButton.style.display = "block";
    newFormButton.style.opacity = 1;
});

//event register
eventRegButton.addEventListener("click", ()=>{
    setTimeout(()=>{
        eventRegForm.style.opacity = 1;
        eventRegForm.style.display = "flex";
    }, 200);
    regSelectContainer.style.display = "none";
    regSelectContainer.style.opacity = 0;
    newFormButton.style.display = "block";
    newFormButton.style.opacity = 1;
});


//lab register
labRegButton.addEventListener("click", ()=>{
    setTimeout(()=>{
        labRegForm.style.opacity = 1;
        labRegForm.style.display = "flex";
    }, 200);
    regSelectContainer.style.display = "none";
    regSelectContainer.style.opacity = 0;
    newFormButton.style.display = "block";
    newFormButton.style.opacity = 1;
});