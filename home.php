<?php

    session_start();

if(!isset($_SESSION['loggin'])){
    echo 'bienvenido session';
    header("location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>

    <h1>TE HAS LOGEADO PERFECTAMENTE</H1>

    <a href="cerrar-sesion.php" class="btn"> CERRAR SESION</a>

</body>

</html>