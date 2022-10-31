const colorClass = results =>{
  
    for (let i = 0; i<results.length; i++){
        let tmp = document.getElementsByClassName("a-"+results[i]["Activity_ID"]);
        for(let j=0; j<Object.keys(tmp).length; j++){
            tmp[j].classList.add("green");
            tmp[j].classList.add("c-"+results[i]["Subject_ID"]);
        }
    }
    
};