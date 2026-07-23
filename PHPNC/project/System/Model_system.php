<?php
    require_once "Config.php";
    class model_system
    {
        public $conn;
        public function __construct()
        {
            $this->conn = @new mysqli(HOST_DB, USER_DB, PASS_DB, NAME_DB);
        }
        private function run($sql, $params = [])
        {
            $stmt = $this->conn->prepare($sql);
            if (!$stmt) {
                return false;
            }
            if ($params) {
                $types = str_repeat('s', count($params));
                $stmt->bind_param($types, ...$params);
            }
            if (!$stmt->execute()) {
                return false;
            }
            $result = $stmt->get_result();
            return $result ?: true;
        }
        public function query($sql, $params = [])
        {
            return $this->run($sql, $params);
        }
        public function queryOne($sql, $params = [])
        {
            $result = $this->query($sql, $params);
            if (!$result) {
                return null;
            }
            $row = $result->fetch_assoc();
            return $row;
        }
        public function execute($sql, $params = [])
        {
            return $this->run($sql, $params);
        }
    }
