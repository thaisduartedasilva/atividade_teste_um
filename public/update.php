<?php
//Abre um bloco de código PHP.
session_start();
//Inicia uma nova sessão ou retoma a sessão existente. Isso é necessário para acessar as variáveis de sessão.

include("../infra/db/connect.php");
//Pega o conteúdo do arquivo connect.php e coloca aqui. Esse arquivo contém a conexão com o banco de dados.

$id = $_GET['id'];

    $sql = "INSERT INTO usuarios (usuario,senha)
    VALUES ('$novoUsuario','$novaSenha')"  
    WHERE id= ('$id')";


    if($conn->query($sql) === TRUE){
        echo "<script> alert('Usuário cadastrado com sucesso!')</script>";
    }else{
        echo "<script> alert('Erro ao cadastrar')</script>";
    }

 
//Faça isso no registro com id 1

$conn->query($sql);
//Essa linha executa o comando. $conn = conexão com o banco. query() = envia uma consulta SQL.

header("Location: home.php");
?>

