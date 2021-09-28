<?php
    require_once("ctrl_consumo.php");
    $obj = new ctrl_consumo();

    if (isset($_GET["var"])) {
        $obj = new ctrl_consumo();
        $obj->eliminar();

    }

    if (isset($_POST["registro"])) {
        $obj->agregar_consumo();
    }
?>