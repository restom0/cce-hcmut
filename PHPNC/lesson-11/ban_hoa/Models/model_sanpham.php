<?php
require_once 'System/model_system.php';
class model_sanpham extends model_system
{
    function listrecords()
    { //hàm lấy các record trong table
        $sql = "SELECT * FROM hoa, loai where hoa.id_loai=loai.id ORDER BY loai.id";
        $kq = $this->query($sql);
        return $kq;
    }
    function listrecords_loai()
    { //hàm lấy các record trong table
        $sql = "SELECT * FROM loai";
        $kq = $this->query($sql);
        return $kq;
    }

    function listtype($idtype)
    { //hàm lấy các record theo loại trong table
        $sql = "SELECT * FROM hoa WHERE id_loai=$idtype";
        $kq = $this->query($sql);
        return $kq;
    }
    function getProductById($id)
    {
        $sql = "SELECT * FROM hoa WHERE id=$id";
        $result = $this->queryOne($sql);
        return $result;
    }
} //class