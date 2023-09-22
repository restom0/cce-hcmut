<?php
require_once "Config.php";
class model_system
{
    public $conn;
    function __construct()
    {
        $this->conn = @new mysqli(HOST_DB, USER_DB, null, NAME_DB);
    }
    function query($sql)
    {
        $result = $this->conn->query($sql);
        return $result;
    }
    function queryOne($sql)
    {
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }
    function execute($sql)
    {
        $result = $this->conn->query($sql);
        return $result;
    }
}
