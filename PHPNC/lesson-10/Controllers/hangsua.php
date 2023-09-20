<?php
//nạp model để có các hàm tương tác db
require_once "models/model_hangsua.php";
class hangsua
{
    private $model = null;
    function __construct()
    {
        $this->model = new model_hangsua();
        //chức năng mặc định
        $act = "index";
        //tiếp nhận chức năng user request
        if (isset($_GET["act"])) $act = $_GET["act"];
        switch($act) {
            case "index":
                $this->index();
                break;
            case "addnew":
                $this->addnew();
                break;
            case "store":
                $this->store();
                break;
            case "edit":
                $this->edit();
                break;
            case "update":
                $this->update();
                break;
            case "delete":
                $this->delete();
                break;
            default:
                return;
        }
        //$this->$act;
    }
    function index()
    {
        $list = $this->model->listrecords();
        $page_title = "Danh sách hãng sữa";
        $page_files = "views/hangsua/list.php";
        require_once("layout.php");
    }
    function addnew()
    {
        $page_title = "Thêm Hãng Sữa";
        $page_files = "views/hangsua/addnew.php";
        require_once("layout.php");
    }

    function store()
    {
        $ma = $_POST["mahang"];
        $ten = $_POST["tenhang"];
        $dc = $_POST["diachi"];
        $dt = $_POST["dienthoai"];
        $em = $_POST["email"];
        $sql = "Select * from hang_sua where ma_hang_sua='$ma'";
        $kq = $this->model->query($sql);
        if ($kq->num_rows > 0) {
            $_SESSION["thongbao"] = "Mã hãng sữa đã có trong bảng";
        } else {
            $kq = $this->model->store($ma, $ten, $dc, $dt, $em);
            $_SESSION["thongbao"] = "Thêm hãng thành công!!";
        }
        if ($kq) {
            header("location: " . ROOT_URL . "/?ctr=hangsua");
        }
    }
    function edit()
    {
        $ma = $_GET["ma"];
        $row = $this->model->detailrecord($ma);
        $page_title = "Cập nhật Hãng Sữa";
        $page_files = "views/hangsua/edit.php";
        require_once("layout.php");
    }
    function update()
    {
        $ma = $_POST["mahang"];
        $ten = $_POST["tenhang"];
        $dc = $_POST["diachi"];
        $dt = $_POST["dienthoai"];
        $em = $_POST["email"];
        $kq = $this->model->update($ma, $ten, $dc, $dt, $em);
        if ($kq) {
            $_SESSION["thongbao"] = "Cập nhật thành công";
        } else {
            $_SESSION["thongbao"] = "Cập nhật thất bại";
        }
        header("location: " . ROOT_URL . "/?ctr=hangsua");
    }
    function delete()
    {
        $ma = $_GET["ma"];
        $sql = "select * from sua where ma_hang_sua='$ma'";
        $kq = $this->model->query($sql);
        if ($kq->num_rows > 0) {
            $_SESSION["thongbao"] = "Hãng sữa này đã có con không xoá được !!";
        } else {
            $sql = "DELETE FROM hang_sua WHERE ma_hang_sua='$ma'";
            $kq = $this->model->execute($sql);
            if ($kq)
                $_SESSION["thongbao"] = "Đã xoá hãng sữa này !!";
            else
                $_SESSION["thongbao"] = "Đã xoá hãng sữa THẤT BẠI !!";
        }
        header("location: " . ROOT_URL . "/?ctr=hangsua");
    }
} //class nhasanxuat