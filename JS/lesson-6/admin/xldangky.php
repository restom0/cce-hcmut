<?php
//kiem tra submit
if(!empty($_POST)){
   
   $f=$l=$e=$p=$rp='';
if(isset($_POST['fn'])){
    $f=$_POST['fn'];
}
if(isset($_POST['ln'])){
    $l=$_POST['ln'];
}
if(isset($_POST['email'])){
    $e=$_POST['email'];
}
if(isset($_POST['pws'])){
    $p=$_POST['pws'];
}
if(isset($_POST['repws'])){
    $rp=$_POST['repws'];
}
//lay ten file
$filename = basename($_FILES["chonfile"]["name"]);


//copy hinh vao thu muc image\users
move_uploaded_file($_FILES["chonfile"]["tmp_name"], 'images/users/'.$filename);


//echo $f.$l.$e.$p.$rp;

//ket noi database
    require_once('connect.php');

//kiem tra pass va repass co trung khong
if($p==$rp){
    // ma hoa password
    $p=md5('$p');
    $rp=md5('$rp'); //hoac co the thay bang $rp=p;
    //insert cac input vao database 
    $sql="insert into users(F_name,L_name,Email,Password, Re_Password, Hinh) values ('$f','$l','$e','$p','$rp','$filename')";

    //echo $sql;
    mysqli_query($conn, $sql);//thuc thi cau lenh sql

    //chay qua trang login
    header('Location:main.php');


}
else
{
  echo "ban nhap pass va repass khong giong nhau!";
}


}

?>