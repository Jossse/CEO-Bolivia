<?php

class conexion{
    private $host;
    private $usuario;
    private $clave;
    private $db;
    public $con;

    function __construct()
    {
        $this->host = "localhost";
        $this->usuario = "root";
        $this->clave = "";
        $this->db = "sisrecocoap";
    }

    function connect()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $con = new mysqli($this->host, $this->usuario, $this->clave, $this->db);
        return $con;
    }

    public function consulta_simple($sql){
        $this->connect()->query($sql);
    }

    public function consulta_valor($sql)
    {
        $resp = $this->connect()->query($sql);
        return ($resp);
    }
}
?>