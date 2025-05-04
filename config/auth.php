<?php 
    require_once 'session.php';

    function verificaLogin(){

        if(!isset($_SESSION['logado']) || !isset($_SESSION['id_user'])) {
            $_SESSION['msg'] = "Você precisa está logado para acessar o sistema";
            header("Location: ../views/login.php");
            exit;
        }
    }

    function verificaAdmin() {
        if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
            $_SESSION['msg'] = "Acesso restrito a administradores.";
            header('Location: ../views/home_cliente.php');
            exit;
        }
    }
?>