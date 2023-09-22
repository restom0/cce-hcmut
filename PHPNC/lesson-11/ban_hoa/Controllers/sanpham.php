<?php
//nạp model để có các hàm tương tác db
require_once "models/model_sanpham.php";
class sanpham
{
    private $model = null;
    function __construct()
    {
        $this->model = new model_sanpham();
        //chức năng mặc định
        $action = "index";
        //tiếp nhận chức năng user request
        if (isset($_GET["action"])) $action = $_GET["action"];
        switch ($action) {
            case "index":
                $this->ProductList();
                break;
            case "loai":
                $this->ProductType();
                break;
            default:
        }
    }
    function ProductList()
    {
        $list = $this->model->listrecords();
        $listloai = $this->model->listrecords_loai();
        $page_loai = "Views/listloai.php";
        $page_files = "Views/list.php";
        require_once("layout.php");
    }
    function ProductType()
    {
        $id = $_GET["id"];
        $list = $this->model->listtype($id);
        $listloai = $this->model->listrecords_loai();
        $page_loai = "Views/listloai.php";
        $page_files = "Views/listproduct1.php";
        require_once("layout.php");
    }
}
