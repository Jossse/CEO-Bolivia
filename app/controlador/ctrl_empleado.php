<?php
    require_once("../modelo/mdl_empleado.php");
    class ctrl_empleado{
        public $obj;

        function __construct(){
            $this->obj=new mdl_empleado();
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
                window.location.href="../vista/vst_empleados.php";
            </script>
            <?php
        }

        public function agregar_empleado(){
            $this->obj->set("CI",$_POST["CI"]);
            $this->obj->set("Apellidos_Nombres",$_POST["Apellidos_Nombres"]);
            $this->obj->set("Direccion",$_POST["Direccion"]);
            $this->obj->set("Celular",$_POST["Celular"]);
            $this->obj->set("Cargo",$_POST["Cargo"]);
            $this->obj->set("Clave",$_POST["Clave"]);
            $this->obj->set("FechaRegistro",$_POST["FechaRegistro"]);
            $this->obj->insertar();?>
            <script type="text/javascript">
                window.location.href="../vista/vst_empleados.php";

            </script>
            <?php
        }
        public function buscar($codigo){
            $this->obj->set("CI", $codigo);
            $resp=$this->obj->buscar();
            return($resp);
        }

        public function modificar(){
            $this->obj->set("CI",$_POST["CI"]);
            $this->obj->set("Apellidos_Nombres",$_POST["Apellidos_Nombres"]);
            $this->obj->set("Direccion",$_POST["Direccion"]);
            $this->obj->set("Celular",$_POST["Celular"]);
            $this->obj->set("Cargo",$_POST["Cargo"]);
            $this->obj->set("FechaRegistro",$_POST["FechaRegistro"]);
            $this->obj->modificar();
            ?>
            <script type="text/javascript">
                window.location.href="../vista/vst_empleados.php";

            </script>
            <?php
        }

    }//end class
    $obj=new ctrl_empleado();

    if (isset($_GET["var"])){
        $obj=new ctrl_empleado();
        $obj->eliminar();
    }

    if (isset($_POST["btn"])) {
        $obj->agregar_empleado();
    }

    if (isset($_POST["modificar"])) {
        $obj->modificar();

    }
?>