<?php

include('lib/session.php');
include('lib/conexao.php');

if($_SESSION['tipo'] !=1 ){
    die('O acesso a essa página é restrito! <a href="relatorio_mov.php"> VOLTAR</a>');    
}


$id = intval($_GET['id']);
$erro = false;

if(count($_POST)>0) {


    $container = $_POST['container'];
    $cliente = $_POST['cliente'];
    $tipo = $_POST['tipo'];
    $status = $_POST['status'];
    $categoria = $_POST['categoria'];

    if(empty($container) || strlen($container)!=11){
        $erro = "Preencha o campo Container corretamente";
    }
    if(empty($cliente)){
        $erro = "Preencha o campo Cliente corretamente";
    }
    if($erro){
        echo $erro;
    } else {
        $sql_code = " UPDATE container 
        SET container = '$container', 
        cliente = '$cliente', 
        tipo = '$tipo', 
        status = '$status', 
        categoria = '$categoria'
        WHERE id = '$id'";
        $cadastrado = $mysqli->query($sql_code) or die($mysqli->error);
        if($cadastrado){
            echo "Container Atualizado com Sucesso!!";
            unset($_POST);
        }
    }

}

$sql_container = "SELECT * FROM container WHERE id = '$id'";
$query_container = $mysqli->query($sql_container) or die($mysqli->error);
$container = $query_container->fetch_assoc();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Edição de Containers</title>
</head>
<body>
    <?php include_once('lib/navbar.php'); ?>

    <h1 style="text-align:center;">Edição de Containers</h1>
    <div style="padding:0 20% ;">
        <form action="" method="post">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Número do Container</span>
                </div>
                <input style="text-transform: uppercase ;" value="<?php echo $container['container']; ?>" name="container" type="text" class="form-control" placeholder="TEST1234567" aria-label="Usuário" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Cliente</span>
                </div>
                <input value="<?php echo $container['cliente']; ?>" name="cliente" type="text" class="form-control" placeholder="Identificação do Cliente" aria-label="Usuário" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Tipo</label>
                </div>
                <select name="tipo" class="custom-select" id="inputGroupSelect01">
                    <option value="<?php echo $container['tipo']; ?>"><?php echo $container['tipo']; ?></option>
                    <option value="20">20</option>
                    <option value="40">40</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Status</label>
                </div>
                <select name="status" class="custom-select" id="inputGroupSelect01">
                    <option value="<?php echo $container['status']; ?>"><?php echo $container['status']; ?></option>
                    <option value="Cheio">Cheio</option>
                    <option value="Vazio">Vazio</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Categoria</label>
                </div>
                <select name="categoria" class="custom-select" id="inputGroupSelect01">
                    <option value="<?php echo $container['categoria']; ?>"><?php echo $container['categoria']; ?></option>
                    <option value="Importacao">Importação</option>
                    <option value="Exportacao">Exportação</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Container</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>