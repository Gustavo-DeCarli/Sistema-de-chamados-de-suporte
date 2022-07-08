<?PHP
if ($_POST['id'] != '') {
    $id = $_POST["id"];
} else {
    header('Location: user.php');
}
session_start();
if (!isset($_SESSION['nome'])) {
    header("Location: ../index.php?log");
    exit;
}
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: ../index.php');
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
                    <li class="nav-item px-2">
                        <form method="POST">
                            <button type="submit" name='logout' class="btn btn-danger p-1 mt-1 px-2">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="tabela" class="mx-auto">
        <nav class="navbar bg-light rounded-top">
            <form class="container-fluid justify-content-start">
                <a class="text-light btn btn-success me-2" href="user.php" style='text-decoration: none'>Voltar</a>
            </form>
        </nav>
        <div id="lista">
            <table class="container rounded-bottom">
                <div class="row">
                    <?php
                    require "../backend/conn.php";
                    $connection = DB::getInstance();
                    $consulta = $connection->query("SELECT ID,nome,setor,status,problema,descricao,DATE_FORMAT(data, '%d/%m/%Y %h:%i') as data, atendente, previsao, conclusao from chamados where id=$id");
                    $consulta->setFetchMode(PDO::FETCH_ASSOC);
                    $dados = $consulta->fetchAll();
                    foreach ($dados as $dados2) {
                        $table = "";
                        $table .= "<div class='col text-center border border-5 border-light rounded-start'>ID: {$dados2["ID"]}</div>";
                        $table .= "<div class='col text-center border border-5 border-light'>Nome: {$dados2["nome"]}</div>";
                        $table .= "<div class='col text-center border border-5 border-light rounded-end'>Setor: {$dados2["setor"]}</div> ";
                        $table .= "<div class='w-100 mt-2'></div>";
                        $table .= "<div class='col text-center border border-5 border-light rounded-start'>Tipo de problema: {$dados2["problema"]}</div>";
                        $table .= "<div class='col text-center border border-5 border-light'>Status: {$dados2["status"]}</div>";
                        $table .= "<div class='col text-center border border-5 border-light rounded-end'>Data/hora: {$dados2["data"]}</div>";
                        $table .= "<div class='w-100 mt-2'></div>";
                        $table .= "<div class='col text-center border border-5 border-light rounded-start'>Atendente: {$dados2["atendente"]}</div>";
                        $table .= "<div class='col text-center border border-5 border-light rounded-end'>Previsão de Atendimento: {$dados2["previsao"]}</div>";
                        $table .= "<div class='w-100 mt-2'></div>";
                        $table .= "<div id='desc' class='col text-break mt-2'>Descrição: {$dados2["descricao"]}</div>";
                        $table .= "<div class='w-100 mt-2'></div>";
                        $table .= "<div id='desc' class='col text-break mt-2'>Conclusão: {$dados2["conclusao"]}</div>";
                        echo $table;
                    }
                    ?>
                </div>
            </table>
        </div>
    </div>
</body>

</html>