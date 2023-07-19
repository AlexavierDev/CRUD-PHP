<?php
// Definir o fuso horário para o Brasil
date_default_timezone_set('America/Sao_Paulo');

session_start();
require_once 'connectDB.php';

if (isset($_POST['btn-cadastrar'])) {
    //PEGA OS VALORES DO FORMULARIO
    $tarefa = mysqli_escape_string($connectBD, $_POST['titulo']);
    $descricao = mysqli_escape_string($connectBD, $_POST['descricao']);
    $dataAtual = date('Y-m-d H:i:s'); // PEGA DIA,MES,ANO,HORA E MINUTOS ATUAIS

    //CRIA A QUERY PARA INSERIR OS VALORES NO BD
    $sql = "INSERT INTO tarefas (titulo, descricao, criada) VALUES ('$tarefa', '$descricao','$dataAtual')";

    if (mysqli_query($connectBD, $sql)) {
        $_SESSION['mensagem'] = 'Adicionado com sucesso';
        header('location:../index.php?sucesso');
    } else {
        $_SESSION['mensagem'] = 'Não foi possivel adicionar';
        header('location:../index.php?erro');
    }

}