<?php
require "funcoes.php";

try {
    $s = new Andamento();
    $s->setId($_POST['idf2']);
    $s->setConclusao($_POST['conclusao']);
    $s->finalizar();
    print $s;
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}
