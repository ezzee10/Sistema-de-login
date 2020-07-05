<?php 

        require_once('../data-base/bd.php');

        $nickname = filter_var($_POST['user_nickname'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['user_email'], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['user_password'], FILTER_SANITIZE_STRING);

        try{
            $stmt = $conn->prepare("INSERT INTO usuario (user_nickname, user_email, user_password) VALUES (?,?,?)");
            $stmt->bind_param("sss", $nickname, $email, $password);
            $stmt->execute();
         if($stmt->affected_rows == 1) {
               $respuesta = array(
                    'respuesta' => 'correcto',
                    'datos' => array(
                         'nickname' => $nickname,
                         'empresa' => $empresa,
                         'telefono' => $password,
                         'id_insertado' => $stmt->insert_id
                    )
               );
          }
            $stmt->close();
            $conn->close();
        }catch(Exception $e){
            $respuesta = array(
               'error' => $e->getMessage()
          );
        }
        echo json_encode($respuesta);