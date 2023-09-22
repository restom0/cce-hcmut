 <?php
    require_once 'system/model_system.php';
    class model_loaihoa extends model_system
    {
        function store($ten)
        { //hàm lưu 1 record vào table
            $sql = "Insert Into loai(ten_loai) Value('$ten')";
            $kq = $this->execute($sql);
            return $kq;
        }
        function update($id, $ten)
        { //hàm cập nhật 1 record vào table
            $sql = "UPDATE loai SET ten_loai='$ten'
                            WHERE id=$id";
            $kq = $this->execute($sql);
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
            $sql = "SELECT * FROM loai WHERE id='$id'";
            $kq = $this->query($sql);
            $kq = $kq->fetch_assoc();
            return $kq;
        }
    } //class 
    ?>
