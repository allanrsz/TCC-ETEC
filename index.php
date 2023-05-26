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
    <title>Schevron</title>
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
                    <li><a class="sub-menu" href="bd">Banco de Dados</a></li>
                </ul>
            </li>
            <li><a class="cabecalho-menu-item" href="quiz.php">Quiz</a></li>
            <li><a class="cabecalho-menu-item" href="sair.php">Sair</a></li>
            </ul>  
        </nav>
    </header>

    <main class="conteudo">
        <section class="conteudo-principal">
            <div class="conteudo-principal-escrito">
                <?php
                    if (isset($_SESSION['nome'])) {
                    echo '<h2 class="conteudo-titulo">Bem-vindo(a), ' . $_SESSION['nome'] . '!</h2>';
                    } else {
                        header("location: index.php");
                        exit();
                    }
                ?>
                <p class="conteudo-subtitulo">Nosso site também oferece guias e informações sobre as tecnologias mais populares no mercado, como programação em JavaScript, Python, React, entre outras. Oferecemos também dicas sobre as melhores práticas de desenvolvimento de software, gerenciamento de projetos, e outras habilidades essenciais para ser um desenvolvedor de sucesso.</p>
            
            </div>
            <img class="frontid" src="./files/inicio1.png" alt="fundo">
                  
    </section>
        
    </main>

    <footer class="rodape">
        <p>Copyright 2023. Todos os direitos reservados.</p>
    </footer>

</body>
</html>