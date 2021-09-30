<?php

    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)){
            echo '<div class="alert alert-danger">Usuario o contraseña vacio</div>';
        }else{
            $user = new User();
            $datos = $user->getUser($username,$password);
            if ($datos){
                session_start();
                $_SESSION['login']['usuario'] = $username;
                $_SESSION['login']['ci'] = $datos['CI'];
                $_SESSION['login']['cargo'] = $datos['Cargo'];
                header("location: ../vista/vst_main.php");
            }else{
                echo '<div class="alert alert-danger">Usuario no existe</div>';
            }
        }
    }


