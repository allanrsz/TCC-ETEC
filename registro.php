

<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./files/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./style.css">
    <title>Cadastro | Schevron</title>
</head>
<body>

    <div class="recuperar">
        <h1>Crie sua conta</h1>
        <br>
        <form  action="" method="POST">
            <input class="caixa-texto" type="name" name="nome" id="nome" placeholder="Digite seu usuário">
            <br><br>
            <input class="caixa-texto" type="email" name="email" id="email"placeholder="Seu E-mail">
            <br><br>
            <input class="caixa-texto" type="password" name="senha" id="senha" placeholder="Senha" >
            <br><br>
            <input class="caixa-texto" type="password" name="checkssenha" id="checkssenha" placeholder="repita sua senha" >
            <br><br>
            <button class="conteudo-botao" type="submit" name="Cadastrar"id="Cadastrar" >Cadastrar</button>
            </form>
            <a href="login.php">Voltar</a>

           
    </div>

    <?php
// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se a senha foi enviada
    if (isset($_POST['senha']) && !empty($_POST['senha'])) {
        // Dados do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Criptografar a senha 
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

        // Inserir os dados no banco de dados usando uma consulta preparada
        $sql = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conex, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $senhaCriptografada);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar o usuário: ');</script>" . mysqli_error($conex);
        }

        // Fechar a conexão com o banco de dados
        mysqli_stmt_close($stmt);
        mysqli_close($conex);
    } else {
        echo "<script>alert('Por favor, preencha a senha no formulário.');</script>";
    }
}
?>

</body>

</html>

