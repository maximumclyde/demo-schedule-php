/**
 * ELEMENTI QE MBAN LISTEN
 */

const todoList = document.querySelector(".todo-list");

const todoRenderer = dayIndex =>{

    let listItems = "";
    const dayArray = eventArray[dayIndex]; //eshte objekti qe mban daten dhe eventet
    const eventIndexes = Object.keys(dayArray);

    //nese ka evente
    if(eventIndexes.length > 0){

        for(let i=0; i<eventIndexes.length; i++){
            listItems += `
                <div class="todo-list-item">
                    <div class="list-item-body">
                        <div class="list-item-title">
                            <span id="list-item-title">${fetchedData[eventIndexes[i]]['Title']}</span>
                        </div>
            `;
    
            listItems += `
                <div class="list-item-content">
                    <p>Start: ${fetchedData[eventIndexes[i]]['Start_day']}</p>
            `;
            listItems += `
                    <p>End: ${fetchedData[eventIndexes[i]]['End_day']}</p>
            `;
            listItems += `
                    <p>Start time: ${fetchedData[eventIndexes[i]]['Start_time']}</p>
            `;
            listItems += `
                    <p>End time: ${fetchedData[eventIndexes[i]]['End_time']}</p>
            `;
    
            listItems += `
                        </div>
                    </div>
                </div>
            `;
        }

    }else{
        listItems = "No activities today";
    }

    todoList.innerHTML = listItems;
    listItems = "";

};



/**
 * THE EVENTLISTENERS OF THE CALENDAR DATES
 */

for(let i=0; i<42; i++){

    const calDate = document.querySelector("#day-"+i.toString());
    calDate.addEventListener("click", ()=>{
        //pjesa qe mbush listen me evente
        todoRenderer(i);

        //pjesa qe vendos daten e klikuar tek lista e eventeve
        if(calDate.className === "date this-month today"){
            listTitle.innerHTML = "Today's activities";
        }else{
            let t = "";
            t+=dayDates[i][0].substr(8,2);
            t+="/";
            t+=dayDates[i][0].substr(5,2);
            t+="/";
            t+=dayDates[i][0].substr(0,4);

            listTitle.innerHTML = t;
        }

    });

}

if(todayIndex > 0){
    todoRenderer(todayIndex);
    listTitle.innerHTML = "Today's activities";
}else{
    todoRenderer(0);
    let t = "";
    t+=dayDates[0][0].substr(8,2);
    t+="/";
    t+=dayDates[0][0].substr(5,2);
    t+="/";
    t+=dayDates[0][0].substr(0,4);

    listTitle.innerHTML = t;
}