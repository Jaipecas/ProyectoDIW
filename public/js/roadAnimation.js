function loadAnimation() {
    let elementsAnimation = Array.from(document.getElementById('path').children)
    let arrayCountries = Array.from(getMapCountries());

    if (elementsAnimation[0].classList.contains('road-animation')) {
        removeAnimation(elementsAnimation, arrayCountries)
    }

    setTimeout(() => addAnimationRoad(elementsAnimation, arrayCountries), 50);
}

function addAnimationRoad(elementsAnimation, arrayCountries) {
    let delay = 0.75;
    let duration = 20;
    let countEllipse = 0;

    elementsAnimation.forEach(element => {
        if (element.nodeName === 'ellipse') {
            addAnimationCountry(arrayCountries[countEllipse], delay, duration);
            countEllipse++;
        }
        element.style.setProperty('animation-delay', delay + 's');
        element.style.setProperty('animation-duration', duration + 's');
        element.classList.add('road-animation');
        delay += 0.75;
        duration -= 0.75;
    });
}

function addAnimationCountry(country, delay, duration) {
    country.style.setProperty('animation-delay', delay + 's');
    country.style.setProperty('animation-duration', duration + 's');
    country.classList.add('country-animation');
}

function removeAnimation(elementsAnimation, arrayCountries) {
    elementsAnimation.forEach(element => element.classList.remove('road-animation'));
    arrayCountries.forEach(element => element.classList.remove('country-animation'))
}

function getMapCountries() {
    let arrayCountriesIds = ['IT', 'FR', 'DE', 'ES', 'ES', 'GB'];
    let countriesElements = arrayCountriesIds.map(element => document.getElementById(element));
    return countriesElements;
}

window.onload = () => {
    const buttonStartAnimation = document.getElementById('button-road');
    buttonStartAnimation.addEventListener('click', loadAnimation)
}