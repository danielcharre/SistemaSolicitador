<?php 

    require_once '../config/db.php';
    require_once '../config/session.php';
    
    if(isset($_POST['btn-criar'])) {

        

        $nome = trim(filter_input(INPUT_POST, 'nome'));
        $email = trim(filter_input(INPUT_POST, 'email'));
        $login = trim(filter_input(INPUT_POST, 'login'));
        $senha = trim(filter_input(INPUT_POST, 'senha'));
        

        

        if(empty($nome) || empty($email) || empty($senha)) {
            $_SESSION['msg'] = "Todos os campos são obrigatórios";
            header("Location: ../views/user_create.php");
            exit;
        }

        $checkUser = mysqli_query($conn, "SELECT id FROM tuser WHERE login = '$login'");
        if(mysqli_num_rows($checkUser) > 0) {
            $_SESSION['msg'] = "Login já está em uso";
            header('Location: ../views/user_create.php');
            exit;
        }

        $senhaHash = md5($senha);

        $query = "INSERT INTO tuser (nome, email, login, senha) VALUES ('$nome', '$email', '$login', '$senhaHash')";
        if (mysqli_query($conn, $query)) {
            $_SESSION['msg'] = "Conta criada com sucesso. Faça o login.";
            header('Location: ../views/login.php');
            exit;
        } else {
            $_SESSION['msg'] = "Erro ao criar conta. Tente novamente.";
            header('Location: ../views/user_create.php');
            exit;
        }
    }

?>