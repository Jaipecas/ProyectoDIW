const buttonUp = document.getElementById('button-up')
const buttonDown = document.getElementById('button-down')
const divsRules = Array.from(document.querySelectorAll('.rules>div>div'))
var position = 0
var translate = 0;


function translateUp() {
    if (position >= 6) return
    position++;
    translate -= 180;
    divsRules.forEach(element => element.style.transform = "translateY(" + translate + "px)")
}

function translateDown() {
    if (position <= 0) return
    position--;
    translate += 180;
    divsRules.forEach(element => element.style.transform = "translateY(" + translate + "px)")
}


function loadWindow() {
    buttonUp.addEventListener('click', translateUp);
    buttonDown.addEventListener('click', translateDown);

}


window.onload = () => {
    loadWindow()
}