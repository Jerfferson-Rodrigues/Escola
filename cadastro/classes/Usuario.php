<?php

    class User{
        
        public static function carregarPagina(){
            if(isset($_GET['url'])){
                $url = explode('/',$_GET['url']);
                if(file_exists('pages/'.$url[0].'.php')){
                    include('pages/'.$url[0].'.php');
                }
                else{
                    //pagina não existe!
                    header('Location: '.INCLUDE_PATH_USER);
                }
            }else{
                include('pages/home.php');
            }
        }

        public static function alert($tipo, $mensagem){
            if($tipo == 'sucesso'){
                echo '<div class="box-alert sucesso"><i class="fa fa-check"></i>'.$mensagem.'</div>';
            }else if($tipo == 'error'){
                echo '<div class="box-alert error"><i class="fa fa-times"></i>'.$mensagem.'</div>';
            }
        }

        public static function cadastrarAluno($nome, $email, $telefone, $data, $genero,$turma,$escola){
            $sql = Mysql::conectar()->prepare("INSERT INTO `tb_alunos` VALUES (null,?,?,?,?,?,?,?)");
            $sql->execute(array($nome, $email, $telefone, $data, $genero,$turma,$escola));
        }

        public static function cadastrarTurma($nome, $ano, $nivel, $serie, $turno, $escola){
            $sql = Mysql::conectar()->prepare("INSERT INTO `tb_turmas` VALUES (null,?,?,?,?,?,?)");
            $sql->execute(array($nome, $ano, $nivel, $serie, $turno, $escola));
        }

        public static function cadastrarEscola($nome,$endereco,){
            $sql = Mysql::conectar()->prepare("INSERT INTO `tb_escolas` VALUES (null,?,?)");
            $sql->execute(array($nome,$endereco));
        }

        // public static function Contador($escola){
        //     $sql = Mysql::conectar()->prepare("SELECT COUNT(*) FROM `tb_alunos` ");
        //     $sql->execute(array($escola));
        // }

        public static function select($table, $query = '', $arr = ''){
            if($query != false){
                $sql = Mysql::conectar()->prepare("SELECT * FROM `$table` WHERE $query");
                $sql->execute($arr);
            }else{
                $sql = Mysql::conectar()->prepare("SELECT * FROM `$table`");
                $sql->execute();
            }
            return $sql->fetch();
        }

        public static function update($arr,$single = false){
            $certo = true;
            $first = false;
            $nome_tabela = $arr['nome_tabela'];
            
            $query = "UPDATE `$nome_tabela` SET ";
            foreach($arr as $key => $value){
                $nome = $key;
                $valor = $value;
                if($nome == 'acao1' || $nome == 'nome_tabela' || $nome == 'id')
                    continue;
                if($value == ''){
                    $certo = false;
                    break;
                }

                if($first == false){
                    $first = true;
                    $query.="$nome=?";
                }else{
                    $query.=",$nome=?";
                }

                $parametros[] = $value;
            }

            
            if($certo == true){
                if($single == false){
                    $parametros[] = $arr['id'];
                    $sql = Mysql::conectar()->prepare($query.' WHERE id=?');
                    $sql->execute($parametros);
                }else{
                    $sql = Mysql::conectar()->prepare($query);
                    $sql->execute($parametros);
                }
            }
            return $certo;
        }

        public static function deletar($tabela,$id=false){
            if($id == false){
                $sql = Mysql::conectar()->prepare("DELETE FROM `$tabela`");
            }else{
                $sql = Mysql::conectar()->prepare("DELETE FROM `$tabela` WHERE id = $id");
            }
            $sql->execute();
        }

        public static function selectAll($tabela,$start = null, $end = null){
            if($start == null && $end == null){
                $sql = Mysql::conectar()->prepare("SELECT * FROM `$tabela` ");
            }else{
                $sql = Mysql::conectar()->prepare("SELECT * FROM `$tabela` LIMIT $start,$end");
            }
            $sql->execute();
            
            return $sql->fetchAll();
        }


    }

?>