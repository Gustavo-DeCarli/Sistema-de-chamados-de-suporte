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
if ($_SESSION['nome'] != 'administrator') {
  header('Location: ../user.php');
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Chamados Rinaldi</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js" integrity="sha256-cHVO4dqZfamRhWD7s4iXyaXWVK10odD+qp4xidFzqTI=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link rel="icon" type="image/x-icon" href="images/nav.png">
</head>

<body class="fundo">
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
  <div class="col-xs-12 text-center mt-3">
    <h2 class="text-light">Estatísticas de chamados</h2>
  </div>
  <div class='mt-4 grafico'>
    <nav class="navbar bg-light rounded-top">
      <form action="estatisticas.php" method='POST' class="container-fluid justify-content-center">
        <div class="ms-2 col-auto">
          <a>Inicio:</a>
        </div>
        <div class="ms-2 col-auto">
          <input class="form-control " name="data" type="date">
        </div>
        <div class="ms-2 col-auto">
          <a>Fim:</a>
        </div>
        <div class="ms-2 col-auto">
          <input class="form-control " name="data2" type="date">
        </div>
        <div class="ms-2 col-auto">
          <input class="btn btn-success" type="submit" value='Filtrar'>
        </div>
      </form>
    </nav>
    <canvas id="myChart">
      <script>
        <?php
        require "../backend/conn.php";
        require "../backend/consultastats.php";
        ?>
        let ctx = document.getElementById('myChart').getContext('2d');
        let chart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Finalizado', 'Em andamento', 'Em aberto'],
            datasets: [{
              label: 'Nº de chamados',
              data: [<?php echo json_encode($vr3['valor']) ?>, <?php echo json_encode($vr['valor']) ?>, <?php echo json_encode($vr2['valor']) ?>],
              backgroundColor: [
                'rgba(26, 150, 37, 1)',
                'rgba(202, 108, 0, 1)',
                'rgba(221, 25, 25, 1)'
              ],
              borderColor: [
                'rgba(0,0,0, 1)'
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