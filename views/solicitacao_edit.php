<?php
require_once '../config/db.php';
require_once '../config/session.php';
require_once '../config/auth.php';

verificaLogin();
verificaAdmin();

// Verifica se o parâmetro 'id' foi passado
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    $_SESSION['msg'] = "Solicitação inválida.";
    header('Location: solicitacoes_list.php');
    exit;
}

// Busca os dados da solicitação
$sql = "SELECT * FROM tsolicitacoes WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);
$dados = mysqli_fetch_assoc($result);

if (!$dados) {
    $_SESSION['msg'] = "Solicitação não encontrada.";
    header('Location: solicitacoes_list.php');
    exit;
}
?>

<h3>Editar Solicitação</h3>

<form action="../../controllers/solicitacao_update.php" method="POST">
    <input type="hidden" name="id" value="<?= $dados['id']; ?>">
    
    <label for="status">Status:</label>
    <select name="status" id="status">
        <option value="Pendente" <?= $dados['status'] == 'Pendente' ? 'selected' : ''; ?>>Pendente</option>
        <option value="Em Progresso" <?= $dados['status'] == 'Em Progresso' ? 'selected' : ''; ?>>Em Progresso</option>
        <option value="Finalizado" <?= $dados['status'] == 'Finalizado' ? 'selected' : ''; ?>>Finalizado</option>
    </select>
    
    <br><br>
    <input type="submit" value="Atualizar Status">
</form>

<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<a href="solicitacoes_list.php">Voltar à listagem de solicitações</a>
