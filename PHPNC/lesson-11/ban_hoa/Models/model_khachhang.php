 <?php
    require_once 'system/model_system.php';
    class model_khachhang extends model_system
    {
        function store($ten, $dc, $dt, $em)
        { //hàm lưu 1 record vào table
            $sql = "Insert Into khach_hang(ho_ten,dia_chi,dien_thoai,email) Value('$ten', '$dc','$dt','$em')";
            $kq = $this->execute($sql);
            return $kq;
        }
        function update($ma, $ten, $dc, $dt, $em)
        { //hàm cập nhật 1 record vào table
            $sql = "UPDATE khach_hang SET ho_ten='$ten', dia_chi = '$dc', dien_thoai='$dt', email='$em' 
                            WHERE id='$ma'";
            $kq = $this->execute($sql);
            return $kq;
        }
        function delete($id)
        {  //hàm xóa 1 record khỏi table
        }
        function listrecords()
        { //hàm lấy các record trong table
            $sql = "SELECT * FROM khach_hang";
            $kq = $this->query($sql);
            return $kq;
        }
        function detailrecord($id)
        { //hàm lấy chi tiết 1 record trong table
            $sql = "SELECT * FROM khach_hang WHERE id='$id'";
            $kq = $this->query($sql);
            $kq = $kq->fetch_assoc();
            return $kq;
        }
    } //class 
    ?>
