<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa chi nhánh</title>

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
            background: linear-gradient(135deg, #0d6efd, #0b5ed7);
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
        .form-control:focus {
            border-radius: 12px;
            box-shadow: none;
        }

        .input-group-text {
            border-radius: 12px 0 0 12px;
            background-color: #f8f9fa;
        }

        .form-control.with-icon {
            border-radius: 0 12px 12px 0;
        }

        .btn-custom {
            border-radius: 12px;
            padding: 10px 22px;
            font-weight: 600;
        }

        .section-title {
            font-size: 1rem;
            font-weight: 700;
            color: #0d6efd;
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
            <div class="col-lg-8 col-xl-7">
                <div class="card form-card">
                    
                    <div class="form-header">
                        <h1><i class="bi bi-building-gear me-2"></i>Sửa thông tin chi nhánh</h1>
                        <p>Cập nhật dữ liệu chi nhánh trong hệ thống quản lý ngân hàng</p>
                    </div>

                    <div class="form-body">
                        <form action="<?= url('branch-update') ?>" method="post">
                            <input type="hidden" name="id" value="<?= $branch['id'] ?>">

                            <div class="section-title">
                                <i class="bi bi-pencil-square me-2"></i>Thông tin chi nhánh
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Mã chi nhánh</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-upc-scan"></i>
                                    </span>
                                    <input 
                                        type="text" 
                                        name="branch_code" 
                                        class="form-control with-icon" 
                                        value="<?= htmlspecialchars($branch['branch_code']) ?>" 
                                        required
                                        placeholder="Nhập mã chi nhánh">
                                </div>
                                <div class="form-text note-text">
                                    Mã chi nhánh nên ngắn gọn, dễ nhận diện và không trùng lặp.
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Tên chi nhánh</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-bank"></i>
                                    </span>
                                    <input 
                                        type="text" 
                                        name="branch_name" 
                                        class="form-control with-icon" 
                                        value="<?= htmlspecialchars($branch['branch_name']) ?>" 
                                        required
                                        placeholder="Nhập tên chi nhánh">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Địa chỉ</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-geo-alt"></i>
                                    </span>
                                    <textarea 
                                        name="address" 
                                        class="form-control with-icon" 
                                        rows="4"
                                        placeholder="Nhập địa chỉ chi nhánh"><?= htmlspecialchars($branch['address']) ?></textarea>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Số điện thoại</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-telephone"></i>
                                    </span>
                                    <input 
                                        type="text" 
                                        name="phone" 
                                        class="form-control with-icon" 
                                        value="<?= htmlspecialchars($branch['phone']) ?>"
                                        placeholder="Nhập số điện thoại">
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-2 pt-2">
                                <button type="submit" class="btn btn-primary btn-custom">
                                    <i class="bi bi-check-circle me-2"></i>Cập nhật chi nhánh
                                </button>

                                <a href="<?= url('branches') ?>" class="btn btn-outline-secondary btn-custom">
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