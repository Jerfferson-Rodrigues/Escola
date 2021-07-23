<?php
    // chamada para excluir
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        User::deletar('tb_alunos',$idExcluir);
    } 
?>
<div class="box-content ">
<h2> Alunos </h2>
    <div class="table-responsive wraper">
    <table>
        <tr>
            <td>Alunos</td> 
            <td>Editar</td>
            <td>Excluir</td>
        </tr>

        <?php
            $alunoHome = Mysql::conectar()->prepare("SELECT * FROM `tb_alunos`");
            $alunoHome->execute();
            $alunoHome = $alunoHome->fetchAll();
            foreach($alunoHome as $key => $value){
        ?>

        <tr>
            <td><span><?php echo $value['nome'] ?></span></td>
            <td><div><a class="edit" href="<?php echo INCLUDE_PATH_USER ?>editar-aluno?id=<?php echo $value['id']; ?>"><i class="fas fa-user-edit"></i></a></div></td>
            <td><div><a actionBtn="delet" class="btn delete" href="<?php echo INCLUDE_PATH_USER ?>home-aluno?excluir=<?php echo $value['id']; ?>"><i class="far fa-trash-alt"></i></a></div></td>

        </tr>
        
        <?php }?>

    </table>
    </div><!--table-responsive-->
</div><!--box-content--> 



