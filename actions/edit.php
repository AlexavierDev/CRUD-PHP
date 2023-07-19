<?php
// Definir o fuso horário para o Brasil
date_default_timezone_set('America/Sao_Paulo');
session_start();
require_once 'connectDB.php';

if (isset($_POST['btn-editar'])) {
    //PEGA OS VALORES DO FORMULARIO
    $tarefa = mysqli_escape_string($connectBD, $_POST['titulo']);
    $descricao = mysqli_escape_string($connectBD, $_POST['descricao']);
    $id = mysqli_escape_string($connectBD, $_POST['id']);
    $dataAtual = date('Y-m-d H:i:s'); // PEGA DIA,MES,ANO,HORA E MINUTOS ATUAIS


    //CRIA A QUERY PARA ATUALIZAR OS VALORES NO BD
    $sql = "UPDATE tarefas SET titulo = '$tarefa', descricao = '$descricao', criada = '$dataAtual' WHERE id = '$id'";

    if (mysqli_query($connectBD, $sql)) {
        $_SESSION['mensagem'] = 'Atualizado com sucesso';
        header('location:../index.php?sucesso');

    } else {
        $_SESSION['mensagem'] = 'Não foi possivel atualizar';
        header('location:../index.php?erro');
    }

}