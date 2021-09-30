<?php

require_once("../config/conexion.php");

class mdl_cobros
{
    public $con;

    function __construct()
    {
        $this->con = new conexion();

    }

    public function set($atributo, $valor)
    {
        $this->$atributo=$valor;
    }

    public function get($atributo){
        return($this->$atributo);
    }

    public function listarSocios()
    {
        $sql = "SELECT Cuenta, CONCAT(Cuenta, ' - ', ApellidosNombres) AS Cuentas FROM Socios WHERE Activo = 1";
        $res = $this->con->consulta_valor($sql);
        return ($res);
    }

    public function Cobros()
    {
        $sql = "SELECT S.ApellidosNombres, S.CI, S.Direccion, P.IdPeriodo, P.FechaInicio, P.FechaFinal, P.Tarifa
                FROM Socios S
                INNER JOIN Consumos C ON S.Cuenta = C.Cuenta
                INNER JOIN Periodos P ON C.IdPeriodo = P.IdPeriodo
                WHERE P.IdPeriodo = 'sep21' AND C.Cancelado = 0";
        $res = $this->con->consulta_valor($sql);
        return ($res);
    }


}

