<?php

require_once "Conexao.php";

class Usuarios
{
    public $NOME;
    public $USUARIO;
    public $EMAIL;
    public $SENHA;

    public function registrar(){

        try{
            if(isset($_POST['cadastrar'])){
                $this->NOME = $_POST["nome"];
                $this->USUARIO = $_POST["usuario"];
                $this->EMAIL = $_POST["email"];
                $this->SENHA = $_POST["senha"];
    
                $bd = new Conexao();
    
                $comandoRegistrar = "insert into 
                USUARIOS(nome, usuario, email, senha) 
                value('{$this->NOME}', '{$this->USUARIO}', '{$this->EMAIL}', '{$this->SENHA}')";
    
                return $bd->executeQuery($comandoRegistrar);
    
            }

        }catch(PDOException $msg){
            echo "Não foi possível inserir os dados: ".$msg->getMessage();
        }


    }

    public function login(){
        try{
            $this->USUARIO = $_POST["usuario"];
            $this->SENHA = $_POST["senha"];

            $bd = new Conexao();

            $sql = "select * from usuarios where usuario = '{$this->USUARIO}' and senha = '{$this->SENHA}'";

            return $bd->executeQuery($sql);

        }catch(PDOException $msg){
            echo "Não foi possível logar com os dados do aluno: ".$msg->getMessage();
        }
    }

}
