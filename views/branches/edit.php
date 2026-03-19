<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa chi nhánh</title>
</head>
<body>
    <h1>Sửa chi nhánh</h1>
    <form action="index.php?controller=branch&action=update" method="post">
        <input type="hidden" name="id" value="<?= $branch['id'] ?>">
        <div>
            <label>>Mã chi nhánh</label>
            <input type="text" name="branch_code" value="<?= htmlspecialchars($branch['branch_code']) ?>" require>
        </div>
        <br>
        <div>
            <label>>Tên chi nhánh</label>
            <input type="text" name="branch_name" value="<?= htmlspecialchars($branch['branch_name']) ?>" require>
        </div>
        <br>
        <div>
            <label>>Địa chỉ</label>
            <textarea name="address"><?= htmlspecialchars($branch['address']) ?></textarea>
        </div>
        <br>
        <div>
            <label>>Số điện thoại</label>
            <input type="text" name="phone" value="<?= htmlspecialchars($branch['phone']) ?>">
        </div>
        <br>

        <button type="submit">Cập nhật</button>
        <a href="index.php?controller=branch&action=index">Quay lại</a>
    </form>
</body>
</html>