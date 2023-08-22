<?php
if(!empty($_POST)){
    $u=$p='';
    if(isset($_POST['urs'])){
      $u=$_POST['urs'];
    }
    if(isset($_POST['psw'])){
      $p=$_POST['psw'];
    }
    //echo $u.' '.$p;
    //xu ly login
        //if($u=='admin' && $p=='123456@'){
         // header('Location:main.php');
        //}

    //ket noi database
   require_once('connect.php');
    //viet sql kiem tra email va password co dung ko
    $p=md5($p);
    $sql="select * from users where Email='$u' and Password ='$p'";
    //thuc thi cau lenh sql
    $kq=mysqli_query($conn, $sql);
    //kiem tra ket qua thuc thi sql cos ton tai user ko (dem so dong hon 0)
    if(mysqli_num_rows($kq)>0){
      header('Location:main.php');  
    }
    else{
      echo "ban chua la thanh vien, vui long dang ky!";
    }
}


?>