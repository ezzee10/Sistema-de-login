<?php 

        require_once('../data-base/bd.php');

        $nickname = filter_var(trim($_POST['user_nickname']), FILTER_SANITIZE_STRING);
        $email = filter_var(trim($_POST['user_email']), FILTER_SANITIZE_STRING);
        $password = filter_var(trim($_POST['user_password']), FILTER_SANITIZE_STRING);
        $respuesta = array('nick' => '', 'correo'=> '');

        try{
            //ANTES DE AGREGARLO A LA BD DEBO VERIFICAR QUE NO EXISTA
            $stmt = $conn->query("SELECT id_user FROM usuario WHERE user_nickname = '$nickname' ");
            if($stmt->num_rows == 1){
                 $respuesta['nick'] = 'ocupado';
            }else{
                 $respuesta['nick'] = 'libre';
            }
            
          //AHORA VERIFICO EL EMAIL
          $stmt = $conn->query("SELECT id_user FROM usuario WHERE user_email = '$email' ");
           if($stmt->num_rows == 1){
                 $respuesta['correo'] = 'ocupado';
            }else{
                 $respuesta['correo'] = 'libre';
           }        
           
          //SI ALGUN CAMPO ESTA VACIO ENTONCES NO INSERTO LOS DATOS EN LA BASE DE DATOS
          
          if(($respuesta['nick'] === 'libre') && ($respuesta['correo'] === 'libre')){
                $stmt = $conn->prepare("INSERT INTO usuario (user_nickname, user_email, user_password) VALUES (?,?,?)");
                $stmt->bind_param("sss", $nickname, $email, $password);
                $stmt->execute();
          }
          
          $conn->close();       
          }catch(Exception $e){
            $respuesta = array(
               'error' => $e->getMessage()
          );
        }
        
        echo json_encode($respuesta);
?>