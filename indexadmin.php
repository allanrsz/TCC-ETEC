<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./files/favicon.ico" type="image/x-icon">
    <title>Administrador | Schevron</title>
</head>
<body>
    <header class="cabecalho">
        <img class="cabecalho-logo" src="./files/logo.jpg" alt="logo">
        <nav class="cabecalho-menu">
            <ul>
            <li><a class="cabecalho-menu-item" href="sair.php">Sair</a></li>
            </ul>  
        </nav>
    </header>

    <h1>Registros de Usuários</h1>

    <section class="conteudo-principal">
        <div>
            <p class="txfron">
             
            <?php
include('conesao.php');

// Função para sanitizar as entradas de dados
function sanitize($data)
{
    global $conex;
    $data = trim($data);
    $data = mysqli_real_escape_string($conex, $data);
    $data = htmlspecialchars($data);
    return $data;
}

// Função para criptografar a senha
function criptografarSenha($senha)
{
    $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);
    return $hashedSenha;
}

// Excluir registro
if (isset($_GET['excluir'])) {
    $id = sanitize($_GET['excluir']);
    $excluir_query = "DELETE FROM usuario WHERE id = '$id'";
    if ($conex->query($excluir_query) === true) {
        echo "Registro excluído com sucesso!<br><br>";
    } else {
        echo "Erro ao excluir registro: " . $conex->error . "<br><br>";
    }
}

// Editar registro
if (isset($_POST['editar'])) {
    $id = sanitize($_POST['id']);
    $novoEmail = sanitize($_POST['email']);
    $novaSenha = sanitize($_POST['senha']);
    $novoNome = sanitize($_POST['nome']);
    $senhaCriptografada = criptografarSenha($novaSenha);

    $editar_stmt = $conex->prepare("UPDATE usuario SET email = ?, senha = ?, nome = ? WHERE id = ?");
    $editar_stmt->bind_param("sssi", $novoEmail, $senhaCriptografada, $novoNome, $id);

    if ($editar_stmt->execute()) {
        echo "Registro atualizado com sucesso!<br><br>";
    } else {
        echo "Erro ao atualizar registro: " . $conex->error . "<br><br>";
    }
}

// Consulta SQL para selecionar todos os campos da tabela de usuários
$sql_code = "SELECT id, email, senha, nome FROM usuario";
$sql_query = $conex->query($sql_code) or die("Falha na execução do código SQL: " . $conex->error);

// Verificar se foram encontrados registros
if ($sql_query->num_rows > 0) {
    // Exibir a contagem de usuários
    echo "Total de usuários: " . $sql_query->num_rows . "<br><br>";

    // Loop para exibir cada registro
    while ($row = $sql_query->fetch_assoc()) {
        $id = $row['id'];
        $email = $row['email'];
        $senha = $row['senha'];
        $nome = $row['nome'];

        // Exibir os dados (pode ser modificado para atender às suas necessidades)
        echo "<span style='color: white;'>Email: $email</span><br>";
        echo "<span style='color: white;'>Senha: $senha</span><br>";
        echo "<span style='color: white;'>Usuário: $nome</span><br>";

        // Formulário para editar registro
        echo "<form method='post' action=''>
                <input type='hidden' name='id' value='$id'>
                <input type='text' name='email' placeholder='Novo email' required>
                <input type='password' name='senha' placeholder='Nova senha' required>
                <input type='text' name='nome' placeholder='Novo nome' required
                <input type='submit' name='editar' value=''>
                <input type='submit' name='editar' value='Editar'>
            </form>";

        // Link para excluir registro
        echo "<a href='?excluir=$id'>Excluir</a><br><br>";
    }
} else {
    echo "Nenhum registro encontrado.";
}
?>


        
        </p>
    </div>

    <div>
        <img class="frontid" src="./files/adminn.png" alt="">
    </div>

</section>
        
</body>
</html>