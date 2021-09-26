<?php

require("../config/conexion.php");

class mdl_consumo
{
    private $IdConsumo;
    private $Cuenta;
    private $IdPeriodo;
    private $Cancelado;
    private $FechaPago;
    private $CIEmpleado;
    public $con;

    function __construct()
    {
        $this->IdConsumo = "";
        $this->Cuenta = "";
        $this->IdPeriodo = "";
        $this->Cancelado = "";
        $this->FechaPago = "";
        $this->CIEmpleado = "";
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
        $sql = "select * from consumos where IdConsumo=1";
        $res = $this->con->consulta_valor($sql);
        return ($res);

    }

    public function eliminar()
    {

        $sql = "update consumos set Cancelado=1 where IdConsumo='$this->IdConsumo'";
        $this->con->consulta_simple($sql);
    }

    public function insertar()
    {
        $sql = "insert into consumos
                VALUES(
                    '$this->IdConsumo',
                    '$this->Cuenta',
                    '$this->IdPeriodo',
                    '$this->Cancelado',
                    '$this->FechaPago',
                    '$this->CIEmpleado')";
        $this->con->consulta_simple($sql);
    }

    public function buscar()
    {
        $sql = "select * from consumos where IdConsumo='$this->IdConsumo'";
        $res = $this->con->consulta_valor($sql);
        return ($res);
    }

    public function modificar()
    {
        $sql = "update consumos set 
                IdConsumo='$this->IdConsumo'
                Cuenta='$this->Cuenta'
                IdPeriodo='$this->IdPeriodo'
                Cancelado='$this->Cancelado'
                FechaPago='$this->FechaPago'
                CIEmpleado='$this->CIEmpleado'
                where CI='$this->IdConsumo'";
        $this->con->consulta_simple($sql);
    }
}
