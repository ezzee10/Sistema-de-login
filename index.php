<?php include 'layouts/header.php'?>

<main class="container">

    <form class="form content" id="form">
        <div class="user">
            <label for="user">Nombre de usuario</label>
            <input class="h-50" type="text" id="nickname">
        </div>

        <div class="password mg-top">
            <label for="password">Contraseña</label>
            <input class="h-50" id="password" type="password">
        </div>

        <div class="start-session mg-top">
            <button type="submit" class="btn btn-start w-100">
                <a href="home.php"> Iniciar sesión</a>
            </button>
        </div>

        <div class="new-account mg-top">
            <button type="button" class="btn btn-login w-100">
                <a href="formulario.php">Crear una cuenta</a>
            </button>
        </div>

        <div class="footer-form mg-top">
            <div class="remember">
                <input class="check" type="checkbox">
                <p>Recordarme</p>
            </div>
            <div class="forgot-password">
                <a href="#">¿Olvidó la contraseña?</a>
            </div>
        </div>
    </form>

</main>

</body>

<script src="js/login.js"></script>

</html>