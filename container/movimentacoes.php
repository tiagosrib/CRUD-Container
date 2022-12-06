<?php

include('lib/session.php');
include('lib/conexao.php');

if($_SESSION['tipo'] !=1 ){
    $usuario = $_SESSION['usuario'];
    $sql_movimentacao = "SELECT * FROM base WHERE cliente = '$usuario' ORDER BY fim  ";
    $query_movimentacao = $mysqli->query($sql_movimentacao) or die($mysqli->error);    
} else {
    $sql_movimentacao = "SELECT * FROM movimentacao ORDER BY fim";
    $query_movimentacao = $mysqli->query($sql_movimentacao) or die($mysqli->error);    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">


    <title>Movimentações Cadastrados</title>
</head>
<body>
    <?php include_once('lib/navbar.php'); ?>

    <h1 style="text-align:center;">Movimentações</h1>
    <div style="padding:0 5% ;">
        <table id="tabela1" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Container</th>
                    <th scope="col">Movimentação</th>
                    <th scope="col">Início</th>
                    <th scope="col">Fim</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($movimentacao = $query_movimentacao->fetch_assoc()) {
                    ?>
                <tr>
                    <td><?php echo $movimentacao['container'] ?></td>
                    <td><?php echo $movimentacao['movimentacao'] ?></td>
                    <td><?php echo $movimentacao['inicio'] ?></td>
                    <td><?php echo $movimentacao['fim'] ?></td>
                    <td>
                        <?php if($_SESSION['tipo'] ==1 ){ ?>
                        <a href="editar_movimentacao.php?id=<?php echo $movimentacao['id'] ?>"><button type="submit" class="btn btn-primary">Editar</button></a>
                        <a href="excluir_movimentacao.php?id=<?php echo $movimentacao['id'] ?>"><button type="submit" class="btn btn-primary">Excluir</button></a>
                        <?php } ?>
                    </td>
                <?php } 
                ?>
                </tr>
            </tbody>
        </table>
    </div>    

    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#tabela1').DataTable({
                    "language": {
                        "lengthMenu": "Mostrando _MENU_ registros por página",
                        "zeroRecords": "Nenhum registro encontrado",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "Nenhum registro disponível",
                        "infoFiltered": "(filtrado de _MAX_ registros no total)"
                    }
                });
        });
    </script>

</body>
</html>