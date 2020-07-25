<?php
    session_start();

    if($_SESSION['loggin']){
        header('location: home.php');
    }

?>

<?php include 'layouts/header.php'?>

<main class="container">

    <form class="content" id="form">
        <div class="campo">
            <label for="user">Nombre de usuario:</label>
            <input type="text" id="nickname">
        </div>

        <div class="campo">
            <label for="email">Correo:</label>
            <input id="email" type="email">
        </div>

        <div class="campo">
            <label for="password">Contraseña:</label>
            <input id="password" type="password">
        </div>

        <div class="campo">
            <label for="password">Confirmar contraseña:</label>
            <input id="password2" type="password">
        </div>

        <div class="campo">
            <button type="submit" class="btn">
                Registrarse
            </button>
        </div>

        <div class="campo txt-center">
            <a href="index.php">Volver a iniciar sesión</a>
        </div>
    </form>

</main>

</body>

<script src="js/registro.js"></script>

</html>