<?php
require_once 'DB.php';

class DangKy {
    public static function taoDangKy($maSV) {
        $db = DB::connect();
        $stmt = $db->prepare("INSERT INTO DangKy (NgayDK, MaSV) VALUES (CURDATE(), ?)");
        $stmt->execute([$maSV]);
        return $db->lastInsertId();
    }

    public static function themHocPhan($maDK, $maHP) {
        $db = DB::connect();
        $stmt = $db->prepare("INSERT INTO ChiTietDangKy (MaDK, MaHP) VALUES (?, ?)");
        return $stmt->execute([$maDK, $maHP]);
    }
    public static function layDangKyGanNhat($maSV) {
        $db = DB::connect();
        $stmt = $db->prepare("SELECT MaDK FROM DangKy WHERE MaSV = ? ORDER BY MaDK DESC LIMIT 1");
        $stmt->execute([$maSV]);
        return $stmt->fetchColumn();
    }

    public static function dsHocPhanDaDangKy($maSV) {
        $db = DB::connect();
        $stmt = $db->prepare("
            SELECT hp.MaHP, hp.TenHP, hp.SoTinChi
            FROM ChiTietDangKy ctdk
            JOIN HocPhan hp ON ctdk.MaHP = hp.MaHP
            JOIN DangKy dk ON ctdk.MaDK = dk.MaDK
            WHERE dk.MaSV = ?
        ");
        $stmt->execute([$maSV]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function xoaHocPhan($maSV, $maHP) {
        $maDK = self::layDangKyGanNhat($maSV);
        $db = DB::connect();
        $stmt = $db->prepare("DELETE FROM ChiTietDangKy WHERE MaDK = ? AND MaHP = ?");
        return $stmt->execute([$maDK, $maHP]);
    }

    public static function xoaToanBoDangKy($maSV) {
        $maDK = self::layDangKyGanNhat($maSV);
        $db = DB::connect();
        $stmt = $db->prepare("DELETE FROM ChiTietDangKy WHERE MaDK = ?");
        return $stmt->execute([$maDK]);
    }
}
