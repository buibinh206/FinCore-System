<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách nhân viên</title>
</head>
<body>
    <h1>Danh sách nhân viên</h1>

    <a href="<?= url('employee-create') ?>">+ Thêm nhân viên</a>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Mã NV</th>
                <th>Họ tên</th>
                <th>Chức vụ</th>
                <th>SĐT</th>
                <th>Email</th>
                <th>Chi nhánh</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($employees)): ?>
                <?php foreach ($employees as $employee): ?>
                    <tr>
                        <td><?= $employee['id'] ?></td>
                        <td><?= htmlspecialchars($employee['user_id']) ?></td>
                        <td><?= htmlspecialchars($employee['employee_code']) ?></td>
                        <td><?= htmlspecialchars($employee['full_name']) ?></td>
                        <td><?= htmlspecialchars($employee['position']) ?></td>
                        <td><?= htmlspecialchars($employee['phone']) ?></td>
                        <td><?= htmlspecialchars($employee['email']) ?></td>
                        <td><?= htmlspecialchars($employee['branch_name'] ?? 'Chưa có') ?></td>
                        <td><?= htmlspecialchars($employee['status']) ?></td>
                        <td>
                            <a href="<?= url('employee-edit', [$employee['id']]) ?>">Sửa</a>
                            |
                            <a href="<?= url('employee-delete', [$employee['id']]) ?>"
                               onclick="return confirm('Bạn có chắc muốn xóa không?')">
                                Xóa
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="10">Chưa có nhân viên nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>