<?php
require_once '../config/db.php';
require_once '../config/session.php';
require_once '../config/auth.php';

verificaLogin();
verificaAdmin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $novo_status = trim(filter_input(INPUT_POST, 'novo_status'));

    if ($id && $novo_status) {
        $sql = "UPDATE tsolicitacoes SET status = '$novo_status' WHERE id = $id";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['msg'] = "Status atualizado com sucesso!";
            $_SESSION['msg_tipo'] = "sucesso"; // Novo
        } else {
            $_SESSION['msg'] = "Erro ao atualizar status.";
            $_SESSION['msg_tipo'] = "erro"; // Novo
        }
    } else {
        $_SESSION['msg'] = "Dados inválidos para atualização.";
        $_SESSION['msg_tipo'] = "erro"; // Novo
    }
}

header('Location: ../views/solicitacoes_list.php');
exit;
