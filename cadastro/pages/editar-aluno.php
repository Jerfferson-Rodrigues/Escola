<?php
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $acesso = User::select('tb_alunos','id = ?',array($id));
    }else{
        User::alert('erro','Você precisa pasar o parametro ID.');
        die();
    }
?>  
<div class="box-content">
    <div class="back"><a href="<?php echo INCLUDE_PATH_USER ?>home-aluno"><i class="fas fa-arrow-circle-left"></i> Voltar</a></div>
    <h2><i class="fa fa-pen"></i> Editar Aluno </h2>

    <form method="post" enctype="multipart/form-data">

        <?php
            if(isset($_POST['acao1'])){
                //enviei o formulario
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $telefone = $_POST['telefone'];
                $data = $_POST['data'];
                $turma = $_POST['turma'];
                $escola = $_POST['escola'];



                $arr = ['nome'=>$nome,'email'=>$email,'telefone'=>$telefone,'data'=>$data,'turma'=>$turma,'escola'=>$escola,'id'=>$id,'nome_tabela'=>'tb_alunos'];
                User::update($arr);
                User::alert('sucesso',' O Aluno foi editado com sucesso');
            
            }    
            
        ?>

        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $acesso['nome']; ?>" />
        </div><!--form-group-->

        <div class="form-group">
            <label>E-mail</label>
            <input type="email" name="email" value="<?php echo $acesso['email']; ?>" />
        </div><!--form-group-->

        <div class="form-group">
            <label>Telefone:</label>
            <input type="text" name="telefone" value="<?php echo $acesso['telefone']; ?>" />
        </div><!--form-group-->

        <div class="form-group">
            <label>Data de Nascimento:</label>
            <input type="date" name="data" value="<?php echo $acesso['data']; ?>" />
        </div><!--form-group-->

        <div class="form-group">
            <label>Turmas:</label>
            <select name="turma">
                <option value="<?php echo $acesso['turma']; ?>" selected><?php echo $acesso['turma']; ?></option>
                <?php
                    $salas = User::selectAll('tb_turmas'); 
                    foreach($salas as $key => $value){
                ?>
                <option value="<?php echo $value['nome'] ?>"><?php echo $value['nome']; ?></option>
                <?php }?>
            </select>
        </div><!--form-group-->

        <div class="form-group">
            <label>Escola:</label>
            <select name="escola">
                <option value="<?php echo $acesso['escola']; ?>" selected><?php echo $acesso['escola']; ?></option>
                <?php
                    $escolas = User::selectAll('tb_escolas'); 
                    foreach($escolas as $key => $value){
                ?>
                <option value="<?php echo $value['nome'] ?>"><?php echo $value['nome']; ?></option>
                <?php }?>
            </select>
        </div><!--form-group-->

        <div class="form-group">
            <input type="submit" name="acao1" value="Atualizar!">
        </div><!--form-group-->
        
    </form>

</div>