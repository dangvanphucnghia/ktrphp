<div class="form-container">
    <h2 class="page-title">Sửa thông tin sinh viên</h2>
    <form method="POST" action="index.php?controller=sinhvien&action=update" enctype="multipart/form-data" class="form-container">
        <input type="hidden" name="MaSV" value="<?= htmlspecialchars($sinhvien['MaSV']) ?>">
        <input type="hidden" name="HinhOld" value="<?= htmlspecialchars($sinhvien['Hinh']) ?>">

        <label class="form-label">Họ tên:</label><br>
        <input type="text" name="HoTen" value="<?= htmlspecialchars($sinhvien['HoTen']) ?>" class="form-input" required><br>

        <label class="form-label">Giới tính:</label><br>
        <select name="GioiTinh" class="form-select">
            <option value="Nam" <?= $sinhvien['GioiTinh'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
            <option value="Nữ" <?= $sinhvien['GioiTinh'] == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
        </select><br>

        <label class="form-label">Ngày sinh:</label><br>
        <input type="date" name="NgaySinh" value="<?= htmlspecialchars($sinhvien['NgaySinh']) ?>" class="form-input" required><br>

        <label class="form-label">Hình hiện tại:</label><br>
        <img src="/ST4/Test1_MVC/public/images/<?= htmlspecialchars($sinhvien['Hinh']) ?>" alt="Hình sinh viên" style="width: 100px; height: 100px; object-fit: cover;"><br><br>

        <label class="form-label">Hình mới:</label><br>
        <input type="file" name="Hinh" accept="image/*" class="form-input"><br>
        <small>Để trống nếu không muốn thay đổi hình.</small><br>

        <label class="form-label">Ngành:</label><br>
        <select name="MaNganh" class="form-select">
            <option value="CNTT" <?= $sinhvien['MaNganh'] == 'CNTT' ? 'selected' : '' ?>>Công nghệ thông tin</option>
            <option value="QTKD" <?= $sinhvien['MaNganh'] == 'QTKD' ? 'selected' : '' ?>>Quản trị kinh doanh</option>
        </select><br><br>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>