<?php
require_once 'DB.php';

class SinhVien {
    public static function all() {
        $db = DB::connect();
        $stmt = $db->query("SELECT * FROM SinhVien");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($MaSV) {
        $db = DB::connect();
        $stmt = $db->prepare("SELECT * FROM SinhVien WHERE MaSV = ?");
        $stmt->execute([$MaSV]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function findWithNganh($MaSV) {
        $db = DB::connect();
        $stmt = $db->prepare("
            SELECT sv.*, nh.TenNganh 
            FROM SinhVien sv
            JOIN NganhHoc nh ON sv.MaNganh = nh.MaNganh
            WHERE sv.MaSV = ?
        ");
        $stmt->execute([$MaSV]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = DB::connect();
        $stmt = $db->prepare("INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute($data);
    }

    public static function update($data) {
        $db = DB::connect();
        $stmt = $db->prepare("UPDATE SinhVien SET HoTen=?, GioiTinh=?, NgaySinh=?, Hinh=?, MaNganh=? WHERE MaSV=?");
        return $stmt->execute($data);
    }

    public static function delete($MaSV) {
        $db = DB::connect();
        $stmt = $db->prepare("DELETE FROM SinhVien WHERE MaSV = ?");
        return $stmt->execute([$MaSV]);
    }
}
