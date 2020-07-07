<?php 

        require_once('../data-base/bd.php');

        $nickname = filter_var($_POST['user_nickname'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['user_email'], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['user_password'], FILTER_SANITIZE_STRING);

        try{
            //ANTES DE AGREGARLO A LA BD DEBO VERIFICAR QUE NO EXISTA

            $stmt = $conn->query("SELECT id_user FROM usuario WHERE user_nickname = '$nickname' ");
            /*
            $consulta = $stmt->fetch_assoc();
            ?>
<pre>
              <?php echo var_dump($consulta); ?>
          </pre>

<?php
          */
            if($stmt->num_rows == 1){
                 $respuesta= array('estado' => 'ocupado');
            }else{
                 
                    $stmt = $conn->prepare("INSERT INTO usuario (user_nickname, user_email, user_password) VALUES (?,?,?)");
                    $stmt->bind_param("sss", trim($nickname), trim($email), trim($password));
                    $stmt->execute();
                    if($stmt->affected_rows == 1) {
                         $respuesta= array('estado' => 'libre');
               }             
          }
        
        
        
        $conn->close();  

        }catch(Exception $e){
            $respuesta = array(
               'error' => $e->getMessage()
          );
        }
        
        echo json_encode($respuesta);
?>