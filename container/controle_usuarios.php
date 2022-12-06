<?php

include('lib/session.php');
include('lib/conexao.php');

if($_SESSION['tipo'] !=1 ){
    die('O acesso a essa página é restrito! <a href="relatorio_mov.php"> VOLTAR</a>');    
}

if(isset($_POST['cliente'])){


    $erro = false;

    $cliente = $_POST['cliente'];
    $senha = $_POST['senha'];
    $senha2 = $_POST['senha2'];
    $tipo = $_POST['tipo'];

    if(empty($cliente)){
        $erro = "Prencha o campo do Cliente";
    }
    if(empty($senha) || $senha != $senha2){
        $erro = "Prencha a senha corretamente";
    }
    if($erro){
        echo $erro;
    } else {
        $senhacrip = password_hash($senha, PASSWORD_DEFAULT);
        $sql_code = " INSERT INTO senhas (cliente, senha, tipo)
        VALUES ('$cliente','$senhacrip','$tipo')";
        $cadastrado = $mysqli->query($sql_code) or die($mysqli->error);
        if($cadastrado){
            echo "Usuário Cadastrado com Sucesso";
            unset($_POST);
        }    
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
    <title>Controle de Usuários</title>
</head>
<body>
    <?php include('lib/navbar.php'); ?>
    <div style="min-height:100vh; display: flex; justify-content: center; align-items:center">
        <form method="POST" class="col-lg-3">
        <h1 style="justify-content: center; text-align: center;">Dados de acesso</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" >Cliente</label>
                <input name="cliente" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Senha</label>
                <input name="senha" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Repetir a Senha</label>
                <input name="senha2" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Tipo de Usuário</label>
                </div>
                <select name="tipo" class="custom-select" id="inputGroupSelect01">
                    <option value="0">Cliente</option>
                    <option value="1">Administrador</option>
                </select>
            </div>
            <button type="submit" class="btn form-control btn-primary">Cadastrar</button>
            <div style="padding-top:10px ;">
                <a href="listar_usuarios.php"><button type="button" class="btn form-control btn-primary">Listar</button></a>
            </div>
        </form>
    </div>
</body>
</html>