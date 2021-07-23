<?php
    // chamada para excluir
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        User::deletar('tb_turmas',$idExcluir);
        
    } 
?>
<div class="box-content ">
<h2> Turmas </h2>
    <div class="table-responsive wraper">
    <table class="turma">
        <tr>
            <td>Turmas</td> 
            <td>Nivel</td> 
            <td>Turno</td> 
            <td>Editar</td>
            <td>Excluir</td>
        </tr>

        <?php
            $turmaHome = Mysql::conectar()->prepare("SELECT * FROM `tb_turmas`");
            $turmaHome->execute();
            $turmaHome = $turmaHome->fetchAll();
            foreach($turmaHome as $key => $value){
        ?>

        <tr>
            <td><span><?php echo $value['nome'] ?></span></td>
            <td><span><?php echo $value['nivel'] ?></span></td>
            <td><span><?php echo $value['turno'] ?></span></td>
            <td><div><a class="edit" href="<?php echo INCLUDE_PATH_USER ?>editar-turma?id=<?php echo $value['id']; ?>"><i class="fas fa-graduation-cap"></i></a></div></td>
            <td><div><a actionBtn="delet" class="btn delete" href="<?php echo INCLUDE_PATH_USER ?>home-turma?excluir=<?php echo $value['id']; ?>"><i class="far fa-trash-alt"></i></a></div></td>

        </tr>
        
        <?php }?>

    </table>
    </div><!--table-responsive-->
</div><!--box-content--> 