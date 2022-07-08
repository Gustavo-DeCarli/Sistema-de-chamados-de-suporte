<?php
require "funcoes.php";
session_start();
echo $_SESSION['nome'];
try {
    if($_POST['descricao'] != ''){
    $s = new Andamento();
    date_default_timezone_set('America/Sao_Paulo');
    $s->setId('');
    $s->setNome($_SESSION['nome']);
    $s->setSetor($_POST['setor']);
    $s->setstatus('Em aberto');
    $s->setProblema($_POST['problema']);
    $s->setDescricao($_POST['descricao']);
    $s->setData(date('Y/m/d H:i'));
    json_encode($s);
    $s->addchamado();
    print $s;
}
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}
