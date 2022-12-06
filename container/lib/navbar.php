<?php

include('session.php');

?>

<nav>
        <ul class="nav justify-content-center">
            <?php if($_SESSION['tipo'] ==1 ){ ?>

            <li class="nav-item">
                <a class="nav-link active" href="controle_usuarios.php">Administrador</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="cadastro_containers.php">Cadastro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="containers.php">Containers</a>
            </li>

            <?php } ?>
            
            <li class="nav-item">
                <a class="nav-link" href="movimentacoes.php">Movimentações</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="relatorioie.php">Relatório I/E</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="relatorio_mov.php">Relatório Movimentações</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Sair</a>
            </li>
        </ul>
   </nav>
