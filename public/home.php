<?php
session_start();
if(!isset($_SESSION["usuario"])){ // Verifica se existe usuário logado
    header("Location: ../index.php"); // Se não existir, volta para a tela de login
    exit();
}

include("../infra/db/connect.php"); // Conecta ao banco de dados

if($_SERVER["REQUEST_METHOD"] == "POST"){ // Verifica se o formulário de cadastro foi enviado
    $novoUsuario = $_POST['usuario']; // Recebe os dados informados
    $novaSenha = $_POST['senha'];

    $sql = "INSERT INTO usuarios (usuario,senha)  -- Comando SQL para inserir novo usuário --
    VALUES ('$novoUsuario','$novaSenha')";  

    if($conn->query($sql) === TRUE){ // Executa o INSERT
        echo "<script> alert('Usuário cadastrado com sucesso!')</script>"; // Mensagem de sucesso
    }else{
        echo "<script> alert('Erro ao cadastrar')</script>"; // Mensagem de erro
    }

};

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h3>Bem-Vindo! <?php echo $_SESSION["usuario"]; ?></h3>  <!-- Exibe o usuário logado -->
    <a href="logout.php"> Sair</a> <!-- Link para encerrar a sessão -->

    <hr>
    <h4>Cadastro de Novo Usuário.</h4> <!-- Formulário para cadastrar usuários -->
    <form method="POST">
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
        
        ?>
        <br>
        <button type="submit">Cadastrar</button>
    </form>
    <hr>
    <?php
    
    include("components/table.php") // Inclui a tabela que lista os usuários cadastrados

    ?>



</body>
</html>