<html>

<head>
  <meta charset="UTF-8">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js" integrity="sha256-cHVO4dqZfamRhWD7s4iXyaXWVK10odD+qp4xidFzqTI=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="style.css" rel="stylesheet" type="text/css" />

</head>

<body class="fundo">
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



  <div class='grafico'>
    <canvas id="myChart">
      <script>
        <?php
        require "../backend/conn.php";
        $connection = DB::getInstance();
        $aberto = $connection->prepare("SELECT COUNT(status) as valor FROM chamados WHERE status='Em andamento'");
        $aberto->execute();
        $aberto->setFetchMode(PDO::FETCH_ASSOC);
        $r = $aberto->fetchAll();
        foreach ($r as $vr);
        $connection = DB::getInstance();
        $aberto = $connection->prepare("SELECT COUNT(status) as valor FROM chamados WHERE status='Aberto'");
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
        ?>
        let ctx = document.getElementById('myChart').getContext('2d');
        let chart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Finalizado', 'Em andamento', 'Aberto'],
            datasets: [{
              label: 'Nº de chamados',
              data: [<?php echo json_encode($vr3['valor']) ?>, <?php echo json_encode($vr['valor']) ?>, <?php echo json_encode($vr2['valor']) ?>],
              backgroundColor: [
                'rgba(26, 150, 37, 0.8)',
                'rgba(202, 108, 0, 0.8)',
                'rgba(221, 25, 25, 0.8)'
              ],
              borderColor: [

              ],
              borderWidth: 1
            }]
          },
          options: {
            elements: {
              line: {
                tension: 0
              }
            }
          }
        });
      </script>
    </canvas>
  </div>

</body>

</html>