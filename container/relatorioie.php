<?php

include('lib/session.php');

include('lib/conexao.php');

if($_SESSION['tipo'] !=1 ){
    $usuario = $_SESSION['usuario'];
    $sql_relatorio = " SELECT cliente, categoria, COUNT(*) AS 'qtd' FROM container 
    WHERE cliente = '$usuario'
    GROUP BY cliente, categoria";
    $query_relatorio = $mysqli->query($sql_relatorio) or die($mysqli->error);    
} else {
    $sql_relatorio = " SELECT cliente, categoria, COUNT(*) AS 'qtd' FROM container GROUP BY cliente, categoria";
    $query_relatorio = $mysqli->query($sql_relatorio) or die($mysqli->error);    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">


    <title>Relatório I/E</title>

</head>
<body>
    <?php include_once('lib/navbar.php'); ?>
    
    <h1 style="text-align:center;">Relatório de Importação/Exportação</h1>
    <div style="padding:0 30% ;">
        <table id="tabela" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Cliente</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Quantidade</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while ($container = $query_relatorio->fetch_assoc()) {
                    ?>
                <tr>
                    <td><?php echo $container['cliente'] ?></td>
                    <td><?php echo $container['categoria'] ?></td>
                    <td><?php echo $container['qtd'] ?></td>
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
            $('#tabela').DataTable({
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