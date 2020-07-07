<?php 
     
     //traigo la conexion de la base de datos
     require_once('includes/data-base/bd.php');

     //declaro las variables vacias
     $nickname = $email = $password = "";
     $nick_err = $email_err = $pass_err = "";

     //si el metodo que realiza el formulario es de tipo post entonces
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
          //si el POST de nickname está vacio entonces
          if(empty(trim($_POST["nickname"]))){
               //guardo el mensaje de error
               $nick_err="Por favor, ingrese un nombre de usuario";
          }else{
                    try {
                    //   
                    $stmt = $conn->prepare("SELECT id_user FROM usuario WHERE user_nickname = ?");
                    $stmt->bind_param("s", trim($_POST["nickname"]) );
                    $stmt->execute();
                    
                    if($stmt->num_rows == 1) {
                         $nick_err = "Este nombre de usuario ya está en uso";
                    }else{
                        $nickname = trim($_POST["nickname"]);
                    }
                    
               } catch(Exception $e) {
                    $respuesta = array(
                         'error' => $e->getMessage()
                    );
                     
     }
}
     
          //VALIANDO EMAIL
          
          if(empty(trim($_POST["email"]))){
               //guardo el mensaje de error
               $email_err="Por favor, ingrese un email";
          }else{
                    try {
                    $stmt = $conn->prepare("SELECT id_user FROM usuario WHERE user_email = ?");
                    $stmt->bind_param("s", trim($_POST["email"]));
                    $stmt->execute();
                    if($stmt->num_rows == 1) {
                         $email_err = "Este email ya está en uso";
                    }else{
                         $email = trim($_POST["email"]);
                    }
               } catch(Exception $e) {
                    $respuesta = array(
                         'error' => $e->getMessage()
                    );
     }
}
/*
          //VALIDANDO CONTRASEÑA
          if(empty(trim($_POST["password"]))){
               $pass_err ="Por favor, ingrese una contraseña";
          }elseif(strlen(trim($_POST["password"]))<6){
                $pass_err ="La contraseña debe de tener al menos 4 caracteres";
          }else{
               $password = trim($_POST["password"]);
          }

          //COMPROBANDO LOS ERRORES DE ENTRADA ANTES DE INSERTAR LOS DATOS EN LA BD
          if(empty($nick_err) && empty($email_err) && empty($pass_err)){
               //INGRESO LOS VALORES EN LA BD

                    try {
                    $stmt = $conn->prepare("INSERT INTO usuario (user_nickname, user_email, user_password) VALUES (?, ?, ?)");
                    $stmt->bind_param("sss", $nickname, $email, password_hash($password,PASSWORD_DEFAULT));
                    $stmt->execute();
                    if($stmt->affected_rows == 1) {
                        header("location: index.php");
                    }else{
                         echo "Algo salió mal";
                    }
                    } catch(Exception $e) {
                         $respuesta2 = array(
                              'error' => $e->getMessage()
                         );
                    }
          }
*/
          $conn->close();
          
 }







     /*/en caso de que no este vacio
               //preparo un consulta SQL para saber si ya está en la base de datos, entonces 
               //pregunto si hay un id de usuario con el nickname ? es decir uno que dsp le voy a pasar por parametro
               
               $sql = "SELECT id_user FROM usuario WHERE usuario = ?";

               //ahora preparo la consulta el statement y si algo falla mando un else con un echo
               if($stmt = $conn->prepare($sql)){
                    //entonces si se pudo "PREPARAR" la consulta correctamente
                    //le paso por parametro el usuario
                    $stmt->bind_param("s", trim($_POST["nickname"]));
                    //ahora tengo que REALIZAR la consulta pq ya le pase el parametro
                    if($stmt->execute()){
                         
                    }
               }else{
                    echo "Ups! Algo salio mal, intentalo más tarde";
               }
          }
     }
     */
?>