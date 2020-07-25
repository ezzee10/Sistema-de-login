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
            <label for="password">Contraseña:</label>
            <input id="password" type="password">
        </div>

        <div class="campo">
            <button type="submit" class="btn btn-start w-100">
                Iniciar sesión
            </button>
        </div>

        <div class="campo txt-center">
            <a href="formulario.php">Crear una cuenta</a>
        </div>
    </form>

</main>

</body>

<script src="js/login.js"></script>

</html>