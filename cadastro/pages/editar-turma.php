<?php
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $turma = User::select('tb_turmas','id = ?',array($id));
    }else{
        User::alert('erro','Você precisa pasar o parametro ID.');
        die();
    }   
?>
<div class="box-content">
    <div class="back"><a href="<?php echo INCLUDE_PATH_USER ?>home-turma"><i class="fas fa-arrow-circle-left"></i> Voltar</a></div>
    <h2><i class="fa fa-pen"></i> Editar Turma</h2>

    <form method="post" enctype="multipart/form-data">

        <?php
            if(isset($_POST['acao1'])){
                //enviei o formulario
                $nome = $_POST['nome'];
                $ano = $_POST['ano'];
                $nivel = $_POST['nivel'];
                $serie = $_POST['serie'];
                $turno = $_POST['turno'];
                $escola = $_POST['escola'];


                $arr = ['nome'=>$nome,'ano'=>$ano,'nivel'=>$nivel,'serie'=>$serie,'turno'=>$turno,'escola'=>$escola,'id'=>$id,'nome_tabela'=>'tb_turmas'];
                User::update($arr);
                User::alert('sucesso',' A Turma foi editada com sucesso');
            
            }    
            
        ?>

        <div class="form-group">
            <label>Nome da turma:</label>
            <input type="text" name="nome" value="<?php echo $turma['nome']; ?>"/>
        </div><!--form-group-->

        <div class="form-group">
            <label>Ano:</label>
            <input type="text" name="ano" value="<?php echo $turma['ano']; ?>" />
        </div><!--form-group-->

        <div class="form-group">
            <label>Nível de Ensino:</label>
            <select name="nivel">
                <option value="<?php echo $turma['nivel']; ?>"><?php echo $turma['nivel']; ?></option>
                <option value="fundamental">Fundamental</option>
                <option value="medio">Medio</option>
            </select>
        </div><!--form-group-->

        <div class="form-group">
            <label>Série:</label>
            <select name="serie">
                <option value="<?php echo $turma['serie']; ?>" selected><?php echo $turma['serie']; ?></option>
                <option value="1 serie">1 Série</option>
                <option value="2 serie">2 Série</option>
                <option value="3 serie">3 Série</option>
                <option value="4 serie">4 Série</option>
                <option value="5 serie">5 Série</option>
                <option value="6 serie">6 Série</option>
                <option value="7 serie">7 Série</option>
                <option value="8 serie">8 Série</option>
                <option value="1 ano">1 Ano</option>
                <option value="2 ano">2 Ano</option>
                <option value="3 ano">3 Ano</option>
            </select>
        </div><!--form-group-->

        <div class="form-group">
            <label>Turno:</label>
            <select name="turno">
                <option value="<?php echo $turma['turno']; ?>" selected><?php echo $turma['turno']; ?></option>
                <option value="matutino">Matutino</option>
                <option value="vespertino">Vespertino</option>
            </select>
        </div><!--form-group-->

        <div class="form-group">
            <label>Escola:</label>
            <select name="escola">
                <option value="<?php echo $turma['escola']; ?>" selected><?php echo $turma['escola']; ?></option>
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