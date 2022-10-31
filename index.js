const texts = ['A new way to organize your life', 'Catered towards students', 'Make life easier', 'A simple solution for your schedules'];

let count = 0;
let index = 0;

let currentText = '';
let letter = '';

(function type(){

    if(count === texts.length){
        count = 0;
    }

    currentText = texts[count];
    letter = currentText.slice(0, ++index);

    document.querySelector('li').textContent = letter;
    if(letter.length == currentText.length){
        count++;
        index = 0;
    }
    setTimeout(type, 200);

}());


