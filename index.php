<?php
include_once 'includes/header.php';
include_once 'includes/mensagem.php';
require_once 'actions/connectDB.php';
?>

<!-- MODAL DE CONFIRMAÇÃO DE EXCLUSÃO  -->
<div class="modal fade" id="confirmarExclusaoModal" tabindex="-1" aria-labelledby="confirmarExclusaoModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmarExclusaoModalLabel">Confirmar Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir esta tarefa?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a href="#" id="btn-confirmar-exclusao" class="btn btn-danger">Excluir</a>
            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT PARA EXECUÇÃO DO MODALS -->
<script>
    var confirmarExclusaoModal = new bootstrap.Modal(document.getElementById('confirmarExclusaoModal'));
    var btnConfirmarExclusao = document.getElementById('btn-confirmar-exclusao');

    confirmarExclusaoModal._element.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Botão que acionou o modal
        var id = button.getAttribute('data-id'); // ID da tarefa a ser excluída
        var href = 'actions/delete.php?id=' + id; // URL de exclusão com o ID

        btnConfirmarExclusao.setAttribute('href', href);
    });
</script>

<!-- TABELA PRA LISTAGEM DAS TAREFAS -->
<div class="container">

<!--STATUS DA OPERAÇÃO SOLICITADA-->
    <div id="myToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
        <div class="toast-header">
            <strong class="me-auto">Status</strong>
        </div>
        <div class="toast-body">
            <?= $mensagem ?>
        </div>
    </div>

    <h1>Lista de Tarefas</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>Criada em</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <!-- LOOP PARA LISTAR AS TAREFAS -->
        <?php
        $sql = "SELECT * FROM tarefas";
        $resultado = mysqli_query($connectBD, $sql);
        while ($dado = mysqli_fetch_array($resultado)) {
            ?>
            <tr>
                <td><?= $dado['id'] ?></td>
                <td><?= $dado['titulo'] ?></td>
                <td><?= $dado['descricao'] ?></td>
                <td><?= $dado['criada'] ?></td>
                <td>
                    <a href="editar.php?id=<?= $dado['id'] ?>" class="btn btn-primary">Editar</a>
                    <a href="#" class="btn btn-danger" name="btn-excluir" data-bs-toggle="modal" data-bs-target="#confirmarExclusaoModal" data-id="<?= $dado['id'] ?>">Excluir</a>

                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a href="adicionar.php" class="btn btn-success">Adicionar Tarefa</a>
</div>

<?php
include_once 'includes/footer.php';
?>
