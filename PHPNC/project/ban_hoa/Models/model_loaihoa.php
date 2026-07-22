 <?php
    require_once 'System/Model_system.php';
    class model_loaihoa extends model_system
    {
        function store($ten)
        { //hàm lưu 1 record vào table
            $sql = "Insert Into loai(ten_loai) Value(?)";
            $kq = $this->execute($sql, [$ten]);
            return $kq;
        }
        function update($id, $ten)
        { //hàm cập nhật 1 record vào table
            $sql = "UPDATE loai SET ten_loai=?
                            WHERE id=?";
            $kq = $this->execute($sql, [$ten, $id]);
            return $kq;
        }
        function delete($id)
        {  //hàm xóa 1 record khỏi table
        }
        function listrecords()
        { //hàm lấy các record trong table
            $sql = "SELECT * FROM loai";
            $kq = $this->query($sql);
            return $kq;
        }
        function detailrecord($id)
        { //hàm lấy chi tiết 1 record trong table
            $sql = "SELECT * FROM loai WHERE id=?";
            $kq = $this->query($sql, [$id]);
            $kq = $kq->fetch_assoc();
            return $kq;
        }
    } //class 
    ?>
