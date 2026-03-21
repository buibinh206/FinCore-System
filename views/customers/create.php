<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm khách hàng</title>
</head>
<body>
    <h1>Thêm khách hàng</h1>

    <form action="index.php?action=customer-store" method="POST">
        <div>
            <label>User customer</label><br>
            <select name="user_id" required>
                <option value="">-- Chọn user customer --</option>
                <?php foreach ($users as $user): ?>
                    <option value="<?= $user['id'] ?>">
                        <?= $user['id'] ?> - <?= htmlspecialchars($user['username']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>

        <div>
            <label>Mã khách hàng</label><br>
            <input type="text" name="customer_code" required>
        </div>
        <br>

        <div>
            <label>Họ và tên</label><br>
            <input type="text" name="full_name" required>
        </div>
        <br>

        <div>
            <label>Ngày sinh</label><br>
            <input type="date" name="date_of_birth">
        </div>
        <br>

        <div>
            <label>Giới tính</label><br>
            <select name="gender">
                <option value="">-- Chọn giới tính --</option>
                <option value="male">Nam</option>
                <option value="female">Nữ</option>
                <option value="other">Khác</option>
            </select>
        </div>
        <br>

        <div>
            <label>Số điện thoại</label><br>
            <input type="text" name="phone">
        </div>
        <br>

        <div>
            <label>CCCD</label><br>
            <input type="text" name="cccd">
        </div>
        <br>

        <div>
            <label>Email</label><br>
            <input type="email" name="email">
        </div>
        <br>

        <div>
            <label>Địa chỉ</label><br>
            <textarea name="address"></textarea>
        </div>
        <br>

        <div>
            <label>Trạng thái KYC</label><br>
            <select name="kyc_status">
                <option value="pending">Pending</option>
                <option value="verified">Verified</option>
                <option value="rejected">Rejected</option>
            </select>
        </div>
        <br>

        <button type="submit">Lưu</button>
        <a href="index.php?action=customers">Quay lại</a>
    </form>
</body>
</html>