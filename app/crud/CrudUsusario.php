<?php

require_once '../database/Conexao.php';
require_once '../models/Usuario.php';



class CrudUsusario {

    private $conexao;

    public function __construct(){
        $this->conexao = Conexao::getConexao();
    }

    public function getUsuarios(){
        $sql = "select * from usuarios";
        $usuarios = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        print_r($usuarios);
    }

    public function cadastrar(){
        $sql = "INSERT INTO `usuarios` (`idUsuarios`, `telefone`, `email`, `senha`, `nome`) VALUES (3, '34543454', 'arildinho@gmail.com', '1234', 'Arildinho2')";

        $this->conexao->exec($sql);


    }


}

 $ana = new CrudUsusario();

 //$ana->getUsuarios();

    $ana->cadastrar();
