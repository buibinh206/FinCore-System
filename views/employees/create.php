<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm nhân viên</title>
</head>
<body>
    <h1>Thêm nhân viên</h1>

    <form action="<?= url('employee-store') ?>" method="POST">
        <div>
            <label>User staff</label><br>
            <select name="user_id" required>
                <option value="">-- Chọn user staff --</option>
                <?php foreach ($users as $user): ?>
                    <option value="<?= $user['id'] ?>">
                        <?= $user['id'] ?> - <?= htmlspecialchars($user['username']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>

        <div>
            <label>Chi nhánh</label><br>
            <select name="branch_id" required>
                <option value="">-- Chọn chi nhánh --</option>
                <?php foreach ($branches as $branch): ?>
                    <option value="<?= $branch['id'] ?>">
                        <?= htmlspecialchars($branch['branch_name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>

        <div>
            <label>Mã nhân viên</label><br>
            <input type="text" name="employee_code" required>
        </div>
        <br>

        <div>
            <label>Họ và tên</label><br>
            <input type="text" name="full_name" required>
        </div>
        <br>

        <div>
            <label>Chức vụ</label><br>
            <input type="text" name="position">
        </div>
        <br>

        <div>
            <label>Số điện thoại</label><br>
            <input type="text" name="phone">
        </div>
        <br>

        <div>
            <label>Email</label><br>
            <input type="email" name="email">
        </div>
        <br>

        <div>
            <label>Trạng thái</label><br>
            <select name="status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <br>

        <button type="submit">Lưu</button>
        <a href="<?= url('employees') ?>">Quay lại</a>
    </form>
</body>
</html>