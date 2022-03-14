let elementsAnimation = Array.from(document.getElementById('path').children)

function loadAnimation() {
    if (elementsAnimation[0].classList.contains('road-animation')) {
        removeAnimation()
    }
    setTimeout(addAnimation, 50);
}

function addAnimation() {
    let delay = 0.75;
    let duration = 20;

    elementsAnimation.forEach(element => {
        element.style.setProperty('animation-delay', delay + 's');
        element.style.setProperty('animation-duration', duration + 's');
        element.classList.add('road-animation');
        delay += 0.75;
        duration -= 0.75;
    });
}

function removeAnimation() {
    elementsAnimation.forEach(element => {
        element.classList.remove('road-animation');
    });
}



window.onload = () => {
    const buttonStartAnimation = document.getElementById('button-road');
    buttonStartAnimation.addEventListener('click', loadAnimation)
}