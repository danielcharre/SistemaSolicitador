<?php 

    require_once '../config/session.php';

    if(isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
        
        if($_SESSION['tipo_usuario'] == 'admin'){
            header("Location: ../views/home_admin.php");
            exit;

        } else {
            header("Location: ../views/home_cliente.php");
            exit;
        }
        
        
    }
    header("Location: ../views/login.php");
    exit;

?>