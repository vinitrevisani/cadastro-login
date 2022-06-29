<?php

class Conexao
{
    private $server = "";
    private $bd = "bd";
    private $user = "root";
    private $password = "";
    private $conn = "";

    public function __construct()
    {
        try{
            $this->conn = new PDO("mysql:host={$this->server};dbname={$this->bd};charset=utf8",$this->user, $this->password);

        }catch(PDOException $msg){
            echo "Não foi possível conectar com o servidor: ".$msg->getMessage();
        }
    }

    public function executeQuery($comando){
        try{
            // criar uma variavel para receber o comando sql
            $sql = $this->conn->prepare($comando);
            // executar o comando no servidor
            $sql->execute();
            //testar se o comando deu certo verificando a quantidade linha retornadas
            if($sql->rowCount() > 0){
                return '1'; // retornar o comando para tela
            }else{ // comando deu errado
                return $sql->errorInfo(); // retornar o erro do comando no banco
            }
        }catch (PDOException $msg){
            echo "Não foi possível executar o comando: ". $msg->getMessage();
        }
    }

    
    public function executeSelect($comando){
        try {
           //criar uma variavel para receber o comando sql
           $sql = $this->conn->prepare($comando);
           //executar o comando no servidor
           $sql->execute();
           // testar se o codigo retornou alguma linha -> maior que zero deu certo // senão deu erro

            if($sql->rowCount() > 0 ){
                //retornar o resultado do select para tela
                return $sql->fetchAll(PDO::FETCH_CLASS);
            }else{
                return $sql->errorInfo();
            }
        }catch(PDOException $msg){
            echo "Não foi possível executar o comando: " . $msg->getMessage();
        }
    }
}

?>