<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách chi nhánh</title>
</head>
<body>
    <h1>Danh sách chi nhánh</h1>
    <a href="index.php?controller=branch&action=create">+ Thêm chi nhánh</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã chi nhánh</th>
                <th>Tên chi nhánh</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($branches)): ?>
                <?php foreach($branches as $branch): ?>
                    <tr>
                        <td><?= $branch['id'] ?></td>
                        <td><?= htmlspecialchars($branch['branch_code']) ?></td>
                        <td><?= htmlspecialchars($branch['branch_name']) ?></td>
                        <td><?= htmlspecialchars($branch['address']) ?></td>
                        <td><?= htmlspecialchars($branch['phone']) ?></td>
                        <td>
                            <a href="index.php?controller=branch&action=edit&id=<?= $branch['id'] ?>">Sửa</a>
                            <a href="index.php?controller=branch&action=delete&id=<?= $branch['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                        </td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Chưa có chi nhánh nào</td>
                    </tr>
                <?php endif; ?>
        </tbody>
    </table>
</body>
</html>