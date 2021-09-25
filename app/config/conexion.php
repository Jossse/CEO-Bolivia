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
        //$serverName = "NP270\SQLExpress";//server-ip 
        //$connectionInfo = array( $this->db,$this->usuario,$this->clave);
        //$con =  new PDO( $this->host, $connectionInfo);
        try
        {
        //$con = new PDO("sqlsrv:server=$this->host ; Database = $this->db", "", "");   
        
        
        // $serverName = "NP270\SQLExpress";//server-ip 
        // $connectionInfo = array( "Database"=>"sisrecocoap");
        // $con = sqlsrv_connect( $serverName, $connectionInfo);


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
        echo "Drivers disponiveis: " . implode( ",", PDO::getAvailableDrivers() );
        echo "\nErro: " . $e->getMessage();
        exit;
    }
    if( $con ) {
        echo "Connection established.";
        //$resultado = $query->fetchAll();
        // $getResults= sqlsrv_query($con, "select * from empleados");
        
        // //echo $resultado['0']['0'];
        // while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
        //     echo ($row['Apellidos_Nombres'] . PHP_EOL);
        //     }


        //PRUEBA DE CONSULTA FUNCIONA OK
        // $sql="select CI, Cargo from empleados";
        // $stm = $con->query('SELECT * FROM empleados');
        // $rows = $stm->fetchAll();
        // foreach ($rows as $row ) {
        //     echo $row['CI']." - ".$row['Cargo']."<br>";
        // }

    }
    else{
         echo "ERROR NO SE PUDO CONECTAR!!!";
        //  die( print_r( sqlsrv_errors(), true));
    }
        return $con;
    }

    public function consulta_simple($sql){
        // $this->connect()->query($sql);
        $this->connect()->query($sql);
    }

    public function consulta_valor($sql)
    {
        $resp = $this->connect()->query($sql,PDO::FETCH_ASSOC);
        return ($resp);
    }
}
?>