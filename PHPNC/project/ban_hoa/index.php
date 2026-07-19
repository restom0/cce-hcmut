<?php
session_start();
require_once("System/Config.php");
$ctrl = 'index';
if (isset($_GET['ctrl'])) $ctrl = $_GET['ctrl'];
if ($ctrl == "index") {
    require_once "Controllers/sanpham.php";
    $controller = new sanpham;
} else if ($ctrl == "loaihoa") {
    require_once "Controllers/loaihoa.php";
    $controller = new loaihoa;
} else if ($ctrl == "khachhang") {
    require_once "Controllers/khachhang.php";
    $controller = new khachhang;
} else if ($ctrl == "donhang") {
    require_once "Controllers/donhang.php";
    $controller = new donhang;
}
