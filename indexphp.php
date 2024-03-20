<?php
    include_once 'php.php';
    include_once 'usersesion.php';

    $userSesion = new Usersesion();
    $user = new User();

    if(isset ($_SESSION['user'])){
        echo "Hay sesion";
    }else if(isset($_POST['Usuario']) && isset($_POST['password'])){
        echo "Validacion de Login";

        $userForm = $_POST['Usuario'];
        $passForm = $_POST['password'];

        if($user-> userExisit($userForm,$passForm)){
            //echo 'Usuario Validado';
            $userSesion->setCurrentUser($userForm);
            $user->setUsu($userForm);

            include_once 'home.html';

        }else{
            //echo 'Nombre de Usuario y/o incorrecto';
            $errorLogin = "Nombre de Usuario y/o incorrecto";
            include_once 'index.php';
        }
    }else {
        echo "Login";
        include_once 'index.php';
    }
