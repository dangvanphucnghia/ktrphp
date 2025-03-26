<?php
class DB {
    public static function connect() {
        $host = 'localhost'; // Đảm bảo đúng tên host
        $dbname = 'tests';   // Đảm bảo đúng tên cơ sở dữ liệu
        $username = 'root';  // Đảm bảo đúng username
        $password = '';      // Đảm bảo đúng mật khẩu
        try {
            return new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        } catch (PDOException $e) {
            die('Lỗi kết nối cơ sở dữ liệu: ' . $e->getMessage());
        }
    }
}