<?php require_once '../config/session.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>
<body>
    
    <form action="../controllers/login.php" method="POST">
        <div class="imgcontainer">
            <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar"> -->
        </div>

        <div class="container">
            <label for="uname"><b>Login</b></label>
            <input type="text" placeholder="Digite seu login" name="login" required>

            <label for="psw"><b>Senha</b></label>
            <input type="password" placeholder="Digite sua senha" name="senha" required>
                
            <button type="submit" name="btn-entrar">Login</button>
            <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="">
            <span class="psw">Ainda não é Usuário ? <a href="../views/user_create.php" class="cancelbtn">Criar conta</a></span>
        </div>
    </form>
    <?php 
        if (isset($_SESSION['msg'])): ?>
                <div class="error-message">
                    <?= $_SESSION['msg']; unset($_SESSION['msg']); ?>
                </div>
    <?php endif; ?>
</body>
</html>
