<?php
    session_start();

    if($_SESSION['loggin']){
        header('location: home.php');
    }

?>

<?php include 'layouts/header.php'?>

<main class="container">

    <form class="form" id="form">
        <h1>Registrarse</h1>

        <div class="campo">
            <input id="nickname" type="text" placeholder="Nombre de usuario">
        </div>
        <div class="campo">
            <input id="email" type="email" placeholder="Correo">
        </div>
        <div class="campo">
            <input id="password" type="password" placeholder="Contraseña">
        </div>
        <div class="campo">
            <input id="password2" type="password" placeholder="Confirmar contraseña">
        </div>
        <div class="campo">
            <button type="submit" class="btn btn-submit">Registrarse</button>
            <a href="index.php">Volver a iniciar sesión</a>
        </div>
    </form>
</main>

</body>

<script src="js/registro.js"></script>

</html>