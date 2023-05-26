<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (isset($_SESSION['usuario'])) {
    // Destroi a sessão
    session_destroy();
}

// Redireciona o usuário para a página de login
header('Location: login.php');
exit();
?>