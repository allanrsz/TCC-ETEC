<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./files/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./style.css">
    <title>Login Administrador | Schevron</title>
</head>


<body>
    <header class="cabecalho">
        <img class="cabecalho-logo" src="./files/logo.jpg" alt="logo">
        <nav class="cabecalho-menu">
            <ul>
            <li><a class="cabecalho-menu-item" href="indextwo.html">Início</a></li> 
            <li><a class="cabecalho-menu-item" href="#">Login</a>
                <ul class="sub-menu-nav"><br>
                    <li><a class="sub-menu" href="login.php">Usuário</a></li>
                    <li><a class="sub-menu" href="admin.php">Administrador</a></li>
                </ul>
            </li>
            
            </ul>  
        </nav>
    </header>

    <main class="conteudo-login">
        <section class="conteudo-login-principal">
            <div class="conteudo-login-escrito">
                <h1 class="conteudo-login-titulo">Área destinada aos Administradores do site Schevron.</h1>
                <img class="conteudo-login-logo" src="./files/adminlogin.png" alt="Login">
            </div>
       
            <div class="conteudo-login-segundario">
                <h1 class="conteudo-login-secundario-titulo">Login</h1>
                <br>
                <form method="post" action="">

                    <input class="caixa-texto" type="nome" name="nome" placeholder="Usuário">
                    <br><br>
                    <input class="caixa-texto" type="password" name="senha" placeholder="Senha">
                    <br><br>
                    <button class="conteudo-botao" href="index.php">Entrar</button>
                    </form>
                    
                    <?php
include('conesao.php');

if (isset($_POST['nome']) && isset($_POST['senha'])) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    if (empty($nome)) {
        echo "Preencha seu nome";
    } elseif (empty($senha)) {
        echo "Preencha sua senha";
    } else {
        $nome = $conex->real_escape_string($nome);

        $sql_code = "SELECT * FROM usuario WHERE nome = '$nome'";
        $sql_query = $conex->query($sql_code) or die("Falha na execução do código SQL: " . $conex->error);

        if ($sql_query->num_rows == 1) {
            $usuario = $sql_query->fetch_assoc();
            
            // Verificar se a senha fornecida pelo usuário corresponde à senha armazenada (criptografada) no banco de dados
            if (password_verify($senha, $usuario['senha'])) {
                if (!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                if ($usuario['nome'] === 'admin') {
                    header("Location: indexadmin.php");
                } else {
                    header("Location: index.php");
                }
                exit;
            } else {
                echo "<script>alert('Falha ao logar! Nome ou senha incorretos.');</script>";
            }
        } else {
            echo "<script>alert('Falha ao logar! Nome ou senha incorretos.');</script>";
        }
    }
}

function logout() {
    session_start();
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

                    </div>
            </div>
        </section>

    </main>
</body>
</html>