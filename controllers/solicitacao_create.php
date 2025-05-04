<?php 

    require_once '../config/db.php';
    require_once '../config/session.php';
    require_once '../config/auth.php';
    
    verificaLogin();

    $titulo = trim(filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING));
    $descricao = trim(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING));

    if(empty($titulo) || empty($descricao)) {
        $_SESSION['msg'] = "Todos os campos são obrigatórios.";
        header("Location: ../views/solicitacao_form.php");
        exit;
    }

    $id_user = $_SESSION['id_user'];

    $sql = "INSERT INTO tsolicitacoes (id_user, titulo, descricao, status) VALUES ('$id_user', '$titulo', '$descricao', 'Pendente')";

    if(mysqli_query($conn, $sql)) {
        $_SESSION['msg'] = "Solicitação enviada com sucesso!";
    } else {
        $_SESSION['msg'] = "Erro ao enviar solicitação";
    }

    mysqli_close($conn);
    header("Location: ../views/solicitacao_form.php");
    exit;
?>