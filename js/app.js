const form = document.querySelector("#form");

const readForm = (e) => {
    e.preventDefault();

    const nickname = document.querySelector("#nickname").value;
    const email = document.querySelector("#email").value;
    const password = document.querySelector("#password").value;
    const password2 = document.querySelector("#password2").value;

    const infoForm = new FormData();
    infoForm.append("user_nickname", nickname);
    infoForm.append("user_email", email);
    infoForm.append("user_password", password);
    registrarUsuario(infoForm);
}

form.addEventListener("submit", readForm);

const registrarUsuario = (datos) => {

    const xhr = new XMLHttpRequest();
    xhr.open("POST", `includes/modelos/login.php`, true);
    xhr.onload = function () {
        if (this.status === 200 && xhr.readyState == 4) {
            console.log("estoy conectado");
        } else {
            console.log("No se obtuvieron datos");
        }
    }
    xhr.send(datos);
} 
