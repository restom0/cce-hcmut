<?php
    session_start();
    require_once("system/config.php");

    $ctrl='sanpham';

    if(isset($_GET['ctrl'])) $ctrl=$_GET['ctrl'];

    if ($ctrl=="hangsua") {
        require_once "controllers/hangsua.php";
        $controller = new hangsua;
    }
    else if ($ctrl=="sanpham")
    {
    require_once "controllers/sanpham.php";
    $controller = new sanpham;
    }


