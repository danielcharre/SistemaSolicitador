<?php
require_once '../config/session.php';
require_once '../config/auth.php';
require_once '../config/db.php';

verificaLogin();

$id_user = $_SESSION['id_user'];
$tipo_usuario = $_SESSION['tipo_usuario'];

$registros_por_pagina = 6;

// Página atual
$pagina_atual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina_atual < 1) $pagina_atual = 1;

// Calcula o OFFSET
$offset = ($pagina_atual - 1) * $registros_por_pagina;

$tipo_usuario = $_SESSION['tipo_usuario'];
$id_user = $_SESSION['id_user'];

$sql = "SELECT s.id, s.titulo, s.descricao, s.status, s.data_criacao, u.nome 
        FROM tsolicitacoes s 
        JOIN tuser u ON s.id_user = u.id 
        WHERE 1=1"; // 1=1 é sempre verdadeiro, usado para facilitar a adição de condições dinâmicas

$sql_count = "SELECT COUNT(*) as total FROM tsolicitacoes s JOIN tuser u ON s.id_user = u.id WHERE 1=1";

// Filtros iguais aos aplicados
if (isset($_GET['status']) && !empty($_GET['status'])) {
    $status = mysqli_real_escape_string($conn, $_GET['status']);
    $sql .= " AND s.status = '$status'";
    $sql_count .= " AND s.status = '$status'";
}

if (isset($_GET['data_inicio']) && !empty($_GET['data_inicio']) && isset($_GET['data_fim']) && !empty($_GET['data_fim'])) {
    $data_inicio = mysqli_real_escape_string($conn, $_GET['data_inicio']);
    $data_fim = mysqli_real_escape_string($conn, $_GET['data_fim']);
    $sql .= " AND s.data_criacao BETWEEN '$data_inicio' AND '$data_fim'";
    $sql_count .= " AND s.data_criacao BETWEEN '$data_inicio' AND '$data_fim'";
}

if ($_SESSION['tipo_usuario'] === 'admin' && isset($_GET['cliente']) && !empty($_GET['cliente'])) {
    $cliente = mysqli_real_escape_string($conn, $_GET['cliente']);
    $sql .= " AND s.id_user = $cliente";
    $sql_count .= " AND s.id_user = $cliente";
} elseif ($_SESSION['tipo_usuario'] === 'cliente') {
    $sql .= " AND s.id_user = $id_user";
    $sql_count .= " AND s.id_user = $id_user";
}

// Executa o count
$result_count = mysqli_query($conn, $sql_count);
$total_registros = mysqli_fetch_assoc($result_count)['total'];

// Calcula o total de páginas
$total_paginas = ceil($total_registros / $registros_por_pagina);

// Adiciona LIMIT e OFFSET à consulta principal
$sql .= " ORDER BY s.data_criacao DESC LIMIT $registros_por_pagina OFFSET $offset"; // Limita os resultados a 5 e define o OFFSET

// Executa a consulta principal
$result = mysqli_query($conn, $sql);

// Adicionado tratamento de erro na consulta
if (!$result) {
    die('Erro na consulta: ' . mysqli_error($conn));
}
?>

<head>
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>
<div class="container">
    <header>
        <h1>Solicitações</h1>
    </header>

    <form action="solicitacoes_list.php" method="GET">
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="">-- Selecione --</option>
            <option value="Em análise">Em análise</option>
            <option value="Aprovado">Aprovado</option>
            <option value="Rejeitado">Rejeitado</option>
        </select>

        <label for="data_inicio">Data Início</label>
        <input type="date" name="data_inicio" id="data_inicio">

        <label for="data_fim">Data Fim</label>
        <input type="date" name="data_fim" id="data_fim">

        <?php if($tipo_usuario === 'admin'): ?>
            <label for="cliente">Cliente:</label>
            <select name="cliente" id="cliente">
                <option value="">-- Selecione --</option>
                <?php
                    $sql = "SELECT id, nome FROM tuser WHERE tipo = 'cliente'";
                    $result_cliente = mysqli_query($conn, $sql);
                    while($cliente = mysqli_fetch_assoc($result_cliente)): ?>
                        <option value="<?= $cliente['id']?>"><?= htmlspecialchars($cliente['nome'])?></option>
                    <?php endwhile;
                ?>
            </select>
        <?php endif; ?>
        <button type="submit">Filtrar</button>
    </form>

    <?php if (isset($_SESSION['msg'])): ?>
        <div class="msg <?= strpos($_SESSION['msg'], 'sucesso') !== false ? 'success' : '' ?>">
            <?= $_SESSION['msg']; unset($_SESSION['msg']); ?>
        </div>
    <?php endif; ?>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Status</th>
                <th>Data Criação</th>
                <?php if ($tipo_usuario === 'admin') echo "<th>Cliente</th><th>Ações</th>"; ?>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['titulo'] ?></td>
                <td><?= $row['descricao'] ?></td>
                <td><?= $row['status'] ?></td>
                <td><?= $row['data_criacao'] ?></td>
                <?php if ($tipo_usuario === 'admin'): ?>
                    <td><?= $row['nome'] ?></td>
                    <td>
                        <form action="../controllers/solicitacao_update.php" method="POST">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <select name="novo_status" required>
                                <option value="">-- Selecionar --</option>
                                <option value="Em análise">Em análise</option>
                                <option value="Aprovado">Aprovado</option>
                                <option value="Rejeitado">Rejeitado</option>
                            </select>
                            <button type="submit">Atualizar</button>
                        </form>
                    </td>
                <?php endif; ?>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <div class="pagination">
        <?php if ($pagina_atual > 1): ?>
            <a href="?pagina=<?= $pagina_atual - 1 ?>">Anterior</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
            <a href="?pagina=<?= $i ?>" <?= ($i == $pagina_atual) ? 'style="font-weight:bold;"' : '' ?>><?= $i ?></a>
        <?php endfor; ?>

        <?php if ($pagina_atual < $total_paginas): ?>
            <a href="?pagina=<?= $pagina_atual + 1 ?>">Próxima</a>
        <?php endif; ?>
    </div>

    <div class="action-buttons">
        <a href="../views/home_<?= $tipo_usuario ?>.php" class="btn">Voltar</a>
    </div>
</div>