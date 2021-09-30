<?php
include 'conexion.php';
class User extends conexion
{
    private $nombre;
    private $username;
    public function getUser($username, $password)
    {
        $sql = "SELECT * FROM empleados WHERE Apellidos_Nombres = '$username' AND Clave = '$password'";
        $result = $this->connect()->query($sql);
        $numRows = $result->fetch(PDO::FETCH_ASSOC);
        if ($result){
            return $numRows;
        }else{
            return false;
        }
    }

    public function setUser($user)
    {
        $query = $this->connect()->prepare('SELECT * FROM empleados WHERE Apellidos_Nombres = :user');
        $query->execute(['user' => $user]);

        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['Apellidos_Nombres'];
            $this->username = $currentUser['Apellidos_Nombres'];
        }
    }

    public function getNombre()
    {
        return $this->nombre;
    }
}
