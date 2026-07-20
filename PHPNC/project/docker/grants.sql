-- MYSQL_USER is only granted rights on MYSQL_DATABASE, but this stack serves
-- two applications from one MySQL: ql_ban_sua at the tree root and ql_ban_hoa
-- under ban_hoa/. ql_ban_hoa.sql creates its own database, so the app user
-- needs to be let into it explicitly.
GRANT ALL PRIVILEGES ON ql_ban_hoa.* TO 'phpnc'@'%';
FLUSH PRIVILEGES;
