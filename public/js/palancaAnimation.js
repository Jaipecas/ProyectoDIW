window.addEventListener("load", loadAnimation);

function loadAnimation() {
    let palanca = document.getElementsByClassName("pointer");
    palanca[0].addEventListener("click", cambioInfoTrabajo);
}

function cambioInfoTrabajo() {
    let imagenes = document.querySelectorAll(".img-frame>img");
    let palanca = document.querySelector(".palanca>svg");

    palanca.classList.remove('animacion-palanca');
    void palanca.offsetWidth;
    palanca.classList.add('animacion-palanca');

}