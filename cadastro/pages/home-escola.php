<?php
    // chamada para excluir
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        User::deletar('tb_escolas',$idExcluir);
    } 
?>

<div class="box-content ">
<h2> Escolas </h2>
    <div class="table-responsive wraper">
    <table class="escola">
        <tr>
            <td>Nome</td> 
            <td>Endereço</td> 
            <td>Total de alunos</td> 
            <td>Editar</td>
            <td>Excluir</td>
        </tr>

        <?php
            $escolaHome = Mysql::conectar()->prepare("SELECT * FROM `tb_escolas`");
            $escolaHome->execute();
            $escolaHome = $escolaHome->fetchAll();
            foreach($escolaHome as $key => $value){
        ?>

        <tr>
            <td><span><?php echo $value['nome'] ?></span></td>
            <td><span><?php echo $value['endereco'] ?></span></td>
            <td><span>0</span></td>
            <td><div><a class="edit" href="<?php echo INCLUDE_PATH_USER ?>editar-escola?id=<?php echo $value['id']; ?>"><i class="fas fa-school"></i></a></div></td>
            <td><div><a actionBtn="delet" class="btn delete" href="<?php echo INCLUDE_PATH_USER ?>home-escola?excluir=<?php echo $value['id']; ?>"><i class="far fa-trash-alt"></i></a></div></td>

        </tr>
        
        <?php }?>

    </table>
    </div><!--table-responsive-->
</div><!--box-content--> 