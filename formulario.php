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
        </div>
    </form>
</main>

<?php include 'layouts/footer.php'?>