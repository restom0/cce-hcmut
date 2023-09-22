<?php
//nạp model để có các hàm tương tác db
require_once "models/model_loaihoa.php";
class loaihoa
{
    private $model = null;
    function __construct()
    {
        $this->model = new model_loaihoa();
        //chức năng mặc định
        $act = "index";
        //tiếp nhận chức năng user request
        if (isset($_GET["act"])) $act = $_GET["act"];
        switch ($act) {
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
        $page_title = "Danh sách Loại hoa";
        $page_files = "Views/loaihoa/list.php";
        require_once("layout.php");
    }
    function addnew()
    {
        $page_title = "Thêm Hãng Sữa";
        $page_files = "Views/loaihoa/addnew.php";
        require_once("layout.php");
    }

    function store()
    {
        $ten = $_POST["tenhang"];
        $sql = "Select * from loai where ten_loai='$ten'";
        $kq = $this->model->query($sql);
        if ($kq->num_rows > 0) {
            $_SESSION["thongbao"] = "Mã hãng đã có trong bảng";
        } else {
            $kq = $this->model->store($ten);
            $_SESSION["thongbao"] = "Thêm hãng thành công!!";
        }
        if ($kq) {
            header("location: " . ROOT_URL . "/?ctrl=loaihoa");
        }
    }
    function edit()
    {
        $ma = $_GET["ma"];
        $row = $this->model->detailrecord($ma);
        $page_title = "Cập nhật Hãng Hoa";
        $page_files = "Views/loaihoa/edit.php";
        require_once("layout.php");
    }
    function update()
    {
        $id = $_POST["mahang"];
        $ten = $_POST["tenhang"];
        $kq = $this->model->update($id, $ten);
        if ($kq) {
            $_SESSION["thongbao"] = "Cập nhật thành công";
        } else {
            $_SESSION["thongbao"] = "Cập nhật thất bại";
        }
        header("location: " . ROOT_URL . "/?ctrl=loaihoa");
    }
    function delete()
    {
        $id = $_GET["ma"];
        $sql = "select * from hoa where id_loai='$id'";
        $kq = $this->model->query($sql);
        if ($kq->num_rows > 0) {
            $_SESSION["thongbao"] = "Loại hoa này đã có hoa không xoá được !!";
        } else {
            $sql = "DELETE FROM loai WHERE id='$id'";
            $kq = $this->model->execute($sql);
            if ($kq)
                $_SESSION["thongbao"] = "Đã xoá loại hoa này !!";
            else
                $_SESSION["thongbao"] = "Đã xoá loại hoa THẤT BẠI !!";
        }
        header("location: " . ROOT_URL . "/?ctrl=loaihoa");
    }
} //class nhasanxuat