<?php
// Senha a ser criptografada
$senha = '';

// Criptografar a senha usando o algoritmo bcrypt
$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

// Conectar ao banco de dados
$host = 'localhost';
$usuario = 'root';
$senha_user = '';
$banco = 'registrar';
$conex = mysqli_connect($host, $usuario, $senha_user, $banco);

// Verificar se a conexão foi estabelecida corretamente
if (!$conex) {
    die('Falha na conexão com o banco de dados: ' . mysqli_connect_error());
}

// Inserir a senha criptografada no banco de dados
$sql = "INSERT INTO usuario (senha) VALUES ('$senhaCriptografada')";

if (mysqli_query($conex, $sql)) {
    echo 'Senha criptografada armazenada com sucesso no banco de dados!';
} else {
    echo 'Erro ao armazenar a senha criptografada: ' . mysqli_error($conex);
}

// Fechar a conexão com o banco de dados
mysqli_close($conex);
?>
