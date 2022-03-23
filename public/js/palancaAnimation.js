window.addEventListener("load", loadAnimation);

let count = 1;

function loadAnimation() {
    let palanca = document.getElementsByClassName("pointer");
    palanca[0].addEventListener("click", changeInfo);
}

function changeInfo() {
    let imagenes = document.querySelectorAll(".img-frame img");
    let palanca = document.querySelector(".palanca>svg");
    let engranaje = document.getElementById("engranaje");

    showImg(imagenes, count)
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

function showImg(imagenes, count) {
    let imgs = Array.from(imagenes);

    imgs.forEach((img, index) => {
        if (index === count) {
            img.classList.add('visible-img');

        } else {
            img.classList.remove('visible-img');
        }
    })
}