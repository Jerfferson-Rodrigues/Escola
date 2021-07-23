<div class="box-content">
    <h2><i class="fa fa-pen"></i> Cadastrar Escola</h2>

    <form method="post" enctype="multipart/form-data">

        <?php
            if(isset($_POST['acao1'])){
                $nome = $_POST['nome'];
                $endereco = $_POST['endereco'];

                if($nome == ''){
                    User::alert('error', ' O Nome da turma está vazio!');
                }else if($endereco == ''){
                    User::alert('error', ' O endereço está vazio!');
                }
                else{
                        //apenas cadastrar no banco de dados
                        $usuario = new User();
                        $usuario->cadastrarEscola($nome, $endereco);
                        User::alert('sucesso', ' Escola cadastrada com sucesso!');
                    }
            }
        ?>

        <div class="form-group">
            <label>Nome da Escola<span>*</span>:</label>
            <input type="text" name="nome" value="<?php recoverPost('nome'); ?>"/>
        </div><!--form-group-->

        <div class="form-group">
            <label>Endereço<span>*</span>:</label>
            <input type="text" name="endereco" value="<?php recoverPost('endereco'); ?>" />
        </div><!--form-group-->

        <div class="form-group">
            <input type="submit" name="acao1" value="Cadastrar!">
        </div><!--form-group-->

    </form>

</div>