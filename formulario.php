 <?php include 'registro.php'; ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login</title>
     <link rel="stylesheet" href="styles/normalize.css">
     <link rel="stylesheet" href="styles/styles.css">
 </head>

 <body>

     <main class="container">
         <div class="form">
             <h1>Registro</h1>
             <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                 <div class="campo">
                     <input type="text" placeholder="Nombre de usuario" name="nickname">
                     <span class="msg-error"><?php echo $nick_err; ?></span>
                 </div>
                 <div class="campo">
                     <input type="email" placeholder="Correo" name="email">
                     <span class="msg-error"><?php echo $email_err; ?></span>
                 </div>
                 <div class="campo">
                     <input type="password" placeholder="Contraseña" name="password">
                     <span class="msg-error"><?php echo $pass_err; ?></span>
                 </div>
                 <div class="campo">
                     <input type="password" placeholder="Confirmar contraseña" name="password2">
                 </div>
                 <div class="campo">
                     <div class="campo-footer">
                         <input type="submit" value="registrarse"></input>
                         <a href="index.php">Volver a iniciar sesión</a>
                     </div>
                 </div>
             </form>
         </div>
     </main>
 </body>

 </html>