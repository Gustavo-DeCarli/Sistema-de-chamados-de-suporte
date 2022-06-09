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

<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
    <a class="navbar-brand mt-2">
      <img src="images/rinaldi.png" height="40">
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link text-light" aria-current="page" href="#">Chamados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Estatísticas</a>
        </li>
        <li class="nav-item px-2">
          <button type="submit" class="btn btn-danger p-1 mt-1 px-2">Logout</button>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="tabela container container-fluid position-static">
  <?php
  require "conn.php";
  $connection = DB::getInstance();
  $stmt = $connection->query("SELECT * from chamados");
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $dados = $stmt->fetchAll();

// foreach ($dados as $dados11)
foreach($dados as $dados11){

  $dados[$dados11['id']] = [
    'id' => $dados11['id'],
    'nome' => $dados11['nome'],
    'setor' => $dados11['setor'],
    'problema' => $dados11['problema'],
  ];
}
foreach ($dados11 as $dados111){
  $table ="";
 $table = "<table id='tabela' class='table rounded bg-light'>";
 $table .= "<thead>";
 $table .= "<tr>";
 $table .= "<th scope='col'>ID</th>";
 $table .= "<th scope='col'>Nome</th>";
 $table .= "<th scope='col'>Setor</th>";
 $table .= "<th scope='col'>Tipo de problema</th>";
 $table .= "<th scope='col'>Descrição</th>";
 $table .= "<th scope='col'>Data/hora</th>";
 $table .= "</tr>";
 $table .= "</thead>";
 $table .= "<tbody>";
 $table .= "<tr>";
 $table .= "<th scope='row'>{$dados111['id']}</th>";
 $table .= "<td>{$dados111['nome']}</td>";
 $table .= "<td>{$dados111['setor']}</td>";
 $table .= "<td>{$dados111['problema']}</td>";
 $table .= "<td>{$dados111['descricao']}</td>";
 $table .= "<td>{$dados111['data']}</td>";
 $table .= "</tr>";
//  $table .= "<tr>";
//  $table .= "<th scope='row'></th>";
//  $table .= "<td>Jacob</td>";
//  $table .= "<td>Thornton</td>";
//  $table .= "<td>@fat</td>";
//  $table .= "<td>@mdo</td>";
//  $table .= "<td>@mdo</td>";
//  $table .= "</tr>";
//  $table .= "<tr>";
//  $table .=  "<th scope='row'></th>";
//  $table .= "<td>Larry</td>";
//  $table .=  "<td>the Bird</td>";
//  $table .=  "<td>@twitter</td>";
//  $table .=   "<td>@mdo</td>";
//  $table .=  "<td>@mdo</td>";
//  $table .=  "</tr>";
 $table .= "</tbody>";
 $table .= "</table>";
}
 echo $table;
?>
</div>


</body>

</html>