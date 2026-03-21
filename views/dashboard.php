<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinCore System - Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover {
            color: white;
            background: rgba(255,255,255,0.1);
            border-radius: 5px;
        }
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.2);
            color: white;
        }
        .stat-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        .bg-primary-custom { background: linear-gradient(45deg, #007bff, #0056b3); }
        .bg-success-custom { background: linear-gradient(45deg, #28a745, #1e7e34); }
        .bg-warning-custom { background: linear-gradient(45deg, #ffc107, #e0a800); }
        .bg-info-custom { background: linear-gradient(45deg, #17a2b8, #138496); }
        .recent-item {
            border-left: 4px solid #007bff;
            padding-left: 15px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 px-0 sidebar">
            <div class="d-flex flex-column p-3">
                <h4 class="text-center mb-4">
                    <i class="bi bi-bank me-2"></i>
                    FinCore
                </h4>

                <nav class="nav nav-pills flex-column">
                    <a class="nav-link active mb-2" href="<?= BASE_URL ?>">
                        <i class="bi bi-house-door me-2"></i>Dashboard
                    </a>
                    <a class="nav-link mb-2" href="<?= url('branches') ?>">
                        <i class="bi bi-building me-2"></i>Quản lý Chi nhánh
                    </a>
                    <a class="nav-link mb-2" href="<?= url('employees') ?>">
                        <i class="bi bi-people me-2"></i>Quản lý Nhân viên
                    </a>
                    <hr class="my-3">
                    <a class="nav-link" href="#">
                        <i class="bi bi-gear me-2"></i>Cài đặt
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 px-0">
            <!-- Header -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom px-4">
                <div class="d-flex justify-content-between w-100">
                    <h5 class="mb-0">Dashboard Tổng quan</h5>
                    <div class="d-flex align-items-center">
                        <span class="text-muted me-3">
                            <i class="bi bi-calendar me-1"></i>
                            <?= date('d/m/Y') ?>
                        </span>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle me-1"></i>Admin
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Content -->
            <div class="container-fluid p-4">
                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-3">
                        <div class="card stat-card">
                            <div class="card-body d-flex align-items-center">
                                <div class="stat-icon bg-primary-custom text-white me-3">
                                    <i class="bi bi-building"></i>
                                </div>
                                <div>
                                    <h3 class="mb-0"><?= $totalBranches ?? 0 ?></h3>
                                    <small class="text-muted">Chi nhánh</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card stat-card">
                            <div class="card-body d-flex align-items-center">
                                <div class="stat-icon bg-success-custom text-white me-3">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div>
                                    <h3 class="mb-0"><?= $totalEmployees ?? 0 ?></h3>
                                    <small class="text-muted">Nhân viên</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card stat-card">
                            <div class="card-body d-flex align-items-center">
                                <div class="stat-icon bg-warning-custom text-white me-3">
                                    <i class="bi bi-graph-up"></i>
                                </div>
                                <div>
                                    <h3 class="mb-0">85%</h3>
                                    <small class="text-muted">Hiệu suất</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card stat-card">
                            <div class="card-body d-flex align-items-center">
                                <div class="stat-icon bg-info-custom text-white me-3">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div>
                                    <h3 class="mb-0">2.5M</h3>
                                    <small class="text-muted">Doanh thu</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts and Recent Activity -->
                <div class="row">
                    <!-- Chart -->
                    <div class="col-md-8 mb-4">
                        <div class="card stat-card">
                            <div class="card-header bg-white">
                                <h6 class="mb-0"><i class="bi bi-bar-chart me-2"></i>Thống kê hàng tháng</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="monthlyChart" height="200"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="col-md-4 mb-4">
                        <div class="card stat-card">
                            <div class="card-header bg-white">
                                <h6 class="mb-0"><i class="bi bi-activity me-2"></i>Hoạt động gần đây</h6>
                            </div>
                            <div class="card-body">
                                <?php if (!empty($recentBranches)): ?>
                                    <?php foreach ($recentBranches as $branch): ?>
                                        <div class="recent-item">
                                            <small class="text-muted">Chi nhánh mới</small>
                                            <div class="fw-bold"><?= htmlspecialchars($branch['branch_name']) ?></div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <?php if (!empty($recentEmployees)): ?>
                                    <?php foreach ($recentEmployees as $employee): ?>
                                        <div class="recent-item">
                                            <small class="text-muted">Nhân viên mới</small>
                                            <div class="fw-bold"><?= htmlspecialchars($employee['full_name']) ?></div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                <?php if (empty($recentBranches) && empty($recentEmployees)): ?>
                                    <p class="text-muted mb-0">Chưa có hoạt động nào</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="row">
                    <div class="col-12">
                        <div class="card stat-card">
                            <div class="card-header bg-white">
                                <h6 class="mb-0"><i class="bi bi-lightning me-2"></i>Thao tác nhanh</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <a href="<?= url('branch-create') ?>" class="btn btn-primary w-100">
                                            <i class="bi bi-plus-circle me-2"></i>Thêm Chi nhánh
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="<?= url('employee-create') ?>" class="btn btn-success w-100">
                                            <i class="bi bi-person-plus me-2"></i>Thêm Nhân viên
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="<?= url('branches') ?>" class="btn btn-info w-100">
                                            <i class="bi bi-list me-2"></i>Xem Chi nhánh
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="<?= url('employees') ?>" class="btn btn-warning w-100">
                                            <i class="bi bi-people me-2"></i>Xem Nhân viên
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Chart.js Script -->
<script>
    // Sample chart data
    const ctx = document.getElementById('monthlyChart').getContext('2d');
    const monthlyChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6'],
            datasets: [{
                label: 'Doanh thu (VND)',
                data: [1200000, 1900000, 3000000, 5000000, 2000000, 3000000],
                borderColor: '#007bff',
                backgroundColor: 'rgba(0, 123, 255, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString('vi-VN') + ' VND';
                        }
                    }
                }
            }
        }
    });
</script>

</body>
</html>