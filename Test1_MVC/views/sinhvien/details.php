<div class="form-container">
    <h2 class="page-title">Chi tiết sinh viên</h2>
    <table class="table table-bordered" style="width: 50%; margin: auto; text-align: left;">
        <tr>
            <th>Mã SV:</th>
            <td><?= htmlspecialchars($sinhvien['MaSV']) ?></td>
        </tr>
        <tr>
            <th>Họ tên:</th>
            <td><?= htmlspecialchars($sinhvien['HoTen']) ?></td>
        </tr>
        <tr>
            <th>Giới tính:</th>
            <td><?= htmlspecialchars($sinhvien['GioiTinh']) ?></td>
        </tr>
        <tr>
            <th>Ngày sinh:</th>
            <td><?= htmlspecialchars($sinhvien['NgaySinh']) ?></td>
        </tr>
        <tr>
            <th>Hình:</th>
            <td>
                <img src="public/images/<?= htmlspecialchars($sinhvien['Hinh']) ?>" alt="Hình sinh viên" style="width: 100px; height: 100px; object-fit: cover;">
            </td>
        </tr>
        <tr>
            <th>Ngành:</th>
            <td><?= htmlspecialchars($sinhvien['TenNganh']) ?></td>
        </tr>
    </table>
    <br>
    <a href="index.php?controller=sinhvien&action=index" class="btn btn-secondary">Quay lại</a>
</div>
