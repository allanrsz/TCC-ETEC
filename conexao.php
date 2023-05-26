<?php
if (isset($_POST['Cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $checksenha = $_POST['checkssenha'];

    if ($senha != $checksenha) {
        echo "<script>
	    alert('As senhas não correspondem.'); location= 'registro.php';
	    </script>";
        die();
    }

    $host = 'localhost';
    $usuario = 'root';
    $senha_user = '';
    $banco = 'registrar';

    $conex = mysqli_connect($host, $usuario, $senha_user, $banco);
    if (!$conex) {
        die("Conexão falhou: " . mysqli_connect_errno());
    }

    $sql = "SELECT * FROM usuario WHERE email='$email'";
    $resultado = mysqli_query($conex, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        echo "<script>
	    alert('Este email já está cadastrado.'); location= 'registro.php';
	    </script>";
        
    } else {
        $sql = "SELECT * FROM usuario WHERE nome='$nome'";
        $resultado = mysqli_query($conex, $sql);
        if (mysqli_num_rows($resultado) > 0) {
            echo "<script>
	        alert('Este nome de usuário já está cadastrado.'); location= 'registro.php';
	        </script>";

        } else {
            $sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome','$email','$senha')";
            $rs = mysqli_query($conex, $sql);
            if ($rs) {
                header("Location: login.php");
            }
        }
    }
}
?>