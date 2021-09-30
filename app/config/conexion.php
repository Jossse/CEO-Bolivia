<?php

class conexion{
    private $host;
    private $usuario;
    private $clave;
    private $db;
    public $con;

    function __construct()
    {
        //$this->host = "NP270\SQLExpress";

        $this->host = "localhost";
        $this->usuario = "root";
        $this->clave = "";
        $this->db = "sisrecocoap";
    }

    function connect()
    {
        try
        {
        // $con = new mysqli($this->host, $this->usuario, $this->clave, $this->db);
        // $con = new PDO('mysql:host=localhost;dbname=sisrecocoap',$this->usuario,$this->clave);
        // $con = new PDO('mysql:host=localhost;dbname=sisrecocoap','root','');
        
        
        $serverName = "NP270\SQLExpress";
        $userName = "";
        $userPassword = "";
        $dbName = "sisrecocoap";
        $con = new PDO("sqlsrv:server=$serverName ; Database = $dbName", $userName, $userPassword);
                
        }
        catch ( PDOException $e )
        {
            echo "Drivers no disnibles: " . implode( ",", PDO::getAvailableDrivers() );
            echo "\nErro: " . $e->getMessage();
            exit;
        }
        if( $con ) {
            // echo "Conexion establecidad con exito!!.";
        }
        else{
            // echo "ERROR NO SE PUDO CONECTAR!!!";
        }
        return $con;
    }

    public function consulta_simple($sql){
        $this->connect()->query($sql);
    }

    public function consulta_valor($sql)
    {
        $resp = $this->connect()->query($sql,PDO::FETCH_ASSOC);
        return ($resp);
    }
}
?>