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
    function search($kw)
    {
        if (is_numeric($kw)) {
            $sql = "SELECT * FROM hoa, loai where hoa.id_loai=loai.id and hoa.gia_ban <= $kw  ORDER BY loai.id";
        } else {
            $sql = "SELECT * FROM hoa, loai where hoa.id_loai=loai.id and hoa.tp_chinh like '%$kw%'  ORDER BY loai.id";
        }
        $kq = $this->query($sql);
        return $kq;
    }
    function detailrecord($id)
    { //hàm lấy chi tiết 1 record trong table
        $sql = "SELECT * FROM hoa WHERE id=$id";
        $kq = $this->query($sql);
        $kq = $kq->fetch_assoc();
        return $kq;
    }
} //class