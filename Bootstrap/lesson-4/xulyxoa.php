<?php
if (isset($_POST['deletedata'])) {
    $id = $_POST['delete_id'];
    
    $filename = $_POST["filename"];

    $conn = @new mysqli("localhost", "root", null, "ql_ban_giay");
    $conn->set_charset("utf8");
    
    $query = "DELETE FROM giay WHERE id=$id";

    $query_run = $conn->query($query);

    if ($query_run) {
        
        unlink("../hinh/".$filename);
        
        header("Location: danhsach.php");
    } else {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}