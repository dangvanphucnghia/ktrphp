<div class="form-container">
    <h2 class="page-title">Đăng ký học phần</h2>
    <form method="POST" action="index.php?controller=dangky&action=luu" id="register-form" class="form-container">
        <label>Mã sinh viên:</label>
        <input type="text" name="MaSV" value="<?= htmlspecialchars($_SESSION['MaSV'] ?? '') ?>" readonly><br><br>

        <label>Chọn học phần:</label><br>
        <?php if (!empty($dsHocPhan)): ?>
            <?php foreach ($dsHocPhan as $hp): ?>
                <input type="checkbox" name="hocphan[]" value="<?= htmlspecialchars($hp['MaHP']) ?>" <?= isset($hp['SoLuong']) && $hp['SoLuong'] <= 0 ? 'disabled' : '' ?>>
                <?= htmlspecialchars($hp['TenHP']) ?> (<?= htmlspecialchars($hp['SoTinChi']) ?> tín chỉ, còn lại: <?= htmlspecialchars($hp['SoLuong'] ?? '0') ?>)<br>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Không có học phần nào để đăng ký.</p>
        <?php endif; ?>

        <br><button type="submit" class="btn btn-primary">Lưu đăng ký</button>
    </form>
    <br>
    <a href="index.php?controller=dangky&action=giohang">
        <button id="view-cart" class="btn btn-secondary">Xem học phần đã đăng ký</button>
    </a>
</div>

<script>
    $('#register-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert('Đăng ký thành công!');
            },
            error: function() {
                alert('Có lỗi xảy ra!');
            }
        });
    });

    $('#view-cart').on('click', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'index.php?controller=dangky&action=giohang',
            type: 'GET',
            success: function(response) {
                $('body').html(response);
            },
            error: function() {
                alert('Có lỗi xảy ra!');
            }
        });
    });
</script>
