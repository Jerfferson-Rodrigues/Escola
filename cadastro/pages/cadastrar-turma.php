<div class="box-content">
    <h2><i class="fa fa-pen"></i> Cadastrar Turma</h2>

    <form method="post" enctype="multipart/form-data">

        <?php
            if(isset($_POST['acao1'])){
                $nome = $_POST['nome'];
                $ano = $_POST['ano'];
                $nivel = filter_input(INPUT_POST, 'nivel'); //mais seguro!
                $serie = filter_input(INPUT_POST, 'serie'); //mais seguro!
                $turno = filter_input(INPUT_POST, 'turno'); //mais seguro!
                $escola = filter_input(INPUT_POST, 'escola'); //mais seguro!

                //verifica se está preenchido, se não da erro
                if($nome == ''){
                    User::alert('error', ' O Nome da turma está vazio!');
                }else if($ano == ''){
                    User::alert('error', ' O Ano está vazio!');
                }else if($nivel == ''){
                    User::alert('error', ' Selecione um nivel de Ensino!');
                }else if($serie == ''){
                    User::alert('error', ' Selecione uma Série');
                }else if($turno == ''){
                    User::alert('error', ' Selecione um Turno!');
                }
                else if($escola == ''){
                    User::alert('error', ' Selecione a Escola');
                }
                else{
                        //apenas cadastrar no banco de dados
                        $usuario = new User();
                        $usuario->cadastrarTurma($nome, $ano, $nivel, $serie, $turno, $escola);
                        User::alert('sucesso', ' O cadastro da turma '.$nome.' foi realizada com sucesso!');
                    }
            }
        ?>

        <div class="form-group">
            <label>Nome da turma:</label>
            <input type="text" name="nome" value="<?php recoverPost('nome'); ?>"/>
        </div><!--form-group-->

        <div class="form-group">
            <label>Ano:</label>
            <input type="text" name="ano" value="<?php recoverPost('ano'); ?>" />
        </div><!--form-group-->

        <div class="form-group">
            <label>Nível de Ensino:</label>
            <select name="nivel">
                <option value="" disabled selected>Selecione um Nível de Ensino</option>
                <option value="fundamental">Fundamental</option>
                <option value="medio">Medio</option>
            </select>
        </div><!--form-group-->

        <div class="form-group">
            <label>Série:</label>
            <select name="serie">
                <option value="" disabled selected>Selecione uma Série</option>
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
                <option value="" disabled selected>Selecione um turno</option>
                <option value="matutino">Matutino</option>
                <option value="vespertino">Vespertino</option>
                
            </select>
        </div><!--form-group-->

        <div class="form-group">
            <label>Escola:</label>
            <select name="escola">
                <option disabled selected>Selecione a Escola</option>
                <?php
                    $escolas = User::selectAll('tb_escolas'); 
                    foreach($escolas as $key => $value){
                ?>
                <option value="<?php echo $value['nome'] ?>"><?php echo $value['nome']; ?></option>
                <?php }?>
            </select>
        </div><!--form-group-->

        <div class="form-group">
            <input type="submit" name="acao1" value="Cadastrar!">
        </div><!--form-group-->

    </form>

</div>