<?php

require_once 'actions/connectDB.php';
include_once 'includes/header.php';

if (isset($_GET['id'])) {
    $id = mysqli_escape_string($connectBD, $_GET['id']);
    $sql = "SELECT * FROM tarefas WHERE id = '$id'";
    $resultado = mysqli_query($connectBD, $sql);
    $dados = mysqli_fetch_array($resultado);
}


?>

<div class="container text-center">

    <form action="actions/edit.php" method="post">
        <h2>Editar Tarefa</h2>
        <!--   INPUT HIDDEN SOMENTE PARA PASSAR O ID -->
        <input type="hidden" name="id" value="<?= $dados['id'] ?>">
        <div class="form-group">
            <label for="titulo">Titulo da Tarefa</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $dados['titulo'] ?>">
        </div>

        <div class="form-group">
            <label for="descricao">Descrição da Tarefa</label>
            <textarea class="form-control" id="descricao" name="descricao"
                      rows="3"><?= $dados['descricao'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-success" name="btn-editar">Editar Tarefa</button>
        <a href="index.php" class="btn btn-primary">Listar Tarefas</a>
    </form>
</div>

<?php
include_once 'includes/footer.php';
?>

