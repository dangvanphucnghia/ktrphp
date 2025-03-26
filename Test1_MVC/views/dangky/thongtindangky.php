<div class="form-container">
    <h2 class="page-title">Thông tin Đăng ký</h2>
    <table class="table table-bordered">
        <tr>
            <th>Mã số sinh viên:</th>
            <td><?= htmlspecialchars($sinhvien['MaSV']) ?></td>
        </tr>
        <tr>
            <th>Họ tên sinh viên:</th>
            <td><?= htmlspecialchars($sinhvien['HoTen']) ?></td>
        </tr>
        <tr>
            <th>Ngày sinh:</th>
            <td><?= htmlspecialchars($sinhvien['NgaySinh']) ?></td>
        </tr>
        <tr>
            <th>Ngành học:</th>
            <td><?= htmlspecialchars($sinhvien['TenNganh']) ?></td>
        </tr>
        <tr>
            <th>Ngày đăng ký:</th>
            <td><?= date('Y-m-d') ?></td>
        </tr>
    </table>
    <br>
    <h3>Danh sách học phần đã đăng ký</h3>
    <?php if (empty($dsHocPhan)): ?>
        <p class="text-center">Không có học phần nào được đăng ký.</p>
    <?php else: ?>
        <table class="table table-striped">
            <tr>
                <th>Mã HP</th><th>Tên học phần</th><th>Số tín chỉ</th>
            </tr>
            <?php foreach ($dsHocPhan as $hp): ?>
                <tr>
                    <td><?= htmlspecialchars($hp['MaHP']) ?></td>
                    <td><?= htmlspecialchars($hp['TenHP']) ?></td>
                    <td><?= htmlspecialchars($hp['SoTinChi']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <br>
    <a href="index.php?controller=dangky&action=index" class="btn btn-secondary">Quay lại</a>
</div>
