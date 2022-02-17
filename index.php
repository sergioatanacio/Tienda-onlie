<?php
session_start();
require_once 'config/parameters.php';
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';



function show_error(){
    //Error 404
    $error = new errorController();
    $error->index();
    return $error;
    #header("Location:".base_url."");
}

$nombre_controlador = (isset($_GET['controller']))
    ? $_GET['controller'].'Controller'
    : (
        (!isset($_GET['controller']) && !isset($_GET['action']))
        ? controller_default
        : show_error()
    );

/* 
if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'].'Controller';
}elseif(!isset($_GET['controller']) && !isset($_GET['action']) ){
    $nombre_controlador = controller_default;
}else{
    show_error();
    exit();
} */

$controlador = class_exists($nombre_controlador)
    ? new $nombre_controlador()
    : show_error();

$action = (isset($_GET['action']) && method_exists($controlador, $_GET['action']))
    ? $_GET['action']
    : action_default;

$controlador->$action();
    
/* 
    
if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();
    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
    }elseif(!isset($_GET['controller']) && !isset($_GET['action']) ){    
        $action_default = action_default;
        $controlador->$action_default();
    }else{
        show_error();
    }
}else{
    show_error();
} */



require_once 'views/layout/footer.php';

