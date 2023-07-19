<?php
session_start();
require_once 'connectDB.php';

if (isset($_GET['id'])) {
    //PEGA O ID PELA URL
    $id = mysqli_escape_string($connectBD, $_GET['id']);

    //CRIA A QUERY PARA DELETAR OS VALORES NO BD
    $sql = "DELETE FROM tarefas WHERE id = '$id'";

    if (mysqli_query($connectBD, $sql)) {
        $_SESSION['mensagem'] = 'Excluido com sucesso';
        header('location:../index.php?sucesso');

    } else {
        $_SESSION['mensagem'] = 'Não foi possivel excluir';
        header('location:../index.php?erro');
    }

}