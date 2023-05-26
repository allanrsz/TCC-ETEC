<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./files/favicon.ico" type="image/x-icon">
    <title>Quiz | Schevron</title>
</head>
<body>
    <header class="cabecalho">
        <img class="cabecalho-logo" src="./files/logo.jpg" alt="logo">
        <nav class="cabecalho-menu">
            <ul>
            <li><a class="cabecalho-menu-item" href="index.php">Início</a></li>
            <li><a class="cabecalho-menu-item" href="cursos.html">Cursos</a></li>
            <li><a class="cabecalho-menu-item" href="#">Carreiras</a>
                <ul class="sub-menu-nav"><br>
                    <li><a class="sub-menu" href="front.html">Front-End</a></li>
                    <li><a class="sub-menu" href="backend.html">Back-End</a></li>
                    <li><a class="sub-menu" href="mobile.html">Mobile</a></li>
                    <li><a class="sub-menu" href="fullstack.html">Full-Stack</a></li>
                    <li><a class="sub-menu" href="qa.html">QA</a></li>
                    <li><a class="sub-menu" href="bd.html">Banco de Dados</a></li>
                </ul>
            </li>
            <li><a class="cabecalho-menu-item" href="quiz.php">Quiz</a></li>
            <li><a class="cabecalho-menu-item" href="sair.php">Sair</a></li>
            </ul>  
        </nav>
    </header>

    <div class="containerquiz">
      <h1>Quiz</h1>

      <form action="" method="POST">
    <?php
        // Conectar ao banco de dados
        $host = 'localhost';
        $perguntas = 'root';
        $senha_user = '';
        $banco = 'registrar';

        $conex = mysqli_connect($host, $perguntas, $senha_user, $banco);

        // Verificar se o formulário foi submetido
        if (isset($_POST['submit'])) {
            // Array para armazenar as respostas
            $respostas = $_POST['resposta'];

            // Consulta das perguntas e respostas
            $query = "SELECT * FROM perguntas";
            $result = mysqli_query($conex, $query);

            // Variável para armazenar a pontuação
            $pontuacao = 0;

            // Verificar as respostas do usuário
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $resposta_correta = $row['resposta_correta'];

                if (isset($respostas[$id]) && $respostas[$id] == $resposta_correta) {
                    $pontuacao++;
                }
                
            }

            // Exibir a pontuação
            //echo "Sua pontuação: " . $pontuacao;//
            echo "<script>";
            echo "alert('Sua pontuação: " . $pontuacao . "');";
            echo "</script>";
        }

        // Consulta das perguntas e respostas
        $query = "SELECT * FROM perguntas";
        $result = mysqli_query($conex, $query);

        // Exibição das perguntas e opções de resposta
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<h3>'.$row['pergunta'].'</h3>';
            echo '<input type="radio" name="resposta['.$row['id'].']" value="A"> '.$row['opcao_a'].'<br>';
            echo '<input type="radio" name="resposta['.$row['id'].']" value="B"> '.$row['opcao_b'].'<br>';
            echo '<input type="radio" name="resposta['.$row['id'].']" value="C"> '.$row['opcao_c'].'<br>';
            echo '<input type="radio" name="resposta['.$row['id'].']" value="D"> '.$row['opcao_d'].'<br>';
            echo '<br>';
        }

        // Fechar a conexão com o banco de dados
        mysqli_close($conex);
    ?>
    <input class="botao" type="submit" name="submit" value="Enviar">
</form>

</body>
</html>