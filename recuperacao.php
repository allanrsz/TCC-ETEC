<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="shortcut icon" href="./files/favicon.ico" type="image/x-icon">
    <title>Recuperar senha | Schevron</title>
</head>
<body>
    
        <div class="recuperar">
        <form method="post">
        <h1 class="recuperar-escrito">Recuperar senha</h1>
        <br><br>
        <input class="caixa-texto" type="email" name="email" placeholder="Digite seu e-mail">
        <br><br>
        <input class="caixa-texto" type="password" id="novaSenha" name="novaSenha" placeholder="Nova senha">
        <br><br>
        <input class="caixa-texto" type="password" id="confirmaSenha" name="confirmaSenha" placeholder="Confirme sua senha">
        <br><br>
        <button class="conteudo-botao" type="submit" name="trocarSenha" value="Trocar senha">Trocar senha</button>
        <br><br>
        <a href="login.php">Voltar</a>
        </form>
    </div>
        
    <?php
    include('conesao.php');

// configurações de conexão com o banco de dados
$host = "localhost";
$usuario = "root";
$senha_user = "";
$banco = "registrar";

// cria a conexão com o banco de dados
$conex = new mysqli($host, $usuario, $senha_user, $banco);

// verifica se a conexão foi bem sucedida
if ($conex->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conex->connect_error);
}

// verifica se o formulário de recuperação de senha foi submetido
if (isset($_POST['submit'])) {

    // captura o e-mail digitado no formulário
    $email = $_POST['email'];

    // realiza a busca do usuário no banco de dados a partir do e-mail
    $sql = "SELECT * FROM usuario WHERE email = '$email'";
    $result = $conex->query($sql);

    // verifica se o usuário existe no banco de dados
    if ($result->num_rows > 0) {
        // Código para recuperação de senha
    } else {
        echo "<script>alert('Usuário não encontrado.');</script>";
    }
}

// verifica se o formulário de troca de senha foi submetido
if (isset($_POST['trocarSenha'])) {

    // captura os dados do formulário
    $email = $_POST['email'];
    $novaSenha = $_POST['novaSenha'];
    $confirmaSenha = $_POST['confirmaSenha'];

    // verifica se as senhas são iguais
    if ($novaSenha === $confirmaSenha) {

        // Verifica se o usuário não é o administrador com ID 1
        $sql = "SELECT * FROM usuario WHERE id = 1";
        $result = $conex->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $administrador = $row['email'];

            if ($email !== $administrador) {

                // Criptografa a nova senha
                $senhaCriptografada = password_hash($novaSenha, PASSWORD_DEFAULT);

                // atualiza a senha criptografada do usuário no banco de dados
                $sql = "UPDATE usuario SET senha = '$senhaCriptografada' WHERE email = '$email'";
                if ($conex->query($sql) === TRUE) {
                    echo "<script>alert('Senha atualizada com sucesso.');</script>";
                    echo "<script>window.location.href = 'login.php';</script>";
                    exit; // Encerra a execução do script
                } else {
                    echo "<script>alert('Ocorreu um erro ao atualizar a senha do usuário.');</script>";
                }

            } else {
                echo "<script>alert('Não é possível alterar a senha do administrador.');</script>";
            }
        } else {
            echo "<script>alert('Administrador não encontrado.');</script>";
        }

    } else {
        echo "<script>alert('As senhas não coincidem.');</script>";
    }
}

// fecha a conexão com o banco de dados
$conex->close();

?>


</body>
</html>