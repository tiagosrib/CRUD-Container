<?php

include('conexao.php');
$id = intval($_GET['id']);
$erro = false;

if(count($_POST)>0) {

    $container = $_POST['container'];
    $movimentacao = $_POST['movimentacao'];
    $inicio = $_POST['inicio'];
    $fim = $_POST['fim'];

    if(empty($movimentacao)){
        $erro = "Preencha o campo Movimentação corretamente";
    }
    if(empty($inicio)){
        $erro = "Preencha o campo Início corretamente";
    }
    if(empty($fim)){
        $erro = "Preencha o campo Fim corretamente";
    }
    if($erro){
        echo $erro;
    } else {
        $sql_code = " INSERT INTO movimentacao (container, movimentacao , inicio , fim)
        VALUES ('$container', '$movimentacao','$inicio','$fim')";
        $cadastrado = $mysqli->query($sql_code) or die($mysqli->error);
        if($cadastrado){
            echo "Movimentação Cadastrada com Sucesso!!";
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
    <title>Movimentação de Containers</title>
</head>
<body>
    <nav>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="cadastro_containers.php">Cadastro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="containers.php">Containers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="movimentacoes.php">Movimentações</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="relatorioie.php">Relatório I/E</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="relatorio_mov.php">Relatório Movimentações</a>
            </li>

        </ul>
    </nav>

    <h1 style="text-align:center;">Movimentação de Containers</h1>
    <div style="padding:0 20% ;">
        <form action="" method="post">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Número do Container</span>
                </div>
                <input readonly style="text-transform: uppercase ;" value="<?php echo $container['container']; ?>" name="container" type="text" class="form-control" placeholder="TEST1234567" aria-label="Usuário" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Movimentação</label>
                </div>
                <select name="movimentacao" class="custom-select" id="inputGroupSelect01">
                    <option value="<?php if(isset($_POST['movimentacao'])) echo $_POST['movimentacao'] ?>"><?php if(isset($_POST['movimentacao'])) echo $_POST['movimentacao'] ?></option>
                    <option value="EMBARQUE">EMBARQUE</option>
                    <option value="DESCARGA">DESCARGA</option>
                    <option value="GATEIN">GATEIN</option>
                    <option value="GATEOUT">GATEOUT</option>
                    <option value="REPOSICIONAMENTO">REPOSICIONAMENTO</option>
                    <option value="PESAGEM">PESAGEM</option>
                    <option value="SCANNER">SCANNER</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Data Hora Início</span>
                </div>
                <input style="text-transform: uppercase ;" value="<?php if(isset($_POST['inicio'])) echo $_POST['inicio']; ?>" name="inicio" type="datetime-local" class="form-control" placeholder="TEST1234567" aria-label="Usuário" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Data Hora fim</span>
                </div>
                <input style="text-transform: uppercase ;" value="<?php if(isset($_POST['fim'])) echo $_POST['fim']; ?>" name="fim" type="datetime-local" class="form-control" placeholder="TEST1234567" aria-label="Usuário" aria-describedby="basic-addon1">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar Movimentação</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>