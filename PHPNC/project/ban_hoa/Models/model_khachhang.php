 <?php
    require_once 'System/Model_system.php';
    class model_khachhang extends model_system
    {
        function store($ten, $dc, $dt, $em)
        { //hàm lưu 1 record vào table
            $sql = "Insert Into khach_hang(ho_ten,dia_chi,dien_thoai,email) Value(?,?,?,?)";
            $kq = $this->execute($sql, [$ten, $dc, $dt, $em]);
            return $kq;
        }
        function update($ma, $ten, $dc, $dt, $em)
        { //hàm cập nhật 1 record vào table
            $sql = "UPDATE khach_hang SET ho_ten=?, dia_chi = ?, dien_thoai=?, email=? 
                            WHERE id=?";
            $kq = $this->execute($sql, [$ten, $dc, $dt, $em, $ma]);
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
            $sql = "SELECT * FROM khach_hang WHERE id=?";
            $kq = $this->query($sql, [$id]);
            $kq = $kq->fetch_assoc();
            return $kq;
        }
    } //class 
    ?>
