<?php
    include('config.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo INCLUDE_PATH_USER ?>./css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_USER ?>./css/stylee.css">
    <title>cadastro</title>
</head>
<body>
    <header>
        <div class="center">
            <nav class="desktop right">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH_USER ?>"> <span class="fa fa-home"></span></a></li>
                    <li><a href="cadastrar-escola">Cadastrar Escola</a></li>
                    <li><a href="cadastrar-turma">Cadastrar Turma</a></li>
                    <li><a href="cadastrar-aluno">Cadastrar Aluno</a></li>
                    
                </ul>
            </nav>
            <nav class="mobile right">
                <div class="botao-menu-mobile"> 
                    <i class="fas fa-bars"></i>
                </div>
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH_USER ?>">Home</span></a></li>
                    <li><a href="cadastrar-escola">Cadastrar Escola</a></li>
                    <li><a href="cadastrar-turma">Cadastrar Turma</a></li>
                    <li><a href="cadastrar-aluno">Cadastrar Aluno</a></li>
                    
                </ul>
            </nav>
            <div class="clear"></div>
        </div><!--center-->
    </header>   

<div class="content">

    <?php User::carregarPagina();?>
    
</div><!--content-->

<script src="<?php echo INCLUDE_PATH_USER ?>js/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH_USER ?>js/main.js"></script>

</body>
</html>