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
        $sql = "SELECT S.Cuenta, CONCAT(S.Cuenta, ' - ', S.ApellidosNombres) AS Cuentas FROM Socios S INNER JOIN Consumos C ON S.Cuenta = C.Cuenta WHERE S.Activo = 1 AND C.Cancelado = 0  ";
        $res = $this->con->consulta_valor($sql);
        return ($res);
    }
}

