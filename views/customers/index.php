<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách khách hàng</title>
</head>
<body>
    <h1>Danh sách khách hàng</h1>

    <a href="index.php?action=customer-create">+ Thêm khách hàng</a>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Mã KH</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>SĐT</th>
                <th>CCCD</th>
                <th>Email</th>
                <th>KYC</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($customers)): ?>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?= $customer['id'] ?></td>
                        <td><?= htmlspecialchars($customer['username'] ?? 'Chưa gắn user') ?></td>
                        <td><?= htmlspecialchars($customer['customer_code']) ?></td>
                        <td><?= htmlspecialchars($customer['full_name']) ?></td>
                        <td><?= htmlspecialchars($customer['date_of_birth']) ?></td>
                        <td><?= htmlspecialchars($customer['gender']) ?></td>
                        <td><?= htmlspecialchars($customer['phone']) ?></td>
                        <td><?= htmlspecialchars($customer['cccd']) ?></td>
                        <td><?= htmlspecialchars($customer['email']) ?></td>
                        <td><?= htmlspecialchars($customer['kyc_status']) ?></td>
                        <td>
                            <a href="index.php?action=customer-edit&id=<?= $customer['id'] ?>">Sửa</a>
                            |
                            <a href="index.php?action=customer-delete&id=<?= $customer['id'] ?>"
                               onclick="return confirm('Bạn có chắc muốn xóa không?')">
                                Xóa
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="11">Chưa có khách hàng nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>