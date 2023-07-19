<?php
session_start();
$mensagem = $_SESSION['mensagem'] ?? '';

if (!empty($mensagem)) {
    echo "
    <script>
         var myToast = new bootstrap.Toast(document.getElementById('myToast'));
         myToast.hidden();
        document.addEventListener('DOMContentLoaded', function() {
            myToast.show();
        });
    </script>";
}

unset($_SESSION['mensagem']);
?>