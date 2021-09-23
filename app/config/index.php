<?php

    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)){
            echo '<div class="alert alert-danger">Usuario o contraseña vacio</div>';
        }else{
            $user = new User();

            if ($user->getUser($username,$password)){
                session_start();
                $_SESSION['usuario'] = $username;
                header("location: ../vista/vst_main.php");
            }else{
                echo '<div class="alert alert-danger">Usuario no existe</div>';
            }
        }
    }


