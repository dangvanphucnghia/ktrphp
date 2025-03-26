<?php
require_once __DIR__ . '/../models/SinhVien.php';

class SinhVienController {
    public function index() {
        $sinhviens = SinhVien::all();
        include __DIR__ . '/../views/sinhvien/index.php';
    }

    public function create() {
        include __DIR__ . '/../views/sinhvien/create.php';
    }

    public function store() {
        $existingStudent = SinhVien::find($_POST['MaSV']);
        if ($existingStudent) {
            echo "<script>alert('Mã sinh viên đã tồn tại! Vui lòng nhập mã khác.'); window.history.back();</script>";
            return;
        }

        $hinh = $_FILES['Hinh'];
        $hinhPath = '';

        if ($hinh['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../public/images/';
            $hinhPath = basename($hinh['name']);
            move_uploaded_file($hinh['tmp_name'], $uploadDir . $hinhPath);
        }

        SinhVien::create([
            $_POST['MaSV'],
            $_POST['HoTen'],
            $_POST['GioiTinh'],
            $_POST['NgaySinh'],
            $hinhPath,
            $_POST['MaNganh']
        ]);

        header('Location: index.php?controller=sinhvien&action=index');
    }

    public function edit() {
        $sinhvien = SinhVien::find($_GET['MaSV']);
        include __DIR__ . '/../views/sinhvien/edit.php';
    }

    public function update() {
        $hinh = $_FILES['Hinh'];
        $hinhPath = $_POST['HinhOld'];

        if ($hinh['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../public/images/';
            $hinhPath = basename($hinh['name']);
            move_uploaded_file($hinh['tmp_name'], $uploadDir . $hinhPath);
        }

        SinhVien::update([
            $_POST['HoTen'],
            $_POST['GioiTinh'],
            $_POST['NgaySinh'],
            $hinhPath,
            $_POST['MaNganh'],
            $_POST['MaSV']
        ]);

        header('Location: index.php?controller=sinhvien&action=index');
    }

    public function delete() {
        SinhVien::delete($_GET['MaSV']);
        header('Location: index.php?controller=sinhvien&action=index');
    }

    public function details() {
        $sinhvien = SinhVien::findWithNganh($_GET['MaSV']);
        include __DIR__ . '/../views/sinhvien/details.php';
    }
}
