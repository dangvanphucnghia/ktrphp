<?php
require_once 'DB.php';

class HocPhan {
    public static function all() {
        $db = DB::connect();
        $stmt = $db->query("SELECT * FROM HocPhan");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function giamSoLuong($maHP) {
        $db = DB::connect();
        $stmt = $db->prepare("UPDATE HocPhan SET SoLuong = SoLuong - 1 WHERE MaHP = ? AND SoLuong > 0");
        return $stmt->execute([$maHP]);
    }

    public static function tangSoLuong($maHP) {
        $db = DB::connect();
        $stmt = $db->prepare("UPDATE HocPhan SET SoLuong = SoLuong + 1 WHERE MaHP = ?");
        return $stmt->execute([$maHP]);
    }
}
