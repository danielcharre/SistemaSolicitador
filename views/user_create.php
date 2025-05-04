<?php require_once '../config/session.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Usuário</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>
<body>

<div class="container">
    <h1>Criar Usuário</h1>
    <hr>

    <?php if (isset($_SESSION['msg'])): ?>
        <div class="error-message">
            <?= $_SESSION['msg']; unset($_SESSION['msg']); ?>
        </div>
    <?php endif; ?>
    <div class="user-create">
        <form action="../controllers/user_create.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" required>
            
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            
            <input type="submit" name="btn-criar" value="Cadastrar">
        </form>
    </div>
    
    <div class="action-buttons">
            <a href="login.php" class="btn">Voltar</a>
        </div>
    </div>
</div>

</body>
</html>
