<html>

<head>
    <meta charset="UTF-8">
    <script src="https://d3js.org/d3.v4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <style>
        body {
            text-align: center;
        }

        h2 {
            text-align: center;
            font-family: "Verdana", sans-serif;
            font-size: 40px;
        }
    </style>
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



    <div class="col-xs-12 text-center mt-5">
        <h2 class="text-light">Estatísticas de chamados</h2>
    </div>



    <div id="donut-chart"></div>

        <?php 
        require "conn.php";
        $connection = DB::getInstance();
        $aberto = $connection->prepare("SELECT COUNT(status) as valor FROM chamados WHERE status='Em andamento'"); 
        $aberto->execute();
        $aberto->setFetchMode(PDO::FETCH_ASSOC);
        $r = $aberto->fetchAll();
        foreach($r as $vr);
        $connection = DB::getInstance();
        $aberto = $connection->prepare("SELECT COUNT(status) as valor FROM chamados WHERE status='Aberto'"); 
        $aberto->execute();
        $aberto->setFetchMode(PDO::FETCH_ASSOC);
        $r = $aberto->fetchAll();
        foreach($r as $vr2);
        $connection = DB::getInstance();
        $aberto = $connection->prepare("SELECT COUNT(status) as valor FROM chamados WHERE status='Finalizado'"); 
        $aberto->execute();
        $aberto->setFetchMode(PDO::FETCH_ASSOC);
        $r = $aberto->fetchAll();
        foreach($r as $vr3);
                echo "<script> var chart = bb.generate({ data: { columns: [ ['Em Andamento', {$vr['valor']}], ['Aberto', {$vr2['valor']}], ['Finalizado', {$vr3['valor']}],], type: 'donut', onclick: function (d, i) {console.log('onclick', d, i);}, onover: function (d, i) {console.log('onover', d, i);},onout: function (d, i) {console.log('onout', d, i);},},donut: {title: '',},bindto: '#donut-chart',});</script>";
        ?>

</body>

</html>