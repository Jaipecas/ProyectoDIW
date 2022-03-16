let calls = [];

function loadAnimation() {
    let elementsAnimation = Array.from(document.getElementById('path').children)
    let arrayCountries = Array.from(getMapCountries());
    let pagesInfo = Array.from(document.getElementsByClassName('page'));

    if (elementsAnimation[0].classList.contains('road-animation')) {
        removeAnimations(elementsAnimation, arrayCountries);
        restartPages(pagesInfo)
    }

    setTimeout(() => addAnimationRoad(elementsAnimation, arrayCountries, pagesInfo), 50);
}

function addAnimationRoad(elementsAnimation, arrayCountries, pagesInfo) {
    let delay = 0.75;
    let duration = 20;
    let countEllipse = 0;

    elementsAnimation.forEach(element => {
        if (element.nodeName === 'ellipse') {
            addAnimationCountry(arrayCountries[countEllipse], delay, duration);
            if (countEllipse >= 1) changePage(pagesInfo[countEllipse], pagesInfo[countEllipse - 1], delay);
            countEllipse++;
        }
        element.style.setProperty('animation-delay', delay + 's');
        element.style.setProperty('animation-duration', duration + 's');
        element.classList.add('road-animation');
        delay += 0.75;
        duration -= 0.75;
    });
    changePage(pagesInfo[0], pagesInfo[pagesInfo.length - 1], duration + delay);
}

function addAnimationCountry(country, delay, duration) {
    country.style.setProperty('animation-delay', delay + 's');
    country.style.setProperty('animation-duration', duration + 's');
    country.classList.add('country-animation');
}

function removeAnimations(elementsAnimation, arrayCountries) {
    elementsAnimation.forEach(element => element.classList.remove('road-animation'));
    arrayCountries.forEach(element => element.classList.remove('country-animation'))
}

function getMapCountries() {
    let arrayCountriesIds = ['IT', 'FR', 'DE', 'ES', 'ES', 'GB'];
    let countriesElements = arrayCountriesIds.map(element => document.getElementById(element));
    return countriesElements;
}

function changePage(pagesVisible, pageInvisible, delay) {
    calls.push(setTimeout(() => {
        pageInvisible.classList.remove('visible-page');
        pagesVisible.classList.add('visible-page');
    }, delay * 1000))
}

function restartPages(pages) {
    calls.forEach(call => clearTimeout(call));

    pages.forEach(page => {
        if (page.classList.contains('visible-page')) {
            page.classList.remove('visible-page');
        }
    });
    pages[0].classList.add('visible-page');
}

window.onload = () => {
    const buttonStartAnimation = document.getElementById('button-road');
    buttonStartAnimation.addEventListener('click', loadAnimation)
}