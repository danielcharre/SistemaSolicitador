<?php
require_once '../config/session.php';
require_once '../config/auth.php';
require_once '../config/db.php';

verificaLogin();
verificaAdmin();

// Contagem de usuários (clientes)
$sql_usuarios = "SELECT COUNT(*) AS total_usuarios FROM tuser WHERE tipo = 'cliente'";
$result_usuarios = mysqli_query($conn, $sql_usuarios);
$total_usuarios = mysqli_fetch_assoc($result_usuarios)['total_usuarios'];

// Contagem de solicitações
$sql_solicitacoes = "SELECT COUNT(*) AS total_solicitacoes FROM tsolicitacoes";
$result_solicitacoes = mysqli_query($conn, $sql_solicitacoes);
$total_solicitacoes = mysqli_fetch_assoc($result_solicitacoes)['total_solicitacoes'];

// Contagem de solicitações por status
$sql_status = [
    'pendentes' => "SELECT COUNT(*) AS pendentes FROM tsolicitacoes WHERE status = 'Pendente'",
    'em_analise' => "SELECT COUNT(*) AS em_analise FROM tsolicitacoes WHERE status = 'Em análise'",
    'aprovado' => "SELECT COUNT(*) AS aprovado FROM tsolicitacoes WHERE status = 'Aprovado'",
    'rejeitado' => "SELECT COUNT(*) AS rejeitado FROM tsolicitacoes WHERE status = 'Rejeitado'"
];

$result_status = [];
foreach ($sql_status as $key => $sql) {
    // var_dump($key, $sql);
    // exit;
    $result_status[$key] = mysqli_query($conn, $sql);
    $result_status[$key] = mysqli_fetch_assoc($result_status[$key])[$key];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>
<body>

<div class="container">
    <h1>Dashboard do Administrador</h1>

    <div class="cards">
        <div class="card">
            <h3>Total de Usuários</h3>
            <p><?= $total_usuarios ?></p>
        </div>
        <div class="card">
            <h3>Total de Solicitações</h3>
            <p><?= $total_solicitacoes ?></p>
        </div>
        <div class="card">
            <h3>Solicitações em Análise</h3>
            <p><?= $result_status['em_analise'] ?></p>
        </div>
        <div class="card">
            <h3>Solicitações Aprovadas</h3>
            <p><?= $result_status['aprovado'] ?></p>
        </div>
        <div class="card">
            <h3>Solicitações Pendentes</h3>
            <p><?= $result_status['pendentes'] ?></p>
        </div>
        <div class="card">
            <h3>Solicitações Rejeitadas</h3>
            <p><?= $result_status['rejeitado'] ?></p>
        </div>
    </div>
    <a href="home_admin.php" class="back-link btn" >Voltar</a>
</div>
</body>
</html>
