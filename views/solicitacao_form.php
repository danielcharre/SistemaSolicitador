<?php
require_once '../config/session.php';
require_once '../config/auth.php';

verificaLogin();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Nova Solicitação</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>
<body>

<div class="container">
    <h2>Criar Nova Solicitação</h2>

    <form action="../controllers/solicitacao_create.php" method="POST">
        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" required>

        <label for="descricao">Descrição</label>
        <textarea id="descricao" name="descricao" rows="4" required></textarea>

        <button type="submit">Criar Solicitação</button>
    </form>

    <a href="home_cliente.php" class="back-link">Voltar</a>
<?php
    if (isset($_SESSION['msg'])) {
        echo "<p>{$_SESSION['msg']}</p>";
        unset($_SESSION['msg']);
    }
?>
</div>

</body>
</html>


