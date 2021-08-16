<div class="box-content ">
<h2> Alunos </h2>

<div class="seeking right">  
    <input type="search" id="busca" name="q">
    <button type="submit"><i class="fas fa-search"></i></button>
</div>

    <div class="table-responsive wraper">
    <table>
        <tr>
            <td>Alunos</td> 
            <td>Turma</td> 
            <td>Configurar <a class="edit" href="<?php echo INCLUDE_PATH_USER ?>home-aluno"><i class="fas fa-user-cog"></i></a></td>
            

        </tr>

        <?php
            $alunoHome = Mysql::conectar()->prepare("SELECT * FROM `tb_alunos`");
            $alunoHome->execute();
            $alunoHome = $alunoHome->fetchAll();
            foreach($alunoHome as $key => $value){
        ?>

        <tr>
            <td><span><?php echo $value['nome'] ?></span></td>
            <td><span><?php echo $value['turma'] ?></span></td>
            
           

        </tr>
        
        <?php }?>
    </table>
    </div><!--table-responsive-->
</div><!--box-content-->


<div class="box-content ">
<h2> Turmas </h2>
    <div class="table-responsive wraper">
    <table class="turma">
        <tr>
            <td>Turmas</td> 
            <td>Nivel</td> 
            <td>Turno</td> 
            <td>Configurar <a class="edit" href="<?php echo INCLUDE_PATH_USER ?>home-turma"><i class="fas fa-cog" style="color: white;"></i></i></a></td>
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
            

        </tr>
        
        <?php }?>

    </table>
    </div><!--table-responsive-->
</div><!--box-content--> 

<div class="box-content ">
<h2> Escolas </h2>
    <div class="table-responsive wraper">
    <table class="escola">
        <tr>
            <td>Nome</td> 
            <td>Endereço</td> 
            <!-- <td>Total de alunos</td>  -->
            <td>Configurar <a class="edit" href="<?php echo INCLUDE_PATH_USER ?>home-escola"><i class="fas fa-tools"></i></a></td>

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
            

        </tr>
        
        <?php }?>


    </table>
    </div><!--table-responsive-->
</div><!--box-content--> 
