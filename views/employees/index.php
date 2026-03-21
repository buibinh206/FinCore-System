<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>

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
            padding: 40px 0;
        }

        .card-custom {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .header-bar {
            padding: 22px 25px;
            border-bottom: 1px solid #edf0f2;
            background: #fff;
        }

        .header-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #212529;
        }

        .header-subtitle {
            margin: 4px 0 0;
            color: #6c757d;
            font-size: 0.95rem;
        }

        .btn-custom {
            border-radius: 12px;
            font-weight: 600;
            padding: 10px 18px;
        }

        .table-wrap {
            padding: 18px;
            background: #fff;
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            background: #f8f9fa;
            font-weight: 700;
            color: #212529;
            white-space: nowrap;
        }

        .table td {
            vertical-align: middle;
        }

        .badge-id {
            display: inline-block;
            background: #e9ecef;
            color: #212529;
            font-weight: 700;
            border-radius: 10px;
            padding: 6px 10px;
            min-width: 44px;
            text-align: center;
        }

        .code-badge {
            display: inline-block;
            background: #eef4ff;
            color: #0d6efd;
            font-weight: 700;
            border-radius: 10px;
            padding: 6px 10px;
            white-space: nowrap;
        }

        .status-badge {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 999px;
            font-size: 0.85rem;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-active {
            background: #d1e7dd;
            color: #0f5132;
        }

        .status-inactive {
            background: #f8d7da;
            color: #842029;
        }

        .branch-badge {
            display: inline-block;
            background: #f1f3f5;
            color: #495057;
            border-radius: 10px;
            padding: 6px 10px;
            font-weight: 600;
        }

        .empty-state {
            text-align: center;
            padding: 50px 20px;
            color: #6c757d;
        }

        .empty-state i {
            font-size: 2.2rem;
            margin-bottom: 10px;
            display: block;
        }

        .action-btn {
            border-radius: 10px;
            font-weight: 600;
        }

        .name-cell {
            font-weight: 600;
            color: #212529;
        }

        .muted-text {
            color: #6c757d;
        }
    </style>
</head>
<body>

<div class="container page-wrapper">
    <div class="card card-custom">

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 header-bar">
            <div>
                <div class="header-title">
                    <i class="bi bi-people-fill me-2"></i>Danh sách nhân viên
                </div>
                <p class="header-subtitle mb-0">
                    Quản lý hồ sơ nhân viên trong hệ thống
                </p>
            </div>

            <div class="d-flex gap-2">
                <a href="<?= url('') ?>" class="btn btn-secondary btn-custom">
                    <i class="bi bi-house-door me-2"></i>Quay lại Dashboard
                </a>
                <a href="<?= url('employee-create') ?>" class="btn btn-success btn-custom">
                    <i class="bi bi-person-plus-fill me-2"></i>Thêm nhân viên
                </a>
            </div>
        </div>

        <div class="table-wrap">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
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
                            <th class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($employees)): ?>
                            <?php foreach ($employees as $employee): ?>
                                <tr>
                                    <td>
                                        <span class="badge-id"><?= $employee['id'] ?></span>
                                    </td>

                                    <td>
                                        <span class="badge-id"><?= htmlspecialchars($employee['user_id']) ?></span>
                                    </td>

                                    <td>
                                        <span class="code-badge">
                                            <?= htmlspecialchars($employee['employee_code']) ?>
                                        </span>
                                    </td>

                                    <td class="name-cell">
                                        <?= htmlspecialchars($employee['full_name']) ?>
                                    </td>

                                    <td>
                                        <?= !empty($employee['position']) 
                                            ? htmlspecialchars($employee['position']) 
                                            : '<span class="muted-text">Chưa cập nhật</span>' ?>
                                    </td>

                                    <td>
                                        <?= !empty($employee['phone']) 
                                            ? htmlspecialchars($employee['phone']) 
                                            : '<span class="muted-text">Chưa cập nhật</span>' ?>
                                    </td>

                                    <td>
                                        <?= !empty($employee['email']) 
                                            ? htmlspecialchars($employee['email']) 
                                            : '<span class="muted-text">Chưa cập nhật</span>' ?>
                                    </td>

                                    <td>
                                        <span class="branch-badge">
                                            <?= htmlspecialchars($employee['branch_name'] ?? 'Chưa có') ?>
                                        </span>
                                    </td>

                                    <td>
                                        <?php if (($employee['status'] ?? '') === 'active'): ?>
                                            <span class="status-badge status-active">Đang làm việc</span>
                                        <?php else: ?>
                                            <span class="status-badge status-inactive">Ngừng làm việc</span>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center">
                                        <a href="<?= url('employee-edit', [$employee['id']]) ?>" 
                                           class="btn btn-sm btn-primary action-btn me-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <a href="<?= url('employee-delete', [$employee['id']]) ?>"
                                           class="btn btn-sm btn-danger action-btn"
                                           onclick="return confirm('Bạn có chắc muốn xóa nhân viên này không?')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10">
                                    <div class="empty-state">
                                        <i class="bi bi-inbox"></i>
                                        Chưa có nhân viên nào trong hệ thống.
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>