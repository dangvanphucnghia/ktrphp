<?php
require_once __DIR__ . '/../models/HocPhan.php';

class HocPhanController {
    public function index() {
        $hocphans = HocPhan::all();
        include __DIR__ . '/../views/hocphan/index.php';
    }
}
