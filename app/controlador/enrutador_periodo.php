<?php
    require("ctrl_periodo.php");
    $obj = new ctrl_periodo();

    if (isset($_GET["var"])) {
        $obj = new ctrl_periodo();
        $obj->eliminar();
    }

    if (isset($_POST["registro"])) {
        $obj->agregar_periodo();
    }
?>