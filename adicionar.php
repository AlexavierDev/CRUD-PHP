<?php

include_once 'includes/header.php';

?>

    <div class="container text-center">
        <form action="actions/create.php" method="post">
            <div class="form-group">
                <label for="titulo">Titulo da Tarefa</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Passear com cachorro">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição da Tarefa</label>
                <textarea class="form-control" id="descricao" name="descricao"
                          placeholder="Sair pela manha e ir ate o parque com o BOB" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success" name="btn-cadastrar">Adicionar Tarefa</button>
            <a href="index.php" class="btn btn-primary" >Listar Tarefas</a>
        </form>
    </div>

<?php
include_once 'includes/footer.php';
?>

