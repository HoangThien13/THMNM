<?php include 'app/views/shares/header.php'; ?>

<h1>Thêm danh mục mới</h1>

<!-- Hiển thị thông báo lỗi nếu có -->
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<!-- Form thêm danh mục -->
<form method="POST" action="/Webbanhang/Category/add" onsubmit="return validateForm();">
    <div class="form-group">
        <label for="name">Tên danh mục:</label>
        <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
    </div>


    <button type="submit" class="btn btn-primary">Thêm danh mục</button>
</form>


<?php include 'app/views/shares/footer.php'; ?>
