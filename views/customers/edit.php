<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa khách hàng</title>
</head>
<body>
    <h1>Sửa khách hàng</h1>

    <form action="index.php?action=customer-update" method="POST">
        <input type="hidden" name="id" value="<?= $customer['id'] ?>">

        <div>
            <label>User customer</label><br>
            <select name="user_id" required>
                <option value="">-- Chọn user customer --</option>
                <?php foreach ($users as $user): ?>
                    <option value="<?= $user['id'] ?>"
                        <?= ($user['id'] == $customer['user_id']) ? 'selected' : '' ?>>
                        <?= $user['id'] ?> - <?= htmlspecialchars($user['username']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>

        <div>
            <label>Mã khách hàng</label><br>
            <input type="text" name="customer_code" value="<?= htmlspecialchars($customer['customer_code']) ?>" required>
        </div>
        <br>

        <div>
            <label>Họ và tên</label><br>
            <input type="text" name="full_name" value="<?= htmlspecialchars($customer['full_name']) ?>" required>
        </div>
        <br>

        <div>
            <label>Ngày sinh</label><br>
            <input type="date" name="date_of_birth" value="<?= htmlspecialchars($customer['date_of_birth']) ?>">
        </div>
        <br>

        <div>
            <label>Giới tính</label><br>
            <select name="gender">
                <option value="">-- Chọn giới tính --</option>
                <option value="male" <?= ($customer['gender'] == 'male') ? 'selected' : '' ?>>Nam</option>
                <option value="female" <?= ($customer['gender'] == 'female') ? 'selected' : '' ?>>Nữ</option>
                <option value="other" <?= ($customer['gender'] == 'other') ? 'selected' : '' ?>>Khác</option>
            </select>
        </div>
        <br>

        <div>
            <label>Số điện thoại</label><br>
            <input type="text" name="phone" value="<?= htmlspecialchars($customer['phone']) ?>">
        </div>
        <br>

        <div>
            <label>CCCD</label><br>
            <input type="text" name="cccd" value="<?= htmlspecialchars($customer['cccd']) ?>">
        </div>
        <br>

        <div>
            <label>Email</label><br>
            <input type="email" name="email" value="<?= htmlspecialchars($customer['email']) ?>">
        </div>
        <br>

        <div>
            <label>Địa chỉ</label><br>
            <textarea name="address"><?= htmlspecialchars($customer['address']) ?></textarea>
        </div>
        <br>

        <div>
            <label>Trạng thái KYC</label><br>
            <select name="kyc_status">
                <option value="pending" <?= ($customer['kyc_status'] == 'pending') ? 'selected' : '' ?>>Pending</option>
                <option value="verified" <?= ($customer['kyc_status'] == 'verified') ? 'selected' : '' ?>>Verified</option>
                <option value="rejected" <?= ($customer['kyc_status'] == 'rejected') ? 'selected' : '' ?>>Rejected</option>
            </select>
        </div>
        <br>

        <button type="submit">Cập nhật</button>
        <a href="index.php?action=customers">Quay lại</a>
    </form>
</body>
</html>