<?php
session_start();
require_once("system/Config.php");
$ctrl = 'index';
if (isset($_GET['ctrl'])) $ctrl = $_GET['ctrl'];
if ($ctrl == "index") {
    require_once "controllers/sanpham.php";
    $controller = new sanpham;
} else if ($ctrl == "loaihoa") {
    require_once "controllers/loaihoa.php";
    $controller = new loaihoa;
} else if ($ctrl == "khachhang") {
    require_once "controllers/khachhang.php";
    $controller = new khachhang;
} else if ($ctrl == "donhang") {
    require_once "controllers/donhang.php";
    $controller = new donhang;
}
