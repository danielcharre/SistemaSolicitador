<?php 

    require_once '../config/db.php';
    require_once '../config/session.php';

    if(isset($_POST['btn-entrar'])) {

        $login = filter_input(INPUT_POST, 'login');
        $senha = filter_input(INPUT_POST, 'senha');

        if(empty($login) || empty($senha)) {
            $_SESSION['msg'] = "Os campos login/senha não podem ser vazios";
            header("Location: ../views/login.php");
            exit;
        }

        $sql = "SELECT * FROM tuser WHERE login = '$login'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            $senha = md5($senha);
            $sql = "SELECT * FROM tuser WHERE login = '$login' AND senha = '$senha'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) == 1) {
                $dados = mysqli_fetch_array($result);
                mysqli_close($conn);

                $_SESSION['logado'] = true;
                $_SESSION['id_user'] = $dados['id'];
                $_SESSION['nome'] = $dados['nome'];
                $_SESSION['tipo_usuario'] = $dados['tipo'];

                if($_SESSION['tipo_usuario'] == 'admin'){
                    header("Location: ../views/home_admin.php");
                    exit;
                }else {
                    header("Location: ../views/home_cliente.php");
                    exit;
                }


            } else {
                $_SESSION['msg'] = "Usuário/senha Inválidos";
            }
        } else {
            $_SESSION['msg'] = "Usuário não cadastrao";
        }

        header("Location: ../views/login.php");
        exit;

    }

?>