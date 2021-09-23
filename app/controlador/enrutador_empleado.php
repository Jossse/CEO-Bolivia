<?php

require("ctrl_empleado.php");
$obj = new ctrl_empleado();
if (isset($_GET["var"])) {
    $obj = new ctrl_empleado();
    $obj->eliminar();

}
if (isset($_POST["btn"])) {
    $obj->agregar_empleado();
}
