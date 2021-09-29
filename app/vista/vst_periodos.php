<!DOCTYPE html>
    <?php
        session_start();
        if (isset($_SESSION['login']['usuario'])){

    ?>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>PERIODOS - SISRECOCOAP</title>
        <meta name="description" content="SISRECOCOAP">
        <link rel="stylesheet" href="../../public/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../public/js/plugins/datatables/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="../../public/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="../../public/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="../../public/fonts/fontawesome5-overrides.min.css">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />

    </head>

  <body id="page-top">
    <?php
        require_once("../controlador/ctrl_periodo.php");
        $obj_ctrl=new ctrl_periodo();
        $resp=$obj_ctrl->listar();

    ?>
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-lock"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>SISRECOCOAP</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="vst_main.php"><i class="fa fa-home"></i><span>INICIO</span></a><a class="nav-link" href="vst_cobros.php"><i class="fa fa-money"></i><span>COBROS</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="vst_consumos.php"><i class="fas fa-tachometer-alt"></i><span>CONSUMOS</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="vst_periodos.php"><i class="fa fa-pencil-square"></i><span>PERIODOS</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="vst_socios.php"><i class="fa fa-user"></i><span>SOCIOS</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="vst_empleados.php"><i class="fa fa-users"></i><span>EMPLEADOS</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo 'Bienvenid@: '.$_SESSION['login']['usuario']; ?></span><img class="border rounded-circle img-profile" src="../../public/img/avatar5.jpeg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href=""><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Cuenta</a><a class="dropdown-item" href=""><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Configuración</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="../config/logout.php"><strong>Salida</strong></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!--Contenido -->
                <main id="main-container">
                    <div class="content">
                        <div class="block">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">PERIODOS</h3>
                                <button type="button" class="btn btn-alt-primary" id="btnnuevoperiodo">
                                    Nuevo <i class="fa fa-newspaper-o ml-5"></i>
                                </button>
                            </div>
                            <div class="block-content block-content-full">
                                <table id="periodo_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                    <thead>
                                    <tr>
                                        <th style="width: 10%;">IdPeriodo</th>
                                        <th style="width: 18%;">FechaInicio</th>
                                        <th style="width: 18%;">FechaFinal</th>
                                        <th style="width: 10%;">Tarifa</th>
                                        <th class="text-center" style="width: 10%;"></th>
                                        <th class="text-center" style="width: 10%;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $rows = $resp->fetchAll();
                                            foreach ($rows as $row ) {
                                            
                                                $IdPeriodo = $row["IdPeriodo"];
                                                $FechaInicio = $row["FechaInicio"];
                                                $FechaFinal = $row["FechaFinal"];
                                                $Tarifa = $row["Tarifa"];
    
                                                echo "<tr>";
                                                echo "<td>".$IdPeriodo."</td>";
                                                echo "<td>".$FechaInicio."</td>";
                                                echo "<td>".$FechaFinal."</td>";
                                                echo "<td>".$Tarifa."</td>";

                                                echo "<td><a class='btn btn-default' aria-label='Left Align' href='../controlador/ctrl_periodo.php?var=".$IdPeriodo."'>
                                                <span class=\"fa fa-trash\" aria-hidden='true'></span>
                                                </a></td>";
                                                echo "<td><button type='button'  class='btn btn-default'  id='btnModificarPeriodo'  aria-label='Left Align'>
                                                <span class='fa fa-pencil' aria-hidden='true'></span>
                                                </button></td>";

                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </main>
                <!-- Contenido -->

                <div id="modal_periodo" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="post" id="periodo_form" action="../controlador/enrutador_periodo.php">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="titulo_periodo"></h5>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group row">
                                        <label class="col-12" for="IdPeriodo">IdPeriodo</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="IdPeriodo" name="IdPeriodo" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12" for="FechaInicio">FechaInicio</label>
                                        <div class="col-md-12">
                                            <input type="date" class="form-control" id="FechaInicio" name="FechaInicio" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12" for="FechaFinal">FechaFinal</label>
                                        <div class="col-md-12">
                                            <input type="date" class="form-control" id="FechaFinal" name="FechaFinal" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12" for="Tarifa">Tarifa</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="Tarifa" name="Tarifa" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="registro" id="btnPeriodo" class="btn btn-primary">Enviar</button>
                                    <button type="button" class="btn btn-secondary" id="cerrarModalPeriodo" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © SISRECOCOAP 2021</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script type="text/javascript" src="../../public/js/jquery.js"></script>
    <script src="../../public/js/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="../../public/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../public/js/theme.js"></script>
    <script type="text/javascript" src="../../public/js/moment.js"></script>
    <script src="../../public/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../public/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="../../public/js/main.js"></script>
</body>

</html>
<?php
    }else{
        header("location: vst_index.php");
    }
?>