<?php 

    require_once '../config.php';
    require_once '../config.session.php';

    if(!isset($_SESSION['logado'])) {
        header("Location: index.php");
        exit;
    }

    require_once '../pages/home.php';
?>