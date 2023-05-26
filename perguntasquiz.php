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

    // Consulta das perguntas e respostas corretas
    $query = "SELECT * FROM perguntas";
    $result = mysqli_query($conex, $query);

    // Variável para armazenar a pontuação
    $pontuacao = 0;

    // Verificar as respostas do usuário
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $resposta_correta = $row['resposta_correta'];

        if ($respostas[$id] == $resposta_correta) {
            $pontuacao++;
        }
    }

    // Exibir a pontuação
    echo "Sua pontuação: " . $pontuacao;

    // Armazenar os resultados no banco de dados
    // Você precisará criar uma tabela para armazenar os resultados ou adicionar colunas adicionais à tabela existente

    // Fechar a conexão com o banco de dados
    mysqli_close($conex);
}
?>
