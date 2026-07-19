<?php
define("HOST_DB", "localhost");
define("NAME_DB", "ql_ban_sua");
define("USER_DB", "root");
define("PASS_DB", "");
// Suy ra đường dẫn web gốc từ front controller để chạy được ở mọi nơi triển khai.
define("ROOT_URL", rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/'));
define("ADMIN_URL", ROOT_URL . "/admin");
define("SITE_URL", ROOT_URL . "/site");
define("SYSTEM_PATH", ROOT_URL . "/system");
