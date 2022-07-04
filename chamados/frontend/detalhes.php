<?php
if ($_POST['id'] != '') {
    $id = $_POST["id"];
} else {
    header('Location: admin.php');
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
                        <button type="submit" class="btn btn-danger p-1 mt-1 px-2">Logout</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="tabela" class="mx-auto">
        <nav class="navbar bg-light rounded-top">
            <form class="container-fluid justify-content-start">
                <a class="text-light btn btn-success me-2" href="admin.php" style='text-decoration: none'>Voltar</a>
                <button class="btn btn-success me-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal1">Alterar status</button>
                <button class="btn btn-success me-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal3">Finalizar chamado</button>
            </form>
        </nav>
        <div id="lista">
            <table class="container rounded-bottom">
                <div class="row">
                <?php
                require "../backend/conn.php";
                $connection = DB::getInstance();
                $consulta = $connection->query("SELECT ID,nome,setor,status,problema,descricao,DATE_FORMAT(data, '%d/%m/%Y %h:%i') as data, DATE_FORMAT(previsao, '%d/%m/%Y') as previsao, atendente, conclusao from chamados where id=$id");
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
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alterar status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="idf" value="<?php echo $dados2['ID'] ?>" />
                    <label for="status">Status:</label>
                    <select class="form-select mt-1" name="status" id="status" form="statusform">
                        <option value="Em Andamento">Em andamento</option>
                        <option value="Em Aberto">Em Aberto</option>
                    </select>
                    <label for="atendente">Atendente:</label>
                    <select class="form-select mt-1" name="atendente" id="atendente" form="statusform">
                        <option value="Juliano">Juliano</option>
                        <option value="Anderson">Anderson</option>
                        <option value="Anelise">Anelise</option>
                        <option value="Gustavo">Gustavo</option>
                    </select>
                    <label for="previsao">Previsão de Atendimento:</label>
                    <input class="form-control mt-1" type="date" id="previsao" />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button id="Salvar" type="button" class="btn btn-success">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Finalizar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="idf2" value="<?php echo $dados2['ID'] ?>" />
                    <label for="conclusao">Conclusão do atendimento:</label>
                    <textarea class="form-control mt-1" rows='4' type="text" id="conclusao" placeholder="Detalhes sobre o que foi feito"></textarea>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button id="ff" type="button" class="btn btn-success">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>