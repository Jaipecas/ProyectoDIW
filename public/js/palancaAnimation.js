/*Añade la animación de movimiento a la palanca, y cambia tanto las imágenes del cuadro como los textos asociados*/

window.addEventListener("load", loadAnimation);

let count = 1;

function loadAnimation() {
    let palanca = document.getElementsByClassName("pointer");
    palanca[0].addEventListener("click", changeInfo);
}

function changeInfo() {
    let imagenes = document.querySelectorAll(".img-frame img");
    let pagesInfo = document.querySelectorAll(".container-page div");
    let palanca = document.querySelector(".palanca>svg");
    let engranaje = document.getElementById("engranaje");

    showInfo(imagenes, count, 'visible-img');
    showInfo(pagesInfo, count, 'visible-page');
    removeAnimation(engranaje, palanca);
    setTimeout(() => addAnimation(engranaje, palanca), 50);
    count = count + 1;
    if (count === 3) count = 0;
}

function removeAnimation(engranaje, palanca) {
    engranaje.classList.remove('animacion-engranaje');
    palanca.classList.remove('animacion-palanca');
}

function addAnimation(engranaje, palanca) {
    engranaje.classList.add('animacion-engranaje')
    palanca.classList.add('animacion-palanca');
}

function showInfo(elements, count, cssClass) {
    let arrayElements = Array.from(elements);

    arrayElements.forEach((element, index) => {
        if (index === count) {
            element.classList.add(cssClass);

        } else {
            element.classList.remove(cssClass);
        }
    })
}