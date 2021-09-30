<?php

require("../config/conexion.php");

class mdl_socio
{
    private $Cuenta;
    private $ApellidosNombres;
    private $CI;
    private $Direccion;
    private $Celular;
    private $FechaRegistro;
    private $Activo;
    public $con;

    function __construct()
    {
        $this->Cuenta = "";
        $this->ApellidosNombres = "";
        $this->CI = "";
        $this->Direccion = "";
        $this->Celular = "";
        $this->FechaRegistro = "";
        $this->Activo = "1";
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
        $sql = "select * from socios where Activo=1";
        $res = $this->con->consulta_valor($sql);
        return ($res);

    }

    public function eliminar()
    {

        $sql = "update socios set Activo=0 where CI='$this->CI'";
        $this->con->consulta_simple($sql);
    }

    public function insertar()
    {
        $sql = "insert into socios(Cuenta,ApellidosNombres, CI, Direccion, Celular, FechaRegistro,Activo) 
		      VALUES(
		        '$this->Cuenta',
		      	'$this->ApellidosNombres', 
		      	'$this->CI',
		      	'$this->Direccion', 
		      	'$this->Celular', 
		      	'$this->FechaRegistro', 
		      	'$this->Activo')";
        $this->con->consulta_simple($sql);
    }

    public function buscar()
    {
        $sql = "select * from socios where CI='$this->CI'";
        $res = $this->con->consulta_valor($sql);
        return ($res);
    }

    public function modificar()
    {
        $sql = "update socios set 
                ApellidosNombres='$this->ApellidosNombres',
                Direccion='$this->Direccion',
                Celular='$this->Celular',
                FechaRegistro='$this->FechaRegistro' 
                where CI='$this->CI'";
        $this->con->consulta_simple($sql);
    }
}

