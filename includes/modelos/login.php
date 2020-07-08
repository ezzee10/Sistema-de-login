<?php 

        require_once('../data-base/bd.php');

        $nickname = filter_var(trim($_POST['user_nickname']), FILTER_SANITIZE_STRING);
        $password = filter_var(trim($_POST['user_password']), FILTER_SANITIZE_STRING);
        $respuesta = array('nick' => 'rechazado', 'password' => 'rechazado');

        try{
            //PRIMERO VERIFICO QUE EL NOMBRE DE USUARIO EXISTA EN LA BASE DE DATOS
            $stmt = $conn->query("SELECT user_password FROM usuario WHERE user_nickname = '$nickname' ");
            if($stmt->num_rows == 1){
                $respuesta['nick'] = 'aprobado';
                //AHORA VERIFICO LA CONTRASEÑA
                $consulta = $stmt->fetch_assoc();
                if($consulta['user_password'] === $password){
                    $respuesta['password'] = 'aprobado';
                }else{
                    $respuesta['password'] = 'rechazado';
                }
            }else{
                 $respuesta['nick'] = 'rechazado';
            }
            
          
          $conn->close();       
          }catch(Exception $e){
            $respuesta = array(
               'error' => $e->getMessage()
          );
        }
        
        echo json_encode($respuesta);
?>