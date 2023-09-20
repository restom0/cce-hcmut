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
        $action = "sanpham";
        //tiếp nhận chức năng user request
        if (isset($_GET["action"])) $action = $_GET["action"];
        switch ($action) {
            case "sanpham":
                $this->listproduct();
                break;
            case "chitiet":
                $this->detail();
                break;
            default:
        }
    }

    function listproduct()
    {
        $list = $this->model->listrecords();
        $page_title = "";
        $page_files = "Views/sanpham/list.php";
        require_once("layout.php");
    }

    function detail()
    {
        $ma = $_GET["ma"];
        $row = $this->model->detailrecord($ma);
        $page_title = "";
        $page_files = "views/sanpham/detail.php";
        require_once("layout.php");
    }

}