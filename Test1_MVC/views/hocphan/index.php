<div class="form-container">
    <h2 class="page-title">Danh sách học phần</h2>
    <table class="table table-striped">
        <tr>
            <th>Mã HP</th><th>Tên học phần</th><th>Số tín chỉ</th><th>Số lượng</th><th>Đăng ký</th>
        </tr>
        <?php if (!empty($hocphans)): ?>
            <?php foreach ($hocphans as $hp): ?>
                <tr>
                    <td><?= htmlspecialchars($hp['MaHP']) ?></td>
                    <td><?= htmlspecialchars($hp['TenHP']) ?></td>
                    <td><?= htmlspecialchars($hp['SoTinChi']) ?></td>
                    <td><?= htmlspecialchars($hp['SoLuong'] ?? '0') ?></td>
                    <td>
                        <a href="index.php?controller=dangky&action=index" class="btn btn-primary">Đăng ký</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Không có học phần nào.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
