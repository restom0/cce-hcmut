<?php
define("HOST_DB", getenv("DB_HOST") ?: "localhost");
define("NAME_DB", getenv("DB_NAME") ?: "ql_ban_hoa");

define("USER_DB", getenv("DB_USER") ?: "root");
define("PASS_DB", getenv("DB_PASS") ?: "");
// Suy ra đường dẫn web gốc từ front controller để chạy được ở mọi nơi triển khai.
define("ROOT_URL", rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/'));
define("ADMIN_URL", ROOT_URL . "/admin");
define("SITE_URL", ROOT_URL . "/site");
define("SYSTEM_PATH", ROOT_URL . "/system");
