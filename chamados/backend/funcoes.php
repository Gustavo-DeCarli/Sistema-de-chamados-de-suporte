<?php
require "conn.php";
class Andamento
{
    private $id = "";
    private $status = "";

    function __toString(){
        return json_encode([
            "id" => $this->id,
            "status" => $this->status,
        ]);
    }

    function setId($v) {$this->id = $v;}
    function setStatus($v) {$this->status = $v;}

    function inserir()
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

    function finalizar()
    {
        $connection = DB::getInstance();
        $consulta = $connection->prepare("UPDATE chamados SET status='Finalizado' WHERE id = ':id'");
        $consulta->execute([':id' => $this->id]);
    }
}

