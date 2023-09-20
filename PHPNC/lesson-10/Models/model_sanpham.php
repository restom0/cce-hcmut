<?php
    require_once 'system/model_system.php';
    class model_sanpham extends model_system
    {
        function listrecords()
        { //hàm lấy các record trong table
            $sql = "SELECT * FROM sua";
            $kq = $this->query($sql);
            return $kq;
        }
        function detailrecord($id)
        { //hàm lấy chi tiết 1 record trong table
            $sql = "SELECT * FROM sua WHERE Ma_sua='$id'";
            $kq = $this->query($sql);
            $kq = $kq->fetch_assoc();
            return $kq;
        }
    } //class