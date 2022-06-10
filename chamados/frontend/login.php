<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Teste</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="js/script.js" type="text/javascript"></script>

</head>

<body>

    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 login-sec">
                    <h2 class="text-center">Login</h2>
                    <form id="loginform" class="login-form">
                        <div class="form-group">
                            <label for="exampleInputEmail1" >Email</label>
                            <input type="email" class="form-control" placeholder="Insira seu email">

                        </div>
                        <div class="form-group mt-2">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" class="form-control" placeholder="Insira sua senha">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-md btn-login float-right mt-4">Entrar</button>
                        </div>

                    </form>
                </div>
                <div class="col-md-8 banner-sec">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                    </div>
                </div>
            </div>
    </section>
</body>

</html>