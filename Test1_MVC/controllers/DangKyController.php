<?php
require_once __DIR__ . '/../models/HocPhan.php'; // Corrected path
require_once __DIR__ . '/../models/DangKy.php'; // Corrected path
require_once __DIR__ . '/../models/SinhVien.php'; // Ensure SinhVien model is included

class DangKyController {
    public function index() {
        $dsHocPhan = HocPhan::all();
        include __DIR__ . '/../views/dangky/index.php'; // Corrected path
    }

    public function luu() {
        $maSV = $_POST['MaSV'];
        $dsMaHP = $_POST['hocphan'] ?? [];

        if (empty($dsMaHP)) {
            echo "<script>alert('Vui lòng chọn ít nhất một học phần để đăng ký!'); window.history.back();</script>";
            return;
        }

        $maDK = DangKy::taoDangKy($maSV);

        foreach ($dsMaHP as $maHP) {
            DangKy::themHocPhan($maDK, $maHP);
            HocPhan::giamSoLuong($maHP); // Decrement the available slots
        }

        echo "<script>alert('Đăng ký thành công!'); window.location='index.php?controller=dangky&action=thongTinDangKy';</script>";
    }

    public function giohang() {
        $maSV = $_GET['MaSV'] ?? $_SESSION['MaSV'] ?? null; // Use session if MaSV is not provided in the URL
        if (!$maSV) {
            echo "<p class='text-center'>Vui lòng cung cấp mã sinh viên.</p>";
            return;
        }

        $dsDangKy = DangKy::dsHocPhanDaDangKy($maSV); // Retrieve registered courses
        include __DIR__ . '/../views/dangky/giohang.php';
    }

    public function xoamon() {
        $maSV = $_GET['MaSV'];
        $maHP = $_GET['MaHP'];

        // Remove the course from the registration
        DangKy::xoaHocPhan($maSV, $maHP);

        // Increment the available slots for the course
        HocPhan::tangSoLuong($maHP);

        header("Location: index.php?controller=dangky&action=giohang&MaSV=" . $maSV);
    }

    public function xoatatca() {
        DangKy::xoaToanBoDangKy($_GET['MaSV']);
        header("Location: index.php?controller=dangky&action=giohang&MaSV=" . $_GET['MaSV']);
    }

    public function thongTinDangKy() {
        $maSV = $_SESSION['MaSV'] ?? null;

        if (!$maSV) {
            echo "<p class='text-center'>Vui lòng đăng nhập để xem thông tin đăng ký.</p>";
            return;
        }

        $sinhvien = SinhVien::findWithNganh($maSV); // Retrieve student details
        $dsHocPhan = DangKy::dsHocPhanDaDangKy($maSV); // Retrieve registered courses

        include __DIR__ . '/../views/dangky/thongtindangky.php';
    }

    public function luuGioHang() {
        $maSV = $_SESSION['MaSV'] ?? null;

        if (!$maSV) {
            echo "<script>alert('Vui lòng đăng nhập để lưu học phần!'); window.history.back();</script>";
            return;
        }

        $dsDangKy = DangKy::dsHocPhanDaDangKy($maSV);

        if (empty($dsDangKy)) {
            echo "<script>alert('Không có học phần nào để lưu!'); window.history.back();</script>";
            return;
        }

        // Logic for saving the cart (if additional processing is needed)
        echo "<script>alert('Học phần đã được lưu thành công!'); window.location='index.php?controller=dangky&action=thongTinDangKy';</script>";
    }
}
