<?php

require("../modelo/mdl_reportesocio.php");
class ctrl_socios{
    public $obj;

    function __construct(){
        $this->obj=new mdl_socio();
    }

    public function listar(){
        $res=$this->obj->listar();
        return($res);
    }

    public function eliminar(){
        $dato=$_GET["var"];
        $this->obj->set("CI",$dato);
        $this->obj->eliminar();
        ?>
        <script type="text/javascript">
            window.location.href="../vista/vst_socios.php";
        </script>
        <?php
    }

    public function agregar_socio(){
        $this->obj->set("Cuenta",$_POST["Cuenta"]);
        $this->obj->set("ApellidosNombres",$_POST["ApellidosNombres"]);
        $this->obj->set("CI",$_POST["CI"]);
        $this->obj->set("Direccion",$_POST["Direccion"]);
        $this->obj->set("Celular",$_POST["Celular"]);
        $this->obj->set("FechaRegistro",$_POST["FechaRegistro"]);
        $this->obj->insertar();?>
        <script type="text/javascript">
            window.location.href="../vista/vst_socios.php";

        </script>
        <?php
    }
    public function buscar($codigo){
        $this->obj->set("CI", $codigo);
        $resp=$this->obj->buscar();
        return($resp);
    }

    public function modificar(){
        $this->obj->set("ApellidosNombres",$_POST["ApellidosNombres"]);
        $this->obj->set("CI",$_POST["CI"]);
        $this->obj->set("Direccion",$_POST["Direccion"]);
        $this->obj->set("Celular",$_POST["Celular"]);
        $this->obj->set("FechaRegistro",$_POST["FechaRegistro"]);
        $this->obj->modificar();
        ?>
        <script type="text/javascript">
            window.location.href="../vista/vst_socios.php";

        </script>
        <?php
    }

}//end class
$obj=new ctrl_socios();

if (isset($_GET["var"])){
    $obj=new ctrl_socios();
    $obj->eliminar();
}

if (isset($_POST["modificar"])) {
    $obj->modificar();
}


?>