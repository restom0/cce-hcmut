<?php
    session_start();
    require_once("System/Config.php");

    $ctrl='sanpham';

    if(isset($_GET['ctrl'])) $ctrl=$_GET['ctrl'];

    if ($ctrl=="hangsua") {
        require_once "Controllers/hangsua.php";
        $controller = new hangsua;
    }
    else if ($ctrl=="sanpham")
    {
    require_once "Controllers/sanpham.php";
    $controller = new sanpham;
    }


