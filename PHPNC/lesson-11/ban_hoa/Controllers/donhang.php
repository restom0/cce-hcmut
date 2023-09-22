<?php
//nạp model để có các hàm tương tác db
require_once "models/model_donhang.php";
class donhang
{
    private $model = null;
    function __construct()
    {
        $this->model = new model_donhang();
        //chức năng mặc định
        $action = "donhang";
        //tiếp nhận chức năng user request
        if (isset($_GET["action"])) $action = $_GET["action"];
        switch ($action) {
            case "donhang":
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
        $page_files = "Views/donhang/list.php";
        require_once("layout.php");
    }

    function detail()
    {
        $ma = $_GET["ma"];
        $list = $this->model->detailrecord($ma);
        $page_title = "";
        $page_files = "Views/donhang/detail.php";
        require_once("layout.php");
    }
}
