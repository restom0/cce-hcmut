 <?php
    require_once 'system/model_system.php';
    class model_donhang extends model_system
    {
        function listrecords()
        { //hàm lấy các record trong table
            $sql = "SELECT * FROM don_hang,khach_hang where don_hang.id_khachhang=khach_hang.id";
            $kq = $this->query($sql);
            return $kq;
        }
        function detailrecord($id)
        { //hàm lấy chi tiết 1 record trong table
            $sql = "SELECT * 
            FROM chitiet_donhang,hoa 
            WHERE chitiet_donhang.id_hoa=hoa.id & chitiet_donhang.id_donhang='$id'";
            $kq = $this->query($sql);
            return $kq;
        }
    } //class 
    ?>
