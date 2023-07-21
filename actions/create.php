<?php
// Definir o fuso horário para o Brasil
date_default_timezone_set('America/Sao_Paulo');

session_start();
require_once 'connectDB.php';

function clear($input){ // limpa os inputs do form
    global $connectBD;
    //SQL
    $var = mysqli_escape_string($connectBD, $input);
    //XSS
    $var = htmlspecialchars($var);
    return $var;
}

if (isset($_POST['btn-cadastrar'])) {
    //PEGA OS VALORES DO FORMULARIO
    $tarefa = clear($_POST['titulo']);
    $descricao = clear($_POST['descricao']);
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