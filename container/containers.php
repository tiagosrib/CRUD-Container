<?php

include('conexao.php');

$sql_container = "SELECT * FROM container";
$query_container = $mysqli->query($sql_container) or die($mysqli->error);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
    <title>Containers Cadastrados</title>
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

    <h1 style="text-align:center;">Containers Cadastrados</h1>
    <div style="padding:0 5% ;">
        <table id="tabela" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Container</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Status</th>
                    <th scope="col">Categoria</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($container = $query_container->fetch_assoc()) {
                    ?>
                <tr>
                    <td><?php echo $container['container'] ?></td>
                    <td><?php echo $container['cliente'] ?></td>
                    <td><?php echo $container['tipo'] ?></td>
                    <td><?php echo $container['status'] ?></td>
                    <td><?php echo $container['categoria'] ?></td>
                    <td>
                        <a href="editar_containers.php?id=<?php echo $container['id'] ?>"><button type="submit" class="btn btn-primary">Editar</button></a>
                        <a href="excluir_containers.php?id=<?php echo $container['id'] ?>"><button type="submit" class="btn btn-primary">Excluir</button></a>
                        <a href="movimentacao_containers.php?id=<?php echo $container['id'] ?>"><button type="submit" class="btn btn-primary">Incluir Movimentação</button></a>
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