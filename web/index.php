<?php

include 'include/user.php';
include 'include/user_session.php';


$userSession = new UserSession();
$user = new User();

if (isset($_SESSION['user'])) {
    //echo "Hay Sesion";
    $user->setUser($userSession->getCurrentUser());
    $userSession->setCurrentRol($user->getUserRol());
    $user->setUserRolName();


    if ($userSession->getCurrentRol() == 1) {
        //echo dirname(__DIR__);
        include_once 'vistas/admin.php';
    } else {
        //echo dirname(__DIR__);
        include_once 'vistas/home.php';
    }
} elseif (isset($_POST['username']) && isset($_POST['password'])) {
    //echo "Validacion de login";
    $userForm =  $_POST['username'];
    $passForm =  $_POST['password'];

    if ($user->userExists($userForm, $passForm)) {
        //echo "Usuario Validado";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
        $userSession->setCurrentRol($user->getUserRol());
        $user->setUserRolName();

        if ($userSession->getCurrentRol() == 1) {
            //echo dirname(__DIR__);
            include_once 'vistas/admin.php';
        } else {
            //echo dirname(__DIR__);
            include_once 'vistas/home.php';
        }
    } else {
        //echo "Nombre de usuario y/o password incorrecto";
        $errorLogin = "Nombre de usuario y/o password incorrecto";
        //echo dirname(__DIR__);
        include_once "vistas/login.php";
    }
} else {
    //echo "Login";
    //echo dirname(__DIR__);
    include_once 'vistas/login.php';
}
