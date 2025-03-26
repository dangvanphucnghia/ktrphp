<?php
return [
    'sinhvien' => [
        'index' => 'SinhVienController@index',
        'create' => 'SinhVienController@create',
        'store' => 'SinhVienController@store',
        'edit' => 'SinhVienController@edit',
        'update' => 'SinhVienController@update',
        'delete' => 'SinhVienController@delete',
        'details' => 'SinhVienController@details',
    ],
    'dangky' => [
        'index' => 'DangKyController@index',
        'luu' => 'DangKyController@luu',
        'giohang' => 'DangKyController@giohang',
        'xoamon' => 'DangKyController@xoamon',
        'xoatatca' => 'DangKyController@xoatatca',
        'thongTinDangKy' => 'DangKyController@thongTinDangKy',
        'luuGioHang' => 'DangKyController@luuGioHang', // New route
    ],
    'auth' => [
        'login' => 'AuthController@login',
        'loginProcess' => 'AuthController@loginProcess',
        'logout' => 'AuthController@logout',
    ],
    'hocphan' => [
        'index' => 'HocPhanController@index',
    ],
];
