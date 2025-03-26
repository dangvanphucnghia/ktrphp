<?php
session_start();
require_once '../models/DB.php';
include '../views/layouts/header.php';

try {
    $db = DB::connect();
    echo "Kết nối cơ sở dữ liệu thành công!";
} catch (Exception $e) {
    echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
    die();
}

$controller = $_GET['controller'] ?? 'sinhvien';
$action = $_GET['action'] ?? 'index';

$controllerFile = __DIR__ . '/../controllers/' . ucfirst($controller) . 'Controller.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerClass = ucfirst($controller) . "Controller";
    $controllerInstance = new $controllerClass();

    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action();
    } else {
        echo "Action không tồn tại.";
    }
} else {
    echo "Controller không tồn tại.";
}

include '../views/layouts/footer.php';