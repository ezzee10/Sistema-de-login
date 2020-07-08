<?php

//CREO UNA SESION
session_start();
 
//SI LA SESION ESTÁ INICIADA ENTONCES ME REDIRECCIONA A HOME
if(isset($_SESSION['user_id']) && $_SESSION['user_id'] === true){
    header('Location: home.php');
    exit;
} else {
    // Show users the page!
}

?>