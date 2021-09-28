<?php

require_once("../config/conexion.php");

class mdl_empleado
{
    private $CI;
    private $Apellidos_Nombres;
    private $Direccion;
    private $Celular;
    private $Cargo;
    private $Clave;
    private $FechaRegistro;
    private $Activo;
    public $con;

    function __construct()
    {
        $this->CI = "";
        $this->Apellidos_Nombres = "";
        $this->Direccion = "";
        $this->Celular = "";
        $this->Cargo = "";
        $this->Clave = "";
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
        $sql = "select * from empleados where Activo=1";
        $res = $this->con->consulta_valor($sql);
        return ($res);

    }

    public function eliminar()
    {

        $sql = "update empleados set Activo=0 where CI='$this->CI'";
        $this->con->consulta_simple($sql);
    }

    public function insertar()
    {
        $sql = "insert into empleados(CI, Apellidos_Nombres, Direccion, Celular , Cargo, Clave, FechaRegistro,Activo) 
		      VALUES(
		      	'$this->CI',
		      	'$this->Apellidos_Nombres', 
		      	'$this->Direccion', 
		      	'$this->Celular', 
		      	'$this->Cargo', 
		      	'$this->Clave', 
		      	'$this->FechaRegistro', 
		      	'$this->Activo')";
        $this->con->consulta_simple($sql);
    }

    public function buscar()
    {
        $sql = "select * from empleados where CI='$this->CI'";
        $res = $this->con->consulta_valor($sql);
        return ($res);
    }

    public function modificar()
    {
        $sql = "update empleados set 
                Apellidos_Nombres='$this->Apellidos_Nombres',
                Direccion='$this->Direccion',
                Celular='$this->Celular',
                Cargo='$this->Cargo',
                FechaRegistro='$this->FechaRegistro' 
                where CI='$this->CI'";
        $this->con->consulta_simple($sql);
    }
}
