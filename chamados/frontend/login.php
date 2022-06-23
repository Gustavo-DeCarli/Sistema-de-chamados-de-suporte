<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Teste</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="js/script.js" type="text/javascript"></script>

</head>
<body class="fundo">
    <div class="container-fluid vh-100" style="margin-top:150px;">
        <div>
            <div class="rounded d-flex justify-content-center">
                <div class="col-md-4 col-sm-12 rounded shadow-lg p-5 bg-light">
                    <div class="text-center">
                        <h3 class="text-danger">Login</h3>
                    </div>
                    <form action="">
                        <div class="p-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-danger"><i class="bi bi-person-plus-fill text-white"></i></span>
                                <input type="text" class="form-control" placeholder="Usuário">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-danger"><i class="bi bi-key-fill text-white"></i></span>
                                <input type="password" class="form-control" placeholder="Senha">
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-danger  text-center mt-2" type="submit">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>