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
    } else if (password.length < 6 || password.length > 15) {
        mostrarNotificacion("La contraseña debe tener mínimo 6 caracteres y máximo 15", "error");
    } else if (password !== password2) {
        mostrarNotificacion("Las contraseñas no coinciden", "error");
    } else {
        const infoForm = new FormData();
        infoForm.append("user_nickname", nickname);
        infoForm.append("user_email", email);
        infoForm.append("user_password", password);
        registrarUsuario(infoForm);
    }
}

const registrarUsuario = (datos) => {

    const xhr = new XMLHttpRequest();
    xhr.open("POST", `includes/modelos/login.php`, true);
    xhr.onload = function () {
        if (this.status === 200 && xhr.readyState == 4) {
            console.log(JSON.parse(xhr.responseText));
            const resultado = JSON.parse(xhr.responseText);
            if (resultado.nick == 'ocupado') {
                mostrarNotificacion("El nombre de usuario ya está en uso", "error");
            } else if (resultado.correo == 'ocupado') {
                mostrarNotificacion("El correo ya está en uso", "error");
            } else {
                mostrarNotificacion("Usuario creado correctamente", "good");
            }
        } else {
            console.log("Algo salió mal");
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
