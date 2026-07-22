<?php
require_once 'System/Model_system.php';
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
        $sql = "SELECT * FROM hoa WHERE id_loai=?";
        $kq = $this->query($sql, [$idtype], "i");
        return $kq;
    }
    function getProductById($id)
    {
        $sql = "SELECT * FROM hoa WHERE id=?";
        $result = $this->queryOne($sql, [$id], "i");
        return $result;
    }
    function search($kw)
    {
        if (is_numeric($kw)) {
            $sql = "SELECT * FROM hoa, loai where hoa.id_loai=loai.id and hoa.gia_ban <= ?  ORDER BY loai.id";
        } else {
            $sql = "SELECT * FROM hoa, loai where hoa.id_loai=loai.id and hoa.tp_chinh like ?  ORDER BY loai.id";
            // The wildcards belong to the value, not the statement, so they are
            // added here rather than inside the SQL.
            $kw = "%" . $kw . "%";
        }
        $kq = $this->query($sql, [$kw]);
        return $kq;
    }
    function detailrecord($id)
    { //hàm lấy chi tiết 1 record trong table
        $sql = "SELECT * FROM hoa WHERE id=?";
        $kq = $this->query($sql, [$id], "i");
        $kq = $kq->fetch_assoc();
        return $kq;
    }
} //class