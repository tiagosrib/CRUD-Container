<?php

if(isset($_POST['cliente'])){
    
    include('lib/conexao.php');

    $cliente = $_POST['cliente'];
    $senha = $_POST['senha'];

    $sql_code = "SELECT * FROM senhas WHERE cliente = '$cliente' LIMIT 1";
    $sql_query = $mysqli->query($sql_code) or die($mysqli->error);

    $usuario = $sql_query->fetch_assoc();

    if(password_verify($senha, $usuario['senha'])){
        if(!isset($_SESSION)){
            session_start();    
        }
        $_SESSION['usuario'] = $usuario['cliente'];
        $_SESSION['tipo'] = $usuario['tipo'];
        header("Location: relatorio_mov.php");
    } else {
        echo "FALHA AO LOGAR";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div style="min-height:100vh; display: flex; justify-content: center; align-items:center">
        <form method="post" class="col-lg-3">
            <h1 style="justify-content: center; text-align: center;">CRUD-Containers</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" >Identificação</label>
                <input name="cliente" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Senha</label>
                <input name="senha" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn form-control btn-primary">Acessar</button>
        </form>
    </div>
</body>
</html>