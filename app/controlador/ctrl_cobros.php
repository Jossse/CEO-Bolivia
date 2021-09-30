<?php
require_once("../modelo/mdl_cobros.php");

class ctrl_cobros
{
    public $obj;

    function __construct()
    {
        $this->obj = new mdl_cobros();
    }

    public function listarSocios()
    {
        $res = $this->obj->listarSocios();
        return ($res);
    }
}
?>