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
    /*protected $dbh;
    protected function connect(){
        try {
            $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=sisrecocoap","root","");

            return $conectar;
        } catch (Exception $e) {
            print "¡Error BD!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function set_names(){
        return $this->dbh->query("SET NAMES 'utf8'");
    }*/
}
?>