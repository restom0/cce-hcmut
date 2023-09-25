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
            case "timkiem":
                $this->SearchProduct();
                break;
            case "chitiet":
                $this->ProductDetail();
                break;
            default:
        }
    }
    function ProductList()
    {
        $list =  $this->model->listrecords();
        $list_loai = $this->model->listrecords_loai();
        $page_loai = "Views/listloai_layout2.php";
        $page_files = "Views/listproduct_layout2.php";
        require_once("layout2.php");
    }
    function ProductDetail()
    {
        $ma = $_GET["id"];
        $row = $this->model->detailrecord($ma);
        $page_loai = "Views/listloai_layout2.php";
        $page_files = "views/detail.php";
        require_once("layout2.php");
    }
    function ProductType()
    {
        $id = $_GET["id"];
        $list = $this->model->listtype($id);
        $list_loai = $this->model->listrecords_loai();
        $page_loai = "Views/listloai_layout2.php";
        $page_files = "Views/listproduct_layout2.php";
        require_once("layout2.php");
    }
    function ProductList1()
    {
        $list = $this->model->listrecords();
        $listloai = $this->model->listrecords_loai();
        $page_loai = "Views/listloai.php";
        $page_files = "Views/listproduct1.php";
        require_once("layout.php");
    }

    function ProductList2()
    {
        $list = $this->model->listrecords();
        $listloai = $this->model->listrecords_loai();
        $page_loai = "Views/listloai.php";
        $page_files = "Views/listproduct2.php";
        require_once("layout2.php");
    }

    function SearchProduct()
    {
        $keyword = $_GET["keyword"];
        $list     = $this->model->search($keyword);
        $list_loai = $this->model->listrecords_loai();
        $page_loai = "Views/listloai_layout2.php";
        $page_files = "Views/listproduct_layout2.php";
        require_once("layout2.php");
    }
}
