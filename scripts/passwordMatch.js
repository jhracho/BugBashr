var p1 = document.getElementById('p1');
var p2 = document.getElementById('p2');
var passwordMatch = document.getElementById('passwordMatch');

p1.addEventListener('keyup', checkMatch, false);
p2.addEventListener('keyup', checkMatch, false);

function checkMatch(e){
    if (p1.value != p2.value){
        passwordMatch.textContent = "Passwords Do Not Match";
    }
    else{
        passwordMatch.textContent = "Passwords Match!";
    }
}