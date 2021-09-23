<?php

require("ctrl_socios.php");
$obj = new ctrl_socios();

if (isset($_GET["var"])) {
    $obj = new ctrl_socios();
    $obj->eliminar();

}
if (isset($_POST["registro"])) {
    $obj->agregar_socio();
}