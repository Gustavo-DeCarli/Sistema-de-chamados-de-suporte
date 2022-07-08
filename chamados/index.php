<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Chamados Rinaldi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="frontend/style.css" rel="stylesheet" type="text/css" />
    <script src="frontend/script.js" type="text/javascript"></script>
    <link rel="icon" type="image/x-icon" href="images/nav.png">
</head>

<body class="fundo">
    <div class="container-fluid vh-100" style="margin-top:100px;">
        <div>
            <div class="rounded d-flex justify-content-center">
                <div class="col-md-4 col-sm-12 rounded shadow-lg p-5 bg-light">
                    <?php
                    if (isset($_GET['erro'])) {
                        echo "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Login incorreto!</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";;
                    }
                    if (isset($_GET['log'])) {
                        echo "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Você precisa fazer o login!</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
                    }

                    ?>
                    <div class="nav flex d-flex justify-content-center">
                        <img src="frontend/images/rinaldi.png">
                    </div>
                    <div class="text-center mt-4">
                        <h3 class="text-danger">Sistema de Chamados</h3>
                    </div>
                    <form action="backend/verif.php" method="POST">
                        <div class="p-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-danger"><i class="bi bi-person-plus-fill text-white"></i></span>
                                <input type="text" name='nome' id='nome' class="form-control" placeholder="Usuário">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-danger"><i class="bi bi-key-fill text-white"></i></span>
                                <input type="password" name='senha' id='senha' class="form-control" placeholder="Senha">
                            </div>
                            <div class="d-grid">
                                <input id="login" class="btn btn-danger  text-center mt-2" Value='Login' type="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>