<?php
require "conn.php";
class Andamento
{
    private $id = "";
    private $userid = "";
    private $nome = "";
    private $setor = "";
    private $problema = "";
    private $descricao = "";
    private $status = "";

    function __toString(){
        return json_encode([
            "id" => $this->id,
            "userid" => $this->userid,
            "status" => $this->status,
            "nome" => $this->nome,
            "setor" => $this->setor,
            "problema"=> $this->problema,
            "descricao"=> $this->descricao,
            "data"=> $this->data
        ]);
    }

    function setId($v) {$this->id = $v;}
    function setUserId($v) {$this->userid = $v;}
    function setNome($v) {$this->nome = $v;}
    function setSetor($v) {$this->setor = $v;}
    function setProblema($v) {$this->problema = $v;}
    function setDescricao($v) {$this->descricao = $v;}
    function setStatus($v) {$this->status = $v;}
    function setData($v) {$this->data = $v;}

    function InserirStatus()
    {
        $connection = DB::getInstance();
        try{
            
            $consulta = $connection->prepare("START TRANSACTION;");
            $consulta->execute();
            $consulta = $connection->prepare("UPDATE chamados SET STATUS=:status WHERE id=:id");
            $consulta->execute([
                ':id' => $this->id,
                ':status' => $this->status,
            ]);
            $consulta = $connection->prepare("COMMIT;");
            $consulta->execute();

        }catch(Exception $e){
            $consulta = $connection->prepare("ROLLBACK;");
            $consulta->execute();
            die($e->getMessage());
        }
        
    }

    function NovoChamado()
    {
        $connection = DB::getInstance();
        try{
            $consulta = $connection->prepare("START TRANSACTION;");
            $consulta->execute();
            $consulta = $connection->prepare("INSERT INTO chamados VALUES (:id,:userid,:nome,:setor,:status,:problema,:descricao,:data)");
            $consulta->execute([
                'id' => $this->id,
                ':userid' => $this->userid,
                ':nome' => $this->nome,
                ':setor' => $this->setor,
                ':status' => $this->status,
                ':problema' => $this->problema,
                ':descricao' => $this->descricao,
                ':data' => $this->data
            ]);
            $consulta = $connection->prepare("COMMIT;");
            $consulta->execute();
        }catch(Exception $e){
            $consulta = $connection->prepare("ROLLBACK;");
            $consulta->execute();
            die($e->getMessage());
        }
        
    }

    function finalizar()
    {
    $connection = DB::getInstance();
        try{
            $consulta = $connection->prepare("START TRANSACTION;");
            $consulta->execute();
            $consulta = $connection->prepare("UPDATE chamados SET status='Finalizado' WHERE id = :id");
            $consulta->execute([':id' => $this->id]);
            $consulta = $connection->prepare("COMMIT;");
            $consulta->execute();
        }catch(Exception $e){
            $consulta = $connection->prepare("ROLLBACK;");
            $consulta->execute();
        die($e->getMessage());
        }
    }
}