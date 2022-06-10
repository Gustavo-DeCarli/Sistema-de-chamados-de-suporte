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
                        <a class="nav-link text-light" href="#">Estatísticas</a>
                    </li>
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
                <button class="btn btn-success me-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal1">Alterar status</button>
                <button class="btn btn-success me-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2">Finalizar chamado</button>
            </form>
        </nav>
        <div id="lista">
            <table class="table rounded-bottom">
                <?php
                require "conn.php";
                $id = $_POST["id"];
                $connection = DB::getInstance();
                $consulta = $connection->query("SELECT ID,nome,setor,status,problema,descricao,DATE_FORMAT(data, '%d/%m/%Y %h:%i') as data from chamados where id=2");
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                $dados = $consulta->fetchAll();
                foreach ($dados as $dados2) {
                    $table = "";
                    $table .= "<tr>";
                    $table .= "<td>ID: {$dados2["ID"]}</td>";
                    $table .= "</tr>";
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
                    $table .= "<td id='desc'>";
                    $table .= "Descrição: {$dados2["descricao"]}";
                    $table .= "</td>";
                    $table .= "</tr>";
                    echo $table;
                }
                ?>
            </table>
        </div>
    </div>






    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novo Ingrediente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" />
                    <label for="cars">Status:</label>
                    <select class="form-select" name="status" id="status" form="statusform">
                        <option value="Em Andamento">Em andamento</option>
                        <option value="Aberto">Aberto</option>
                    </select>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button id="salvar1" type="button" class="btn btn-success">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>