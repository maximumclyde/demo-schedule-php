
const nameList = document.querySelector('#prof-name');

const selectFill = profList=>{

    
    for(let i=0; i<Object.keys(profList).length; i++){
        let newRow = document.createElement('option');
        let str = document.createTextNode(profList[i]['name']+" "+profList[i]['lname']);
        newRow.appendChild(str);
        nameList.appendChild(newRow);
    }
    

};
