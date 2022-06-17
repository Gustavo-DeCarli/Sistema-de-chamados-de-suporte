<?php
require "funcoes.php";

try {
    
    $s = new Andamento();
    $s->setid($_POST['idf']);
    $s->finalizar();
    print $s;
}catch(Exception $e){
    print json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}

?>