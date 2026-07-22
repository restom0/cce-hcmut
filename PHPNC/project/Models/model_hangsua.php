 <?php
    require_once 'System/Model_system.php';
    class model_hangsua extends model_system
    {
        function store($ma, $ten, $dc, $dt, $em)
        { //hàm lưu 1 record vào table
            $sql = "Insert Into hang_sua Values(?,?,?,?,?)";
            $kq = $this->execute($sql, [$ma, $ten, $dc, $dt, $em]);
            return $kq;
        }
        function update($ma, $ten, $dc, $dt, $em)
        { //hàm cập nhật 1 record vào table
            $sql = "UPDATE hang_sua SET Ma_hang_sua=?, Teng_hang_sua=?, 
                            Dia_chi = ?, Dien_thoai=?, Email=? 
                            WHERE ma_hang_sua=?";
            $kq = $this->execute($sql, [$ma, $ten, $dc, $dt, $em, $ma]);
            return $kq;
        }
        function delete($id)
        {  //hàm xóa 1 record khỏi table
        }
        function listrecords()
        { //hàm lấy các record trong table
            $sql = "SELECT * FROM hang_sua";
            $kq = $this->query($sql);
            return $kq;
        }
        function detailrecord($id)
        { //hàm lấy chi tiết 1 record trong table
            $sql = "SELECT * FROM hang_sua WHERE Ma_hang_sua=?";
            $kq = $this->query($sql, [$id]);
            $kq = $kq->fetch_assoc();
            return $kq;
        }
    } //class 
    ?>
