<?php
    require("../modelo/mdl_periodo.php");
    class ctrl_periodo{
        public $obj;

        function __construct(){
            $this->obj=new mdl_periodo();
        }

        public function listar(){
            $res=$this->obj->listar();
            return($res);
        }

        public function eliminar(){
            $dato=$_GET["var"];
            $this->obj->set("IdPeriodo",$dato);
            $this->obj->eliminar();
            ?>
            <script type="text/javascript">
                window.location.href="../vista/vst_periodos.php";
            </script>
            <?php
        }

        public function agregar_periodo(){
            $this->obj->set("IdPeriodo",$_POST["IdPeriodo"]);
            $this->obj->set("FechaInicio",$_POST["FechaInicio"]);
            $this->obj->set("FechaFinal",$_POST["FechaFinal"]);
            $this->obj->set("Tarifa",$_POST["Tarifa"]);
            $this->obj->insertar();?>
            <script type="text/javascript">
                window.location.href="../vista/vst_periodos.php";
            </script>
            <?php
        }
        public function buscar($codigo){
            $this->obj->set("IdPeriodo", $codigo);
            $resp=$this->obj->buscar();
            return($resp);
        }

        public function modificar(){
            $this->obj->set("IdPeriodo",$_POST["IdPeriodo"]);
            $this->obj->set("FechaInicio",$_POST["FechaInicio"]);
            $this->obj->set("FechaFinal",$_POST["FechaFinal"]);
            $this->obj->set("Tarifa",$_POST["Tarifa"]);
            $this->obj->modificar();
            ?>
            <script type="text/javascript">
                window.location.href="../vista/vst_periodos.php";
            </script>
            <?php
        }

    }//end class
    $obj=new ctrl_periodo();

    if (isset($_GET["var"])){
        $obj=new ctrl_periodo();
        $obj->eliminar();

    }
    if (isset($_POST["btn"])) {
        $obj->agregar_periodo();

    }
    if (isset($_POST["modificar"])) {
        $obj->modificar();

    }
?>