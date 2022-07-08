<?php
session_start();
if (!isset($_SESSION['nome'])) {
  header("Location: ../index.php?log"); 
  exit;
}
if (isset($_POST['logout'])) {
  session_destroy();
  header('Location: ../index.php');
}
if($_SESSION['nome'] != 'ADMINISTRATOR'){
  header('Location: ../user.php');
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Chamados Rinaldi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <script src="script.js" type="text/javascript"></script>
  <link rel="icon" type="image/x-icon" href="images/nav.png">
</head>

<body>
  <nav id="navi" class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand">
        <img src="images/rinaldi.png" height="35">
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link text-light" aria-current="page" href="admin.php">Chamados</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="estatisticas.php">Estatísticas</a>
          </li>
          <li class="nav-item px-2">
            <form method="POST">
            <button type="submit" name='logout' class="btn btn-danger p-1 mt-1 px-2">Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="tabela container container-fluid position-static">
    <div id="chamadosadm">
      <nav class="navbar bg-light rounded-top">
        <form action="admin.php" method='POST' class="container-fluid justify-content-start">
          <div class="col-auto">
            <select class="form-select" name="status">
              <option value='' selected>Selecione o status</option>
              <option value="Em Aberto">Em Aberto</option>
              <option value="Em andamento">Em andamento</option>
              <option value="Finalizado">Finalizado</option>
            </select>
          </div>
          <div class="ms-2 col-auto">
            <a >De:</a>
          </div>
          <div class="ms-2 col-auto">
            <input class="form-control" name="data" type="date">
          </div>
          <div class="ms-2 col-auto">
            <a >Até:</a>
          </div>
          <div class="ms-2 col-auto">
            <input class="form-control" name="data2" type="date">
          </div>
          <div class="ms-2 col-auto">
            <input class="btn btn-success" type="submit" value='Filtrar'>
          </div>
        </form>
      </nav>
      <table id='chamados' class='table bg-light'>
        <thead>
          <tr class='text-center'>
            <th scope='col'>ID</th>
            <th scope='col'>Nome</th>
            <th scope='col'>Setor</th>
            <th scope='col'>Tipo de problema</th>
            <th scope='col'>Status</th>
            <th scope='col'>Descrição</th>
            <th scope='col'>Data/hora</th>
            <th scope='col'>Previsão de Atendimento</th>
            <th scope='col'>Atendente</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require "../backend/conn.php";
          $connection = DB::getInstance();
          if (isset($_POST['data']) or isset($_POST['status']) or isset($_POST['data2'])) {
            $data = $_POST['data'];
            $data2 = $_POST['data2'];
            $status = $_POST['status'];
            if ($data != '' and $status != '' and $data2 != '') {
              $stmt = $connection->query("SELECT *, DATE_FORMAT(data, '%d/%m/%Y %h:%i') as data, DATE_FORMAT(previsao, '%d/%m/%Y') as previsao from chamados WHERE data BETWEEN '$data 00:00:00' AND '$data2 23:59:00' AND status = '$status' ORDER BY id DESC");
            } elseif ($data != '' and $data2 != '' and $status == '') {
              $stmt = $connection->query("SELECT *, DATE_FORMAT(data, '%d/%m/%Y %h:%i') as data, DATE_FORMAT(previsao, '%d/%m/%Y') as previsao from chamados WHERE data BETWEEN '$data 00:00:00' AND '$data2 23:59:00' ORDER BY id DESC");
            } elseif ($data == '' and $status != '') {
              $stmt = $connection->query("SELECT *, DATE_FORMAT(data, '%d/%m/%Y %h:%i') as data, DATE_FORMAT(previsao, '%d/%m/%Y') as previsao from chamados WHERE status = '$status' ORDER BY id DESC");
            } else {
              $stmt = $connection->query("SELECT *, DATE_FORMAT(data, '%d/%m/%Y %h:%i') as data, DATE_FORMAT(previsao, '%d/%m/%Y') as previsao from chamados ORDER BY id DESC");
            }
          } else {
            $stmt = $connection->query("SELECT *, DATE_FORMAT(data, '%d/%m/%Y %h:%i') as data, DATE_FORMAT(previsao, '%d/%m/%Y') as previsao from chamados ORDER BY id DESC");
          }
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $dados11 = $stmt->fetchAll();
          foreach ($dados11 as $dados111) {
            $table = "";
            $table .= "<tr class='text-center'>";
            $table .= "<th scope='row' id='{$dados111['ID']}'>{$dados111['ID']}</th>";
            $table .= "<td>{$dados111['nome']}</td>";
            $table .= "<td>{$dados111['setor']}</td>";
            $table .= "<td>{$dados111['problema']}</td>";
            $table .= "<td>{$dados111['status']}</td>";
            $table .= "<td class='texto text-break'>{$dados111['descricao']}</td>";
            $table .= "<td>{$dados111['data']}</td>";
            $table .= "<td>{$dados111['previsao']}</td>";
            $table .= "<td>{$dados111['atendente']}</td>";
            $table .= "<td><form action='detalhes.php' method='POST'><button name='id' id='id' value='{$dados111['ID']}' type='submit' class='btn btn-danger'>Mais detalhes</button></form></td>";
            $table .= "</tr>";
            echo $table;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>