var countText = 0;

const buttonRead = document.querySelector('button.line-time-blue');
const firstParrag = document.querySelector('p.gradient-text');
const textHidden = document.getElementById('text-hidden');


function loadWindow() {
    buttonRead.addEventListener('click', showText)
}

function showText() {
    if (countText % 2 === 0) {
        firstParrag.classList.remove('gradient-text');
        textHidden.classList.remove('d-none');
        buttonRead.innerHTML = '&uarr;'

    } else {
        firstParrag.classList.add('gradient-text');
        textHidden.classList.add('d-none');
        buttonRead.innerHTML = '&darr;'
    }
    countText++;
}

window.addEventListener("load", loadWindow);