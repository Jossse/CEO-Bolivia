<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['login']['usuario'])){
    header("location: vst_main.php");
}
include '../config/user.php';
include '../config/index.php';
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>INICIO DE SESION - SISRECOCOAP</title>
    <link rel="shortcut icon" href="../../public/img/blue-water.png">
    <meta name="description" content="SISRECOCOAP">
    <link rel="stylesheet" href="../../public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../../public/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../../public/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../../public/fonts/fontawesome5-overrides.min.css">
    <script type="text/javascript" src="../../public/js/jquery.js"></script>
</head>

<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10 align-self-center">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">INICIO DE SESION</h4>
                                </div>
                                <form action="" method="POST" class="user">
                                    <div class="mb-3"><input class="form-control form-control-user" type="text" id="user"  placeholder="Usuario" name="username"></div>
                                    <div class="mb-3"><input class="form-control form-control-user" type="password" id="pass" placeholder="Contraseña" name="password"></div>
                                    <button class="btn btn-primary d-block btn-user w-100" type="submit" name="submit">ENTRAR</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../public/bootstrap/js/bootstrap.min.js"></script>
<script src="../../public/js/theme.js"></script>
</body>

</html>