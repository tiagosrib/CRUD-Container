<?php

include('lib/session.php');
include('lib/conexao.php');

if($_SESSION['tipo'] !=1 ){
    die('O acesso a essa página é restrito! <a href="relatorio_mov.php"> VOLTAR</a>');    
}

$sql_users = "SELECT * FROM senhas";
$query_users = $mysqli->query($sql_users) or die($mysqli->error);

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
    <?php include_once('lib/navbar.php'); ?>

    <h1 style="text-align:center;">Usuários Cadastrados</h1>
    <div style="padding:0 5% ;">
        <table id="tabela" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Usuário</th>
                    <th scope="col">Tipo</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $query_users->fetch_assoc()) {
                    ?>
                <tr>
                    <td><?php echo $user['cliente'] ?></td>
                    <td><?php if ($user['tipo'] == 0){ echo "Cliente";} else { echo "Administrador";} ?></td>
                    <td>
                        <a href="editar_usuarios.php?id=<?php echo $user['id'] ?>"><button type="submit" class="btn btn-primary">Editar Acesso</button></a>
                        <a href="excluir_usuarios.php?id=<?php echo $user['id'] ?>"><button type="submit" class="btn btn-primary">Excluir Acesso</button></a>
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