<?PHP
$id = $_POST["id"];
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
                <img src="images/rinaldi.png" height="40">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item px-2">
                        <button type="submit" class="btn btn-danger p-1 mt-1 px-2">Logout</button>
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
            <table class="table rounded-bottom">
                <?php
                require "../backend/conn.php";
                $connection = DB::getInstance();
                $consulta = $connection->query("SELECT ID,nome,setor,status,problema,descricao,DATE_FORMAT(data, '%d/%m/%Y %h:%i') as data, atendente, previsao, conclusao from chamados where id=$id");
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                $dados = $consulta->fetchAll();
                foreach ($dados as $dados2) {
                    $table = "";
                    $table .= "<tr>";
                    $table .= "<td>";
                    $table .= " Nome: {$dados2["nome"]}";
                    $table .= "</td>";
                    $table .= "</tr>";
                    $table .= "<tr>";
                    $table .= "<td>";
                    $table .= "Setor: {$dados2["setor"]}";
                    $table .= "</td>";
                    $table .= "</tr>";
                    $table .= "<tr>";
                    $table .= "<td>";
                    $table .= "Tipo de problema: {$dados2["problema"]}";
                    $table .= "</td>";
                    $table .= "</tr>";
                    $table .= "<tr>";
                    $table .= "<td>";
                    $table .= "Status: {$dados2["status"]}";
                    $table .= "</td>";
                    $table .= "</tr>";
                    $table .= "<tr>";
                    $table .= "<td>";
                    $table .= "Data/hora: {$dados2["data"]}";
                    $table .= "</td>";
                    $table .= "</tr>";
                    $table .= "<tr>";
                    $table .= "<td id='desc' class='text-break'>";
                    $table .= "Descrição: {$dados2["descricao"]}";
                    $table .= "</td>";
                    $table .= "</tr>";
                    $table .= "<tr>";
                    $table .= "<td>";
                    $table .= "Previsão de Atendimento: {$dados2["previsao"]}";
                    $table .= "</td>";
                    $table .= "</tr>";
                    $table .= "<tr>";
                    $table .= "<td>";
                    $table .= "Atendente: {$dados2["atendente"]}";
                    $table .= "</td>";
                    $table .= "</tr>";
                    $table .= "<tr>";
                    $table .= "<td>";
                    $table .= "Conclusão: {$dados2["conclusao"]}";
                    $table .= "</td>";
                    $table .= "</tr>";
                    echo $table;
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>