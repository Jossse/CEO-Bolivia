<?php
    require("../modelo/mdl_consumo.php");
    class ctrl_consumo{
        public $obj;

        function __construct(){
            $this->obj=new mdl_consumo();
        }

        public function listar(){
            $res=$this->obj->listar();
            return($res);
        }

        public function eliminar(){
            $dato=$_GET["var"];
            $this->obj->set("IdConsumo",$dato);
            $this->obj->eliminar();
            ?>
            <script type="text/javascript">
                window.location.href="../vista/vst_consumos.php";
            </script>
            <?php
        }

        public function agregar_consumo(){
            $this->obj->set("IdConsumo",$_POST["IdConsumo"]);
            $this->obj->set("Cuenta",$_POST["Cuenta"]);
            $this->obj->set("IdPeriodo",$_POST["IdPeriodo"]);
            $this->obj->set("Cancelado",$_POST["Cancelado"]);
            $this->obj->set("FechaPago",$_POST["FechaPago"]);
            $this->obj->set("CIEmpleado",$_POST["CIEmpleado"]);
            $this->obj->insertar();?>
            <script type="text/javascript">
                window.location.href="../vista/vst_consumos.php";
            </script>
            <?php
        }
        public function buscar($codigo){
            $this->obj->set("IdConsumo", $codigo);
            $resp=$this->obj->buscar();
            return($resp);
        }

        public function modificar(){
            $this->obj->set("IdConsumo",$_POST["IdConsumo"]);
            $this->obj->set("Cuenta",$_POST["Cuenta"]);
            $this->obj->set("IdPeriodo",$_POST["IdPeriodo"]);
            $this->obj->set("Cancelado",$_POST["Cancelado"]);
            $this->obj->set("FechaPago",$_POST["FechaPago"]);
            $this->obj->set("CIEmpleado",$_POST["CIEmpleado"]);
            $this->obj->modificar();
            ?>
            <script type="text/javascript">
                window.location.href="../vista/vst_consumos.php";

            </script>
            <?php
        }

    }//end class
    $obj=new ctrl_consumo();

    if (isset($_GET["var"])){
        $obj=new ctrl_consumo();
        $obj->eliminar();
    }

    if (isset($_POST["btn"])) {
        $obj->agregar_consumo();
    }

    if (isset($_POST["modificar"])) {
        $obj->modificar();

    }
?>