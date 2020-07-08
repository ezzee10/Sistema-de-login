const form = document.querySelector("#form");
form.addEventListener("submit", readForm);

function readForm(e) {
    e.preventDefault();

    const nickname = document.querySelector("#nickname").value;
    const password = document.querySelector("#password").value;

    if (nickname === '' || password === '') {
        mostrarNotificacion("Ingrese un nombre de usuario y una contraseña", "error");
    } else {
        const infoForm = new FormData();
        infoForm.append("user_nickname", nickname);
        infoForm.append("user_password", password);
        autenticarUsuario(infoForm);
    }
}

const autenticarUsuario = (datos) => {

    const xhr = new XMLHttpRequest();
    xhr.open("POST", `includes/modelos/validacion-login.php`, true);
    xhr.onload = function () {
        if (this.status === 200 && xhr.readyState == 4) {
            const resultado = JSON.parse(xhr.responseText);
            if (resultado.nick == 'rechazado') {
                mostrarNotificacion("El nombre de usuario no existe", "error");
            } else if (resultado.password == 'rechazado') {
                mostrarNotificacion("La contraseña es incorrecta", "error");
            } else {
                window.location = "home.php";
            }
        } else {
            console.log("Algo salió mal");
        }
    }
    xhr.send(datos);
}

const mostrarNotificacion = (mensaje, estado) => {

    if (document.querySelector(".notificacion")) {
        return;
    }

    const alerta = document.createElement("div");
    alerta.classList.add(estado, "notificacion", "visible");
    alerta.textContent = mensaje;
    contenedor = document.querySelector(".container");
    contenedor.insertBefore(alerta, document.querySelector("#form"));

    setTimeout(() => {
        alerta.classList.add("visible");

        setTimeout(() => {
            alerta.classList.remove("visible");

            setTimeout(() => {
                alerta.remove();
            }, 500);
        }, 1000);
    }, 100);
}
