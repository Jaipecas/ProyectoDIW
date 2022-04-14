function loadWindow() {
    let buttonLogin = document.getElementById('buttonLoginTemplate');
    let buttonRegister = document.getElementById('buttonRegisterTemplate');
    let registerGrid = document.getElementsByClassName('register-grid')[0];
    let divsRegister = Array.from(document.querySelectorAll('div.register-grid>div'));

    buttonLogin.addEventListener('click', () => {
        changeToLoginTemplate(divsRegister, registerGrid);
    });
    buttonRegister.addEventListener('click', () => {
        changeToRegisterTemplate(divsRegister, registerGrid);
    });

}

function changeToRegisterTemplate(divsRegister, registerGrid) {
    registerGrid.style.gridTemplate = "1fr / 1fr 2fr";

    /*   divsRegister.forEach((div, index) => {
          if (index < 2) {
              div.classList.remove('d-none');
          } else {
              div.classList.add('d-none');
          }
      }) */
}

function changeToLoginTemplate(divsRegister, registerGrid) {
    registerGrid.style.gridTemplate = "1fr / 2fr 1fr";

    /* divsRegister.forEach((div, index) => {
        if (index >= 2) {
            div.classList.remove('d-none');
        } else {
            div.classList.add('d-none');
        }
    }) */
}

window.onload = () => {
    loadWindow()
}