<?php
require "funcoes.php";

try {
    if($_POST['descricao'] != ''){
    $s = new Andamento();
    date_default_timezone_set('America/Sao_Paulo');
    $s->setId('');
    $s->setUserId($_POST['iduser']);
    $s->setNome($_POST['nomeuser']);
    $s->setSetor($_POST['setoruser']);
    $s->setstatus('Aberto');
    $s->setProblema($_POST['problema']);
    $s->setDescricao($_POST['descricao']);
    $s->setData(date('Y/m/d H:i'));
    $s->NovoChamado();
    print $s;
}else{
    echo "<script>window.alert('sometext')</script>";
}
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}
