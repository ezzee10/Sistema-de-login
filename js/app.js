const form = document.querySelector("#form");
form.addEventListener("submit", readForm);

function readForm(e) {
    e.preventDefault();

    const nickname = document.querySelector("#nickname").value;
    const email = document.querySelector("#email").value;
    const password = document.querySelector("#password").value;
    const password2 = document.querySelector("#password2").value;

    if (nickname === '' || email === '' || password === '' || password2 === '') {
        mostrarNotificacion("Todos los campos son obligatorios", "error");
    } else if (!validar_email(email)) {
        mostrarNotificacion("Email inválido", "error");
    } else if (password.length < 6) {
        mostrarNotificacion("La contraseña debe tener mínimo 6 caracteres", "error");
    } else if (password !== password2) {
        mostrarNotificacion("Las contraseñas no coinciden", "error");
    } else {
        const infoForm = new FormData();
        infoForm.append("user_nickname", nickname);
        infoForm.append("user_email", email);
        infoForm.append("user_password", password);
        registrarUsuario(infoForm);
        mostrarNotificacion("Usuario creado correctamente", "good");
    }
}

const registrarUsuario = (datos) => {

    const xhr = new XMLHttpRequest();
    xhr.open("POST", `includes/modelos/registro.php`, true);
    xhr.onload = function () {
        if (this.status === 200 && xhr.readyState == 4) {
            console.log("estoy conectado");
            console.log((xhr.responseText));
        } else {
            console.log("No se obtuvieron datos");
        }
    }
    xhr.send(datos);
}

const validar_email = (email) => {
    if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email)) {
        return true;
    }
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

const usuarioExiste = (datos) => {

    const xhr = new XMLHttpRequest();
    xhr.open("POST", `includes/modelos/registro.php`, true);
    xhr.onload = function () {
        if (this.status === 200 && xhr.readyState == 4) {
            console.log("estoy conectado");
        } else {
            console.log("No se obtuvieron datos");
        }
    }
    xhr.send(datos);
}







