<?php

    require_once 'settings/conn.php';
    require_once 'settings/configs.php';
    require_once 'settings/validate_page.php';
?>

<h3>Clientes Cadastrado</h3>
<table border="1" width="100%">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Email</th>
            <th>Cidade</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>

        <?php 
            $sql = "SELECT * FROM tclientes";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0) {
                while($dados = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?= $dados['nome'];?></td>
            <td><?= $dados['sobrenome'];?></td>
            <td><?= $dados['email'];?></td>
            <td><?= $dados['cidade'];?></td>
            <td>
                <a href="editar.php?id=<?=$dados['id'];?>">Editar</a>
                <a href="excluir.php?id=<?=$dados['id'];?>">Excluir</a>
            </td>
        </tr>
        <?php 
            }
        }else {
            echo "<tr><td colspan='5' align='center'> Nenhum cliente cadastrado</td></tr>";
        }           
        ?>


    </tbody>
</table>
<a href="home.php">Inicio</a>