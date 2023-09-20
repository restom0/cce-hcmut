<?php
//nạp model để có các hàm tương tác db
require_once "models/model_trangchu.php";
class trangchu
{
    private $model = null;
    function __construct()
    {
        $this->model = new model_trangchu();
         //chức năng mặc định
        $act = "trangchu";
        //tiếp nhận chức năng user request
        if (isset($_GET["act"])) $act = $_GET["act"];
        switch ($act) {
            case "trangchu":
                $this->index();
                break;
            case "chitiet":
                $this->detail();
                break;
            default:
        }
    }

    function index()
    {
        $list = $this->model->listrecords();
        $page_title = "Danh sách sữa";
        $page_files = "views/listmilk.php";
        require_once("layout.php");
    }

    function detail()
    {
        $ma = $_GET["ma"];
        $row = $this->model->detailrecord($ma);
        $page_title = "";
        $page_files = "views/detailmilk.php";
        require_once("layout.php");
    }

}