<?php

require_once("../config/conexion.php");

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
        $sql = "select * from consumos WHERE (Consumos.IdPeriodo = left(lower(DATENAME(month, GetDate())),3)+format(GetDate(),'yy'))";
        $res = $this->con->consulta_valor($sql);
        return ($res);
    }

    public function listarpagados()
    {
        $sql = "select * from consumos WHERE (Consumos.Cancelado=1 and Consumos.IdPeriodo = left(lower(DATENAME(month, GetDate())),3)+format(GetDate(),'yy'))";
        $res = $this->con->consulta_valor($sql);
        return ($res);
    }

    public function listardeudores()
    {
        $sql = "SELECT Consumos.Cuenta, Socios.ApellidosNombres, COUNT(Periodos.IdPeriodo) AS Numero_de_meses, SUM(Periodos.Tarifa) AS Total_Acumulado
        FROM Consumos INNER JOIN
             Periodos ON Consumos.IdPeriodo = Periodos.IdPeriodo INNER JOIN
             Socios ON Consumos.Cuenta = Socios.Cuenta
        WHERE (Consumos.Cancelado = 0) and  (Consumos.IdPeriodo <> left(lower(DATENAME(month, GetDate())),3)+format(GetDate(),'yy'))
        GROUP BY Consumos.Cuenta, Socios.ApellidosNombres
        ORDER BY Numero_de_meses desc";
        $res = $this->con->consulta_valor($sql);
        return ($res);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM Consumos WHERE IdConsumo='$this->IdConsumo'";
        $this->con->consulta_simple($sql);
    }

    public function insertar()
    {
        $sql = "insert into consumos
                VALUES(
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
                Cuenta='$this->Cuenta',
                IdPeriodo='$this->IdPeriodo',
                Cancelado='$this->Cancelado',
                FechaPago='$this->FechaPago',
                CIEmpleado='$this->CIEmpleado'
                where IdConsumo='$this->IdConsumo'";
        $this->con->consulta_simple($sql);
    }
}
