<div class="form-container">
    <h2 class="page-title">Danh sách sinh viên</h2>
    <a href="index.php?controller=sinhvien&action=create" class="btn btn-primary">Thêm mới</a>
    <table class="table table-striped" id="student-table">
        <tr>
            <th>Mã SV</th><th>Họ tên</th><th>Giới tính</th><th>Ngày sinh</th><th>Hình</th><th>Hành động</th>
        </tr>
        <?php if (!empty($sinhviens)): ?>
            <?php foreach ($sinhviens as $sv): ?>
                <tr id="row-<?= htmlspecialchars($sv['MaSV']) ?>">
                    <td><?= htmlspecialchars($sv['MaSV']) ?></td>
                    <td><?= htmlspecialchars($sv['HoTen']) ?></td>
                    <td><?= htmlspecialchars($sv['GioiTinh']) ?></td>
                    <td><?= htmlspecialchars($sv['NgaySinh']) ?></td>
                    <td>
                        <img src="/ST4/Test1_MVC/public/images/<?= htmlspecialchars($sv['Hinh']) ?>" alt="Hình sinh viên" style="width: 50px; height: 50px; object-fit: cover;">
                    </td>
                    <td>
                        <a href="index.php?controller=sinhvien&action=details&MaSV=<?= htmlspecialchars($sv['MaSV']) ?>" class="btn">Xem</a>
                        <a href="index.php?controller=sinhvien&action=edit&MaSV=<?= htmlspecialchars($sv['MaSV']) ?>" class="btn">Sửa</a>
                        <a href="#" class="delete-btn btn" data-id="<?= htmlspecialchars($sv['MaSV']) ?>">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Không có dữ liệu sinh viên.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>

<script>
    $(document).on('click', '.delete-btn', function(e) {
        e.preventDefault();
        const maSV = $(this).data('id');
        if (confirm('Bạn có chắc chắn muốn xóa?')) {
            $.ajax({
                url: 'index.php?controller=sinhvien&action=delete',
                type: 'GET',
                data: { MaSV: maSV },
                success: function(response) {
                    $('#row-' + maSV).remove();
                    alert('Xóa thành công!');
                },
                error: function() {
                    alert('Có lỗi xảy ra!');
                }
            });
        }
    });
</script>
