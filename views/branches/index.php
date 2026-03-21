<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách chi nhánh</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #f8fafc, #e9ecef);
        }

        .page-wrapper {
            padding: 40px 0;
        }

        .card-custom {
            border-radius: 20px;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .header-bar {
            padding: 20px 25px;
            border-bottom: 1px solid #eee;
        }

        .header-title {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .table th {
            font-weight: 600;
            background: #f8f9fa;
        }

        .btn-custom {
            border-radius: 10px;
            font-weight: 600;
        }

        .table td {
            vertical-align: middle;
        }

        .badge-id {
            background: #dee2e6;
            color: #333;
            font-weight: 600;
            padding: 6px 10px;
            border-radius: 8px;
        }

        .empty-state {
            padding: 40px;
            text-align: center;
            color: #6c757d;
        }
    </style>
</head>
<body>

<div class="container page-wrapper">
    <div class="card card-custom">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center header-bar">
            <div class="header-title">
                <i class="bi bi-building me-2"></i>Danh sách chi nhánh
            </div>

            <div>
                <a href="<?= url('') ?>" class="btn btn-secondary btn-custom me-2">
                    <i class="bi bi-house-door me-2"></i>Quay lại Dashboard
                </a>
                <a href="<?= url('branch-create') ?>" class="btn btn-success btn-custom">
                    <i class="bi bi-plus-circle me-2"></i>Thêm chi nhánh
                </a>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive p-3">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã</th>
                        <th>Tên chi nhánh</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>

                <?php if(!empty($branches)): ?>
                    <?php foreach($branches as $branch): ?>
                        <tr>
                            <td>
                                <span class="badge-id"><?= $branch['id'] ?></span>
                            </td>

                            <td>
                                <strong><?= htmlspecialchars($branch['branch_code']) ?></strong>
                            </td>

                            <td><?= htmlspecialchars($branch['branch_name']) ?></td>

                            <td><?= htmlspecialchars($branch['address']) ?></td>

                            <td><?= htmlspecialchars($branch['phone']) ?></td>

                            <td class="text-center">
                                <a href="<?= url('branch-edit', [$branch['id']]) ?>" 
                                   class="btn btn-sm btn-primary btn-custom me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <a href="<?= url('branch-delete', [$branch['id']]) ?>" 
                                   class="btn btn-sm btn-danger btn-custom"
                                   onclick="return confirm('Bạn có chắc muốn xóa chi nhánh này?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                <?php else: ?>
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                                Chưa có chi nhánh nào trong hệ thống
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>

                </tbody>
            </table>
        </div>

    </div>
</div>

</body>
</html>