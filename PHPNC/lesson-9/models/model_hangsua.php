<?php
require_once 'system/model_system.php';
class model_hangsua extends model_system
{
    function store($ma, $ten, $dc, $dt, $em)
    { //hàm lưu 1 record vào table
        $sql = "Insert Into hang_sua Values('$ma','$ten', '$dc','$dt','$em')";
        $kq = $this->execute($sql);
        return $kq;
    }
    function update($ma, $ten, $dc, $dt, $em)
    { //hàm cập nhật 1 record vào table
        $sql = "UPDATE hang_sua SET ma_hang_sua='$ma', ten_hang_sua='$ten',
dia_chi = '$dc', dien_thoai='$dt', email='$em'
WHERE ma_hang_sua='$ma'";
        $kq = $this->execute($sql);
        return $kq;
    }
    function delete($id)
    { //hàm xóa 1 record khỏi table
        $sql = "DELETE FROM hang_sua WHERE ma_hang_sua='$id'";
        $kq = $this->query($sql);
        return $kq;
    }
    function listrecords()
    { //hàm lấy các record trong table
        $sql = "SELECT * FROM hang_sua";
        $kq = $this->query($sql);
        return $kq;
    }
    function detailrecord($id)
    { //hàm lấy chi tiết 1 record trong table
        $sql = "SELECT * FROM hang_sua WHERE Ma_hang_sua='$id'";
        $kq = $this->query($sql);
        $kq = $kq->fetch_assoc();
        return $kq;
    }
} //class
