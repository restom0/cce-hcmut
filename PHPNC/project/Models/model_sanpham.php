<?php
    require_once 'System/Model_system.php';
    class model_sanpham extends model_system
    {
        public function listrecords()
        { //hàm lấy các record trong table
            $sql = "SELECT * FROM sua";
            $kq = $this->query($sql);
            return $kq;
        }
        public function detailrecord($id)
        { //hàm lấy chi tiết 1 record trong table
            $sql = "SELECT * FROM sua WHERE Ma_sua=?";
            $kq = $this->query($sql, [$id]);
            $kq = $kq->fetch_assoc();
            return $kq;
        }
    } //class
