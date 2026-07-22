<?php
require_once "Config.php";
class model_system
{
    public $conn;
    function __construct()
    {
        $this->conn = @new mysqli(HOST_DB, USER_DB, PASS_DB, NAME_DB);
    }

    // Values are bound, never concatenated into the statement: callers put
    // "?" in the SQL and pass the values separately, so input can no longer
    // change the shape of the query. $types defaults to all-string, which
    // mysqli converts as needed.
    private function bind($sql, $params, $types)
    {
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) return false;
        if ($types === '') $types = str_repeat('s', count($params));
        $stmt->bind_param($types, ...$params);
        return $stmt->execute() ? $stmt : false;
    }

    // Calls that pass no params behave exactly as before, which keeps the
    // fixed queries that carry no user input working untouched.
    function query($sql, $params = [], $types = '')
    {
        if (!$params) return $this->conn->query($sql);
        $stmt = $this->bind($sql, $params, $types);
        return $stmt === false ? false : $stmt->get_result();
    }
    function queryOne($sql, $params = [], $types = '')
    {
        $result = $this->query($sql, $params, $types);
        return $result ? $result->fetch_assoc() : null;
    }
    function execute($sql, $params = [], $types = '')
    {
        if (!$params) return $this->conn->query($sql);
        return $this->bind($sql, $params, $types) !== false;
    }
}
