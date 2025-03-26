<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sinh viên</title>
    <link rel="stylesheet" href="/ST4/Test1_MVC/public/styles.css"> <!-- Ensure the correct path -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery for AJAX -->
</head>
<body>
    <?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
    <header>
        <h1>Hệ thống quản lý sinh viên</h1>
        <nav>
            <a href="index.php?controller=sinhvien&action=index">Sinh viên</a> |
            <a href="index.php?controller=dangky&action=index">Đăng ký học phần</a> |
            <a href="index.php?controller=dangky&action=giohang">Xem học phần đã đăng ký</a> |
            <a href="index.php?controller=hocphan&action=index">Học phần</a> |
            <?php if (isset($_SESSION['MaSV'])): ?>
                <a href="index.php?controller=auth&action=logout">Đăng xuất</a>
            <?php else: ?>
                <a href="index.php?controller=auth&action=login">Đăng nhập</a>
            <?php endif; ?>
        </nav>
        <hr>
    </header>
</body>
</html>