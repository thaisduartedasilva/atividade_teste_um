<?php
    session_start(); //inicia sessão 

    include("infra/db/connect.php"); // conecta com o arquivo connect.php

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'"; //

        $resultado = $conn->query($sql); //vai buscar do banco de dados 

        if ($resultado->num_rows > 0){
            $_SESSION["usuario"] = $usuario;
            header("Location: public/home.php");
            exit();
        }else{
            $erro = "Usuário ou senha inválidos!"; //mensagem de erro
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Sitema de Login Simples</h1>  

    <form method="POST">    // formulário com usuário e senha para login 
        <label>Usuário:</label>
        <input type="text" name="usuario">
        <br>
        <label>Senha:</label>
        <input type="password" name="senha">
        <br>
        <?php
        
            if(isset($erro)){
                echo $erro;
            };

            // caso o usuário ou sennha estiverem incorretos, vai mostrar mensagem de erro 
        
        ?>
        <br>
        <button type="submit">Entrar</button>
    </form>

</body>
</html>