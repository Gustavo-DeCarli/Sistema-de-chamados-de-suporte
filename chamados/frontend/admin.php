<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Teste</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <link href="styleadmin.css" rel="stylesheet" type="text/css" />
  <script src="script.js" type="text/javascript"></script>

</head>

<body>

  <nav id="navi" class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand mt-2">
        <img src="images/rinaldi.png" height="40">
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
            <button type="submit" class="btn btn-danger p-1 mt-1 px-2">Logout</button>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="tabela container container-fluid position-static">
    <table id='chamados' class='table rounded bg-light'>
      <thead>
        <tr>
          <th scope='col'>ID</th>
          <th scope='col'>Nome</th>
          <th scope='col'>Setor</th>
          <th scope='col'>Tipo de problema</th>
          <th scope='col'>Status</th>
          <th scope='col'>Descrição</th>
          <th scope='col'>Data/hora</th>
        </tr>
      </thead>
      <tbody>

        <?php
        require "conn.php";
        $connection = DB::getInstance();
        $stmt = $connection->query("SELECT *, DATE_FORMAT(data, '%d/%m/%Y %h:%i') as data from chamados");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $dados11 = $stmt->fetchAll();
        foreach ($dados11 as $dados111) {
          $table = "";
          $table .= "<tr>";
          $table .= "<th scope='row' id='{$dados111['ID']}'>{$dados111['ID']}</th>";
          $table .= "<td>{$dados111['nome']}</td>";
          $table .= "<td>{$dados111['setor']}</td>";
          $table .= "<td>{$dados111['problema']}</td>";
          $table .= "<td>{$dados111['status']}</td>";
          $table .= "<td>{$dados111['descricao']}</td>";
          $table .= "<td>{$dados111['data']}</td>";
          $table .= "<td><form action='detalhes.php' method='POST'><button name='id' id='id' value='{$dados111['ID']}' type='submit' class='btn btn-danger'>Mais detalhes</button></form></td>";
          $table .= "</tr>";
          echo $table;
        }
        ?>
      </tbody>
    </table>



</body>

</html>