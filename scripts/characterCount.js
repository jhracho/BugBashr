// JavaScript to edit the characters remaining fields

var textBox = document.getElementById('description-input');
textBox.addEventListener('keyup', countCharacters, false);

function countCharacters(e){
    var textEntered, countRemaining, counter;
    textEntered = document.getElementById('description-input').value;
    counter = (100 - (textEntered.length));
    countRemaining = document.getElementById('charactersRemaining');
    countRemaining.textContent = "Characters Remaining: " + counter;
}