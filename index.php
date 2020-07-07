<?php include 'layouts/header.php'?>

<main class="container">
    <div class="content">
        <div class="cell">
            <div class="user">
                <label for="user">Nombre de usuario</label>
                <input class="h-50" type="text">
            </div>
        </div>
        <div class="cell">
            <div class="password">
                <label for="password">Contraseña</label>
                <input class="h-50" type="password">
            </div>
        </div>
        <div class="cell">
            <div class="start-session">
                <button type="button" class="btn btn-start w-100">Iniciar sesión</button>
            </div>
            <div class="new-account">
                <button type="submit" class="btn btn-login w-100">
                    Crear una cuenta
                </button>
            </div>
        </div>
        <div class="cell">
            <div class="remember">
                <input class="check" type="checkbox">
                <p>Recordarme</p>
            </div>
            <div class="forgot-password">
                <a href="#">¿Olvidó la contraseña?</a>
            </div>
        </div>
    </div>
    </div>
</main>

<?php include 'layouts/footer.php'?>