<?php
require "funcoes.php";

try {
    $s = new Andamento();
    date_default_timezone_set('America/Sao_Paulo');
    $s->setId($_POST['idf2']);
    $s->setAtendente($_POST['atendente2']);
    $s->setConclusao($_POST['conclusao']);
    $s->setPrevisao(date('Y-m-d'));
    json_encode($s);
    $s->finalizar();
    print $s;
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}
