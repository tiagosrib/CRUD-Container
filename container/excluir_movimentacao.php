<?php

if(isset($_POST['excluir'])) {
    include('conexao.php');
    $id = intval($_GET['id']);

    $sql_code = " DELETE FROM movimentacao WHERE id = '$id'";
    $sql_query = $mysqli->query($sql_code) or die($mysqli->error);

    if($sql_query) {
        ?> 
        <h1>Excluido com Sucesso !! </h1>
        <p>Voltar para <a href="movimentacoes.php">Movimentações</a></p>
        <?php
        die();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exlcuir Container</title>
</head>
<body>
    <h1>Tem Certeza que deseja excluir a Movimentação ??</h1>
    <form action="" method="post">
        <a style="margin:0 50px" href="movimentacoes.php">Não</a>
        <button type="submit" name="excluir" value="1" class="btn btn-primary">Excluir</button>
    </form>
    
</body>
</html>