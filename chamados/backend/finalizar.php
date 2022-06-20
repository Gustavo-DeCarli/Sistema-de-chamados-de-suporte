<?php
require "funcoes.php";

try {
    $s = new Andamento();
    $s->setId($_POST['ff']);
    $s->finalizar();
    print $s;
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}

?>