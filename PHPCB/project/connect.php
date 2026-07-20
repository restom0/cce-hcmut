<?php
function pdo_get_connection()
{
    try {
        $host = getenv("DB_HOST") ?: "localhost";
        $name = getenv("DB_NAME") ?: "banhkem";
        $dburl = "mysql:host=$host;dbname=$name;charset=utf8";
        $username = getenv("DB_USER") ?: 'root';
        $password = getenv("DB_PASS") ?: '';
        $conn = new PDO($dburl, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
$conn = pdo_get_connection();
