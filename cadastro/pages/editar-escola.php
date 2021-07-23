<?php
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $escola = User::select('tb_escolas','id = ?',array($id));
    }else{
        User::alert('erro','Você precisa pasar o parametro ID.');
        die();
    }
?>  
<div class="box-content">
    <div class="back"><a href="<?php echo INCLUDE_PATH_USER ?>home-escola"><i class="fas fa-arrow-circle-left"></i> Voltar</a></div>
    <h2><i class="fa fa-pen"></i> Editar Escola</h2>

    <form method="post" enctype="multipart/form-data">

        <?php
            if(isset($_POST['acao1'])){
                //enviei o formulario
                $nome = $_POST['nome'];
                $endereco = $_POST['endereco'];


                $arr = ['nome'=>$nome,'endereco'=>$endereco,'id'=>$id,'nome_tabela'=>'tb_escolas'];
                User::update($arr);
                User::alert('sucesso',' Escola foi editada com sucesso');
            
            }    
            
        ?>

        <div class="form-group">
            <label>Nome da Escola:</label>
            <input type="text" name="nome" value="<?php echo $escola['nome']; ?>"/>
        </div><!--form-group-->

        <div class="form-group">
            <label>Endereço:</label>
            <input type="text" name="endereco" value="<?php echo $escola['endereco']; ?>"/>
        </div><!--form-group-->

        <div class="form-group">
            <label>Turmas:</label>
            
        </div><!--form-group-->

        <div class="form-group">
            <input type="submit" name="acao1" value="Atualizar!">
        </div><!--form-group-->
        
    </form>

</div>