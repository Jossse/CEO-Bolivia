<?php

include 'conexion.php';

class User extends conexion
{
    private $nombre;
    private $username;

    public function getUser($username, $password)
    {
        $sql = "SELECT * FROM empleados WHERE Apellidos_Nombres = '$username' AND Password = '$password'";

        $result = $this->connect()->query($sql);

        $numRows = $result->num_rows;

        if ($numRows == 1){
            return true;
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
