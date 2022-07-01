<?php 
if (isset($_POST['data']) AND isset($_POST['data2'])) {
    $data = $_POST['data'];
    $data2= $_POST['data2'];
    $connection = DB::getInstance();
    $aberto = $connection->prepare("SELECT COUNT(*) as valor FROM chamados WHERE status='Em andamento' AND data BETWEEN '$data 00:00:00' AND '$data2 23:59:59';");
    $aberto->execute();
    $aberto->setFetchMode(PDO::FETCH_ASSOC);
    $r = $aberto->fetchAll();
    foreach ($r as $vr);
    $connection = DB::getInstance();
    $aberto = $connection->prepare("SELECT COUNT(status) as valor FROM chamados WHERE status='Em aberto' AND data BETWEEN '$data 00:00:00' AND '$data2 23:59:59'");
    $aberto->execute();
    $aberto->setFetchMode(PDO::FETCH_ASSOC);
    $r = $aberto->fetchAll();
    foreach ($r as $vr2);
    $connection = DB::getInstance();
    $aberto = $connection->prepare("SELECT COUNT(status) as valor FROM chamados WHERE status='Finalizado' AND data BETWEEN '$data 00:00:00' AND '$data2 23:59:59'");
    $aberto->execute();
    $aberto->setFetchMode(PDO::FETCH_ASSOC);
    $r = $aberto->fetchAll();
    foreach ($r as $vr3);
  } else {
    $connection = DB::getInstance();
    $aberto = $connection->prepare("SELECT COUNT(status) as valor FROM chamados WHERE status='Em andamento'");
    $aberto->execute();
    $aberto->setFetchMode(PDO::FETCH_ASSOC);
    $r = $aberto->fetchAll();
    foreach ($r as $vr);
    $connection = DB::getInstance();
    $aberto = $connection->prepare("SELECT COUNT(status) as valor FROM chamados WHERE status='Em aberto'");
    $aberto->execute();
    $aberto->setFetchMode(PDO::FETCH_ASSOC);
    $r = $aberto->fetchAll();
    foreach ($r as $vr2);
    $connection = DB::getInstance();
    $aberto = $connection->prepare("SELECT COUNT(status) as valor FROM chamados WHERE status='Finalizado'");
    $aberto->execute();
    $aberto->setFetchMode(PDO::FETCH_ASSOC);
    $r = $aberto->fetchAll();
    foreach ($r as $vr3);
  }
?>