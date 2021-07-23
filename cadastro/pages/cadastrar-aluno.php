<div class="box-content">
    <h2><i class="fa fa-pen"></i> Cadastrar Aluno</h2>

    <form method="post" enctype="multipart/form-data">

        <?php
            if(isset($_POST['acao1'])){
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $telefone = $_POST['telefone'];
                $data = $_POST['data'];
                // $genero = $_POST['genero']; 
                $genero = filter_input(INPUT_POST, 'genero'); //mais seguro!
                $turma = filter_input(INPUT_POST, 'turma'); //mais seguro!
                $escola = filter_input(INPUT_POST, 'escola'); //mais seguro!

                if($nome == ''){
                    User::alert('error', ' O nome está vazio!');
                }else if($email == ''){
                    User::alert('error', ' O e-mail está vazio!');
                }else if($genero == ''){
                    User::alert('error', ' Selecione o sexo!');
                }else if($turma == ''){
                    User::alert('error', ' Selecione a Turma');
                }
                else if($escola == ''){
                    User::alert('error', ' Selecione a escola ou cadastre primeiro!');
                }
                else{
                        //apenas cadastrar no banco de dados
                        $usuario = new User();
                        $usuario->cadastrarAluno($nome, $email, $telefone, $data, $genero,$turma,$escola);
                        User::alert('sucesso', ' O cadastro do aluno '.$nome.' foi feito com sucesso!');
                    }
            }
        ?>

        <div class="form-group">
            <label>Nome<span>*</span>:</label>
            <input type="text" name="nome" value="<?php recoverPost('nome'); ?>" />
        </div><!--form-group-->

        <div class="form-group">
            <label>E-mail<span>*</span>:</label>
            <input type="email" name="email" value="<?php recoverPost('email'); ?>"/>
        </div><!--form-group-->

        <div class="form-group">
            <label>Telefone:</label>
            <input type="text" name="telefone" value="<?php recoverPost('telefone'); ?>"/>
        </div><!--form-group-->

        <div class="form-group">
            <label>Data de Nascimento:</label>
            <input type="date" name="data" />
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
            <label>Turmas:</label>
            <select name="turma">
                <option disabled selected>Selecionar Turma</option>
                <?php
                    $salas = User::selectAll('tb_turmas'); 
                    foreach($salas as $key => $value){
                ?>
                <option value="<?php echo $value['nome'] ?>"><?php echo $value['nome']; ?></option>
                <?php }?>
            </select>
        </div><!--form-group-->


        <div class="form-group">
            <label>Gênero:</label>
            <input type="radio" id="masculino" name="genero" value="masculino"/> Masculino<br/>
            <input type="radio" id="feminino" name="genero" value="feminino"/> Feminino
        </div><!--form-group-->

        <div class="form-group">
            <input type="submit" name="acao1" value="Cadastrar!">
        </div><!--form-group-->

    </form>

</div>