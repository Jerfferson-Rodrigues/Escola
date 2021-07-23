<?php

    include('classes/Usuario.php');
    include('classes/Mysql.php');

    define('INCLUDE_PATH','http://localhost/Escola/');
    define('INCLUDE_PATH_USER',INCLUDE_PATH.'cadastro/');

    //conectar com banco de dados
    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DATABASE','escola');

    // recuperas informações caso enviar antes de preeencher o formulario
    function recoverPost($post){
        if(isset($_POST[$post])){
            echo $_POST[$post];
        }
    }

?>