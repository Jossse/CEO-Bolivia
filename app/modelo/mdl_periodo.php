<?php
    require_once("../config/conexion.php");
    class mdl_periodo
    {
        private $IdPeriodo;
        private $FechaInicio;
        private $FechaFinal;
        private $Tarifa;
        public $con;

        function __construct()
        {
            $this->IdPeriodo = "";
            $this->FechaInicio = "";
            $this->FechaFinal = "";
            $this->Tarifa = "";
            $this->con = new conexion();
        }

        public function set($atributo, $valor)
        {
            $this->$atributo = $valor;
        }

        public function get($atributo)
        {
            return ($this->$atributo);
        }

        public function listar()
        {
            $sql = "select * from periodos";
            $res = $this->con->consulta_valor($sql);
            return ($res);
        }


        public function eliminar()
        {
            $sql = "delete periodos where IdPeriodo='$this->IdPeriodo'";
            $this->con->consulta_simple($sql);
        }

        public function insertar()
        {
            $sql = "insert into periodos
                    VALUES(
                        '$this->IdPeriodo',
                        '$this->FechaInicio',
                        '$this->FechaFinal',
                        '$this->Tarifa')";
            $this->con->consulta_simple($sql);
        }

        public function buscar()
        {
            $sql = "select * from periodos where IdPeriodo='$this->IdPeriodo'";
            $res = $this->con->consulta_valor($sql);
            return ($res);
        }

        public function modificar()
        {
            $sql = "update periodos set 
                    IdPeriodo='$this->IdPeriodo',
                    FechaInicio='$this->FechaInicio',
                    FechaFinal='$this->FechaFinal',
                    Tarifa='$this->Tarifa'
                    where IdPeriodo='$this->IdPeriodo'";
            $this->con->consulta_simple($sql);
        }
}
