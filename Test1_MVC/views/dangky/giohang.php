<div class="form-container">
    <h2 class="page-title">Giỏ học phần đã đăng ký</h2>
    <?php if (empty($dsDangKy)): ?>
        <p class="text-center">Sinh viên chưa đăng ký học phần nào.</p>
    <?php else: ?>
        <form method="POST" action="index.php?controller=dangky&action=luuGioHang">
            <table class="table table-striped">
                <tr>
                    <th>Mã HP</th><th>Tên học phần</th><th>Số tín chỉ</th><th>Xóa</th>
                </tr>
                <?php foreach ($dsDangKy as $hp): ?>
                    <tr>
                        <td><?= htmlspecialchars($hp['MaHP']) ?></td>
                        <td><?= htmlspecialchars($hp['TenHP']) ?></td>
                        <td><?= htmlspecialchars($hp['SoTinChi']) ?></td>
                        <td>
                            <a href="index.php?controller=dangky&action=xoamon&MaSV=<?= htmlspecialchars($_SESSION['MaSV']) ?>&MaHP=<?= htmlspecialchars($hp['MaHP']) ?>" class="btn btn-danger" onclick="return confirm('Xóa học phần này?')">❌</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <br>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="index.php?controller=dangky&action=xoatatca&MaSV=<?= htmlspecialchars($_SESSION['MaSV']) ?>" class="btn btn-danger" onclick="return confirm('Xóa toàn bộ học phần đã đăng ký?')">🗑 Xóa tất cả</a>
        </form>
    <?php endif; ?>
</div>
