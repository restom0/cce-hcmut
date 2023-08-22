<?php
$id = $_GET['iduser'];
//ket noi database
require_once 'connect.php';
$sql = "DELETE FROM users WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
header('Location:main.php');
