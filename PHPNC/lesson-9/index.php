<?php
    session_start();
    require_once("System/Config.php");

    $ctrl='hangsua';

    if(isset($_GET['ctrl'])) $ctrl=$_GET['ctrl'];

    if ($ctrl=="hangsua") {
        require_once "controllers/hangsua.php";
        $controller = new hangsua;
    } else if($ctrl=="loaisua") 
    {
        require_once "controllers/loaisua.php";
        $controller = new loaisua;
    }