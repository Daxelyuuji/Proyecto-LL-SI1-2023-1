
function validarFormulario() {
    var email = document.forms["miFormulario"]["email"].value;
    var contrasena1 = document.forms["miFormulario"]["contrasena1"].value;
    var contrasena2 = document.forms["miFormulario"]["contrasena2"].value;
    if (email == "") {
        alert("Por favor, ingrese su correo electrónico.");
        return false;
    }

// Expresión regular para validar correo electrónico
    var expresion = /\S+@\S+\.\S+/;
    if (!expresion.test(email)) {
        alert("Ingrese un correo electrónico válido");
        return false;
    }

    if (contrasena1 == "" || contrasena2 == "") {
        alert("Por favor, ingrese las contraseñas.");
        return false;
    }

    if (contrasena1 != contrasena2) {
        alert("Las contraseñas no coinciden.");
        return false;
    }
}





function validarCorreo(correo) {
    let expresion = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return expresion.test(correo);
    alert('Se le ha enviado una notificacion a su correo electronico.');
}
let form = document.querySelector('.form-register');
let progressOptions = document.querySelectorAll('.progressbar__option');
form.addEventListener('click', function (e) {
    let element = e.target;
    let isButtonNext = element.classList.contains('step__button--next');
    let isButtonBack = element.classList.contains('step__button--back');
    if (isButtonNext || isButtonBack) {
        let currentStep = document.getElementById('step-' + element.dataset.step);
        let jumpStep = document.getElementById('step-' + element.dataset.to_step);
        currentStep.addEventListener('animationend', function callback() {
            currentStep.classList.remove('active');
            jumpStep.classList.add('active');
            if (isButtonNext) {
                currentStep.classList.add('to-left');
                progressOptions[element.dataset.to_step - 1].classList.add('active');
            } else {
                jumpStep.classList.remove('to-left');
                progressOptions[element.dataset.step - 1].classList.remove('active');
            }
            currentStep.removeEventListener('animationend', callback);
        });
        currentStep.classList.add('inactive');
        jumpStep.classList.remove('inactive');
    }
});
