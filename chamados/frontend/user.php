<?php
$userid = 1;
$nome = "Gustavo";
$setor = "RH";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Teste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="scriptuser.js" type="text/javascript"></script>
    <link rel="icon" type="image/x-icon" href="images/rinaldi.png">
</head>

<body>
    <nav id="navi" class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand mt-2">
                <img src="images/rinaldi.png" height="40">
            </a>
            <a id="nave" class='nav-item px-5 d-flex justify-content-center text-light text-decoration-none'>Meus chamados</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item px-2">
                        <button type="submit" class="btn btn-danger p-1 mt-1 px-2">Logout</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="tabela container container-fluid position-static">
        <nav class="navbar bg-light rounded-top">
            <form class="container-fluid justify-content-start">
                <button class="btn btn-success me-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2">Novo chamado</button>
            </form>
        </nav>
        <table id='chamados' class='table bg-light'>
            <thead>
                <tr class='text-center'>
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
                require "../backend/conn.php";
                $connection = DB::getInstance();
                $stmt = $connection->query("SELECT *, DATE_FORMAT(data, '%d/%m/%Y %h:%i') as data from chamados where userid=1 ORDER BY id DESC");
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $dados11 = $stmt->fetchAll();
                foreach ($dados11 as $dados111) {
                    $table = "";
                    $table .= "<tr class='text-center'>";
                    $table .= "<td>{$dados111['nome']}</td>";
                    $table .= "<td>{$dados111['setor']}</td>";
                    $table .= "<td>{$dados111['problema']}</td>";
                    $table .= "<td>{$dados111['status']}</td>";
                    $table .= "<td class='text-break'>{$dados111['descricao']}</td>";
                    $table .= "<td>{$dados111['data']}</td>";
                    $table .= "<td><form action='detalhesuser.php' method='POST'><button name='id' id='id' value='{$dados111['ID']}' type='submit' class='btn btn-danger'>Mais detalhes</button></form></td>";
                    $table .= "</tr>";
                    echo $table;
                }
                ?>
            </tbody>
        </table>
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModal2Label">Alterar status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                        <input type="hidden" id='iduser' value="<?php echo $userid ?>" />
                        <input type="hidden" id='nomeuser' value="<?php echo $nome ?>" />
                        <input type="hidden" id='setoruser' value="<?php echo $setor ?>" />
                        <label for="problema">Tipo de problema:</label>
                        <select class="form-select" name="problema" id="problema" form="statusform">
                            <option value="">Selecione</option>
                            <option value="Sistema">Sistema</option>
                            <option value="Equipamento">Equipamento</option>
                            <option value="Rede">Rede</option>
                            <option value="Outros">Outros</option>
                        </select>
                        </div>
                        <div class="mb-3 mt-2">
                            <label for="descricao" class="form-label">Resumo/Descrição(Campo obrigatório)</label>
                            <textarea type="text" class="form-control" rows="4" id="descricao" placeholder="Digite aqui"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button id="Salvar2" type="button" class="btn btn-success">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>