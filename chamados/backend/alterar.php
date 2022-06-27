<?php
require "funcoes.php";

try {
    
    $s = new Andamento();
    $s->setid($_POST['idf']);
    $s->setStatus($_POST['status']);
    $s->setAtendente($_POST['atendente']);
    $s->setPrevisao($_POST['previsao']);
    $s->InserirStatus();
    print $s;
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}
