<div class="form-container">
    <h2 class="page-title">Thêm sinh viên mới</h2>
    <form method="POST" action="index.php?controller=sinhvien&action=store" enctype="multipart/form-data" class="form-container">
        <label class="form-label">Mã SV:</label><br>
        <input type="text" name="MaSV" class="form-input" required><br>

        <label class="form-label">Họ tên:</label><br>
        <input type="text" name="HoTen" class="form-input" required><br>

        <label class="form-label">Giới tính:</label><br>
        <select name="GioiTinh" class="form-select">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select><br>

        <label class="form-label">Ngày sinh:</label><br>
        <input type="date" name="NgaySinh" class="form-input"><br>

        <label class="form-label">Hình:</label><br>
        <input type="file" name="Hinh" class="form-input" accept="image/*" required><br>

        <label class="form-label">Ngành:</label><br>
        <select name="MaNganh" class="form-select">
            <option value="CNTT">Công nghệ thông tin</option>
            <option value="QTKD">Quản trị kinh doanh</option>
        </select><br><br>

        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>