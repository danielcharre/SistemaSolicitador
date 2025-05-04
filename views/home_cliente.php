<?php
require_once '../config/session.php';
require_once '../config/auth.php';
verificaLogin();
$tipo_usuario = $_SESSION['tipo_usuario'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Admin</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Bem-vindo, <?= $_SESSION['nome']; ?></h2>

        <!-- Botão para acessar as solicitações -->
        <div class="action-buttons">
            <a href="../views/solicitacao_form.php" class="btn">Nova Solicitação</a>
            <a href="../views/solicitacoes_list.php" class="btn">Ver Solicitações</a>
            <a href="../logout.php" class="btn">Sair</a>
        </div>

        <!-- Outras informações do admin podem ser adicionadas aqui -->

    </div>
</body>
</html>