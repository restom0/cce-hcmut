<?php
   $ketnoi = new mysqli("localhost","root",null,"ql_ban_sua");
   if ($ketnoi->connect_error)
   {
       die("Kết nối thất bại !!!" . $ketnoi->connect_error);
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập MySQL</title>
    <style>
        .header {
            width:100%; 
            height:100px; 
            text-align:center;
            background-color:black; 
            color:white;
            line-height:100px;
            font-size:50px;
        }
        .content {
            width:80%;
            margin:0px auto;
           
        }
        .left {
            width:20%;
            float:left;
        }
        .right {
            width:70%;
            margin-left:50px;
            float:right;
        }
        .footer {
            width:100%;
            text-align:center;
            height:50px;
            line-height:50px;
            background-color:black;
            color:white;
        }
        .left ul {
            list-style:none;
            line-height:30px;
        }
        .menu {
            background-color:darkblue;
            color:white;
            text-align:center;
            cursor:pointer;
        }
    </style>
</head>
<body>
    <div class="header">BÀI TẬP MYSQL</div>
    <div class="content">
        <div class="left">
            <ul>
                <li class="menu">Truy Vấn 1 Bảng</li>
                <ul style="border:1px solid gray;">
                    <li><a href="?thamso=vd1">Ví Dụ 01</a></li>
                    <li><a href="?thamso=vd2">Ví Dụ 02</a></li>                    
                    <li><a href="?thamso=vd3">Ví Dụ 03</a></li>
                    <li><a href="?thamso=vd4">Ví Dụ 04</a></li>
                </ul>           
                <li class="menu">Truy Vấn n Bảng</li>
                <ul style="border:1px solid gray;">
                    <li><a href="?thamso=vd5">Ví Dụ 05</a></li>
                    <li><a href="?thamso=vd6">Ví Dụ 06</a></li>                    
                    <li><a href="#">Ví Dụ 07</a></li>
                </ul>                             
                <li class="menu">Hãng Sữa</li>
                <ul style="border:1px solid gray;">
                    <li><a href="?thamso=ds">Danh Sách</a></li>
                    <li><a href="?thamso=tm">Thêm Mới</a></li>                    
                </ul>                             
            <ul>
        </div>
        <div class="right">
            <?php
                if (isset($_GET["thamso"]))
                {
                    $chon = $_GET["thamso"];
                    switch ($chon)
                    {
                        case "vd1": include_once "vd01.php"; break;
                        case "vd2": include_once "vd02.php"; break;
                        case "vd3": include_once "vd03.php"; break;
                        case "vd4": include_once "vd04.php"; break;
                        case "vd5": include_once "vd05.php"; break;
                        case "vd6": include_once "vd06.php"; break;
                        case "ds" : include_once "dskh.php"; break;
                        case "tm" : include_once "them_hangsua.php"; break;
                        case "sua": include_once "sua_hangsua.php"; break;
                        case "xoa": include_once "xoa_hangsua.php"; break;
                    }
                }
                else
                {
                    echo "<h1>Chưa có câu lệnh truy vấn !!!!</h1>";
                }
            ?>
        </div>
    </div>
    <div style="clear:both"></div>            
    <div class="footer">Bản Quyền &copy; Bách Khoa - 2023</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".menu").click(function(event){
                $(this).next("ul").toggle("100");
            });
            
        });
    </script>
</body>
</html>