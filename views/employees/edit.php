<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa nhân viên</title>
</head>
<body>
    <h1>Sửa nhân viên</h1>

    <form action="index.php?action=employee-update" method="POST">
        <input type="hidden" name="id" value="<?= $employee['id'] ?>">

        <div>
            <label>User staff</label><br>
            <select name="user_id" required>
                <option value="">-- Chọn user staff --</option>
                <?php foreach ($users as $user): ?>
                    <option value="<?= $user['id'] ?>"
                        <?= ($user['id'] == $employee['user_id']) ? 'selected' : '' ?>>
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
                    <option value="<?= $branch['id'] ?>"
                        <?= ($branch['id'] == $employee['branch_id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($branch['branch_name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>

        <div>
            <label>Mã nhân viên</label><br>
            <input type="text" name="employee_code" value="<?= htmlspecialchars($employee['employee_code']) ?>" required>
        </div>
        <br>

        <div>
            <label>Họ và tên</label><br>
            <input type="text" name="full_name" value="<?= htmlspecialchars($employee['full_name']) ?>" required>
        </div>
        <br>

        <div>
            <label>Chức vụ</label><br>
            <input type="text" name="position" value="<?= htmlspecialchars($employee['position']) ?>">
        </div>
        <br>

        <div>
            <label>Số điện thoại</label><br>
            <input type="text" name="phone" value="<?= htmlspecialchars($employee['phone']) ?>">
        </div>
        <br>

        <div>
            <label>Email</label><br>
            <input type="email" name="email" value="<?= htmlspecialchars($employee['email']) ?>">
        </div>
        <br>

        <div>
            <label>Trạng thái</label><br>
            <select name="status">
                <option value="active" <?= ($employee['status'] == 'active') ? 'selected' : '' ?>>Active</option>
                <option value="inactive" <?= ($employee['status'] == 'inactive') ? 'selected' : '' ?>>Inactive</option>
            </select>
        </div>
        <br>

        <button type="submit">Cập nhật</button>
        <a href="index.php?action=employees">Quay lại</a>
    </form>
</body>
</html>