<?php

class UserSession{

    public function __construct(){
        session_start();
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
}
