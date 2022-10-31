const labColor = results =>{

    for (let i = 0; i<results.length; i++){
        let tmp = document.getElementsByClassName("c-"+results[i]["Subject_ID"]);
        for(let j=0; j<Object.keys(tmp).length; j++){
            tmp[j].classList.add("purple");
        }
    }

};