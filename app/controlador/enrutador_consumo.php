<?php
    require("ctrl_consumos.php");
    $obj = new ctrl_socios();

    if (isset($_GET["var"])) {
        $obj = new ctrl_consumo();
        $obj->eliminar();

    }

    if (isset($_POST["registro"])) {
        $obj->agregar_consumo();
    }
?>