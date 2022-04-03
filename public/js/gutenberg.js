var count = 0;
var countText = 0;

const buttonInfo = Array.from(document.getElementsByClassName('button-timeline'));
const divsInfo = Array.from(document.getElementsByClassName('rules-game'));
const buttonRead = document.querySelector('button.line-time-blue');
const firstParrag = document.querySelector('p.gradient-text');
const textHidden = document.getElementById('text-hidden');


function loadWindow() {
    buttonInfo.forEach(button => {
        button.addEventListener('click', () => {
            showTimeLine(divsInfo, count);
        });
    });

    buttonRead.addEventListener('click', showText)
}

function showTimeLine(divsInfo) {
    divsInfo[count].style.visibility = 'visible';
    count++;
    if (count === 3) count = 0;
}

function showText() {
    if (countText % 2 === 0) {
        firstParrag.classList.remove('gradient-text');
        textHidden.classList.remove('d-none');
        buttonRead.innerHTML = '&darr;'

    } else {
        firstParrag.classList.add('gradient-text');
        textHidden.classList.add('d-none');
        buttonRead.innerHTML = '&darr;'
    }
    countText++;
}

window.addEventListener("load", loadWindow);