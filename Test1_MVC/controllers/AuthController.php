<?php
require_once __DIR__ . '/../models/SinhVien.php';

class AuthController {
    public function login() {
        include __DIR__ . '/../views/auth/login.php';
    }

    public function loginProcess() {
        $maSV = $_POST['MaSV'];

        $sinhvien = SinhVien::find($maSV);

        if ($sinhvien) {
            session_start();
            $_SESSION['MaSV'] = $maSV;
            header('Location: index.php?controller=sinhvien&action=index');
        } else {
            echo "<script>alert('Mã sinh viên không tồn tại!'); window.history.back();</script>";
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?controller=auth&action=login');
    }
}
