<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nhân viên</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #f8fafc, #e9ecef);
            min-height: 100vh;
        }

        .page-wrapper {
            padding: 50px 0;
        }

        .form-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .form-header {
            background: linear-gradient(135deg, #198754, #157347);
            color: white;
            padding: 24px 30px;
        }

        .form-header h1 {
            font-size: 1.6rem;
            font-weight: 700;
            margin: 0;
        }

        .form-header p {
            margin: 6px 0 0;
            opacity: 0.9;
            font-size: 0.95rem;
        }

        .form-body {
            padding: 32px 30px;
            background: #fff;
        }

        .form-label {
            font-weight: 600;
            color: #212529;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select,
        .form-control:focus,
        .form-select:focus {
            border-radius: 12px;
            box-shadow: none;
        }

        .input-group-text {
            border-radius: 12px 0 0 12px;
            background-color: #f8f9fa;
        }

        .with-icon {
            border-radius: 0 12px 12px 0 !important;
        }

        .btn-custom {
            border-radius: 12px;
            padding: 10px 22px;
            font-weight: 600;
        }

        .section-title {
            font-size: 1rem;
            font-weight: 700;
            color: #198754;
            margin-bottom: 20px;
        }

        .note-text {
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container page-wrapper">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">
                <div class="card form-card">

                    <div class="form-header">
                        <h1><i class="bi bi-person-plus-fill me-2"></i>Thêm nhân viên mới</h1>
                        <p>Tạo hồ sơ nhân viên trong hệ thống quản lý ngân hàng</p>
                    </div>

                    <div class="form-body">
                        <form action="<?= url('employee-store') ?>" method="POST">

                            <div class="section-title">
                                <i class="bi bi-person-vcard me-2"></i>Thông tin nhân viên
                            </div>

                            <div class="row">
                                <!-- User staff -->
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">User staff</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-person-badge"></i>
                                        </span>
                                        <select name="user_id" class="form-select with-icon" required>
                                            <option value="">-- Chọn user staff --</option>
                                            <?php foreach ($users as $user): ?>
                                                <option value="<?= $user['id'] ?>">
                                                    <?= $user['id'] ?> - <?= htmlspecialchars($user['username']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- Chi nhánh -->
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Chi nhánh</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-building"></i>
                                        </span>
                                        <select name="branch_id" class="form-select with-icon" required>
                                            <option value="">-- Chọn chi nhánh --</option>
                                            <?php foreach ($branches as $branch): ?>
                                                <option value="<?= $branch['id'] ?>">
                                                    <?= htmlspecialchars($branch['branch_name']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- Mã nhân viên -->
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Mã nhân viên</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-upc-scan"></i>
                                        </span>
                                        <input type="text" name="employee_code" class="form-control with-icon" required placeholder="Nhập mã nhân viên">
                                    </div>
                                    <div class="form-text note-text">
                                        Ví dụ: NV001, EMP102, GDV015...
                                    </div>
                                </div>

                                <!-- Họ và tên -->
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Họ và tên</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-person"></i>
                                        </span>
                                        <input type="text" name="full_name" class="form-control with-icon" required placeholder="Nhập họ và tên">
                                    </div>
                                </div>

                                <!-- Chức vụ -->
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Chức vụ</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-briefcase"></i>
                                        </span>
                                        <input type="text" name="position" class="form-control with-icon" placeholder="Nhập chức vụ">
                                    </div>
                                </div>

                                <!-- Số điện thoại -->
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Số điện thoại</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-telephone"></i>
                                        </span>
                                        <input type="text" name="phone" class="form-control with-icon" placeholder="Nhập số điện thoại">
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-envelope"></i>
                                        </span>
                                        <input type="email" name="email" class="form-control with-icon" placeholder="Nhập email">
                                    </div>
                                </div>

                                <!-- Trạng thái -->
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Trạng thái</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-toggle-on"></i>
                                        </span>
                                        <select name="status" class="form-select with-icon">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-2 pt-2">
                                <button type="submit" class="btn btn-success btn-custom">
                                    <i class="bi bi-save me-2"></i>Lưu nhân viên
                                </button>

                                <a href="<?= url('employees') ?>" class="btn btn-outline-secondary btn-custom">
                                    <i class="bi bi-arrow-left me-2"></i>Quay lại danh sách
                                </a>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>