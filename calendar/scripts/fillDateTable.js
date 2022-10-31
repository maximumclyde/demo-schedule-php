const fillDateTable = x =>{

    if(Object.keys(eventArray[x]).length>0){ //nsq ka event

        let tmp = eventArray[x];
        let len = Object.keys(tmp);
        let scope = 4;

        if(len.length < 4){
            scope = len.length;
        }
        
        for(let i=0; i<scope; i++){
            if(i==0){
                days += `<tr class="frst-row">
            <td class="a-${tmp[len[i]][1]}">`; 
                days+=`${tmp[len[i]][0]}</td>
        </tr>`;
            }else if(i==1){
                days += `<tr class="scnd-row">
                <td class="a-${tmp[len[i]][1]}">`; 
                    days+=`${tmp[len[i]][0]}</td>
            </tr>`;
            }else if(i==2){
                days += `<tr class="thrd-row">
                <td class="a-${tmp[len[i]][1]}">`; 
                    days+=`${tmp[len[i]][0]}</td>
            </tr>`;
            }else if(i==3){
                days += `<tr class="frth-row">
                <td class="a-${tmp[len[i]][1]}">`; 
                    days+=`${tmp[len[i]][0]}</td>
            </tr>`;
            }
        }

        if(scope == 1){
            days+=`
                <tr class="scnd-row">
                    <td class="no-event"></td>
                </tr>
                <tr class="thrd-row">
                    <td class="no-event"></td>
                </tr>
                <tr class="frth-row">
                    <td class="no-event"></td>
                </tr>`;
        }else if(scope == 2){
            days+=`
                <tr class="thrd-row">
                    <td class="no-event"></td>
                </tr>
                <tr class="frth-row">
                    <td class="no-event"></td>
                </tr>`;
        }else if(scope == 3){
            days+=`
                <tr class="frth-row">
                    <td class="no-event"></td>
                </tr>`;
        }
        
    }else{

        days+=`<tr class="frst-row">
                <td class="no-event"></td>
                </tr>
                <tr class="scnd-row">
                    <td class="no-event"></td>
                </tr>
                <tr class="thrd-row">
                    <td class="no-event"></td>
                </tr>
                <tr class="frth-row">
                    <td class="no-event"></td>
                </tr>`;

    }

    days += `</table></div>`;

};