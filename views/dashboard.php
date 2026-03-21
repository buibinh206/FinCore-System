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
            position: fixed;
            width: 250px;
            z-index: 1000;
            transition: all 0.3s ease;
        }
        .sidebar.collapsed {
            width: 70px;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            transition: all 0.3s;
            padding: 12px 20px;
            margin: 5px 10px;
            border-radius: 8px;
        }
        .sidebar .nav-link:hover {
            color: white;
            background: rgba(255,255,255,0.1);
            transform: translateX(5px);
        }
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.2);
            color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
        }
        .sidebar.collapsed .nav-link span {
            display: none;
        }
        .sidebar.collapsed .nav-link i {
            margin-right: 0;
            text-align: center;
        }
        .sidebar-toggle {
            position: absolute;
            top: 15px;
            right: -15px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 1001;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        .main-content {
            margin-left: 250px;
            transition: margin-left 0.3s ease;
        }
        .sidebar .brand-logo {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
        }
        .sidebar .brand-logo h4 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }
        .sidebar .brand-logo .logo-icon {
            font-size: 2rem;
            margin-bottom: 10px;
            color: #fff;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0 !important;
            }
            .sidebar-toggle {
                display: block !important;
                left: 15px;
                right: auto;
            }
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
        <div class="col-auto px-0 sidebar" id="sidebar">
            <button class="sidebar-toggle" id="sidebarToggle">
                <i class="bi bi-chevron-left" id="toggleIcon"></i>
            </button>
            <div class="d-flex flex-column">
                <div class="brand-logo">
                    <div class="logo-icon">
                        <i class="bi bi-bank2"></i>
                    </div>
                    <h4>
                        <span>FinCore</span>
                    </h4>
                    <small class="text-light opacity-75">
                        <span>Banking System</span>
                    </small>
                </div>

                <nav class="nav nav-pills flex-column px-2">
                    <a class="nav-link active mb-2" href="<?= BASE_URL ?>" data-section="dashboard">
                        <i class="bi bi-house-door"></i>
                        <span>Dashboard</span>
                    </a>
                    <a class="nav-link mb-2" href="<?= url('branches') ?>" data-section="branches">
                        <i class="bi bi-building"></i>
                        <span>Quản lý Chi nhánh</span>
                    </a>
                    <a class="nav-link mb-2" href="<?= url('employees') ?>" data-section="employees">
                        <i class="bi bi-people"></i>
                        <span>Quản lý Nhân viên</span>
                    </a>
                    <hr class="my-3">
                    <a class="nav-link mb-2" href="#" data-section="reports">
                        <i class="bi bi-graph-up"></i>
                        <span>Báo cáo</span>
                    </a>
                    <a class="nav-link mb-2" href="#" data-section="settings">
                        <i class="bi bi-gear"></i>
                        <span>Cài đặt</span>
                    </a>
                    <a class="nav-link mb-2" href="#" data-section="profile">
                        <i class="bi bi-person"></i>
                        <span>Profile</span>
                    </a>
                    <a class="nav-link text-danger" href="#" data-section="logout">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Đăng xuất</span>
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col px-0 main-content" id="mainContent">
            <!-- Mobile Menu Button -->
            <button class="btn btn-primary d-md-none position-fixed" id="mobileMenuBtn" style="top: 15px; left: 15px; z-index: 1050;">
                <i class="bi bi-list"></i>
            </button>
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

<!-- Sidebar Toggle Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const toggleIcon = document.getElementById('toggleIcon');

        // Desktop sidebar toggle
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');

            if (sidebar.classList.contains('collapsed')) {
                toggleIcon.classList.remove('bi-chevron-left');
                toggleIcon.classList.add('bi-chevron-right');
            } else {
                toggleIcon.classList.remove('bi-chevron-right');
                toggleIcon.classList.add('bi-chevron-left');
            }
        });

        // Mobile menu toggle
        mobileMenuBtn.addEventListener('click', function() {
            sidebar.classList.toggle('show');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && !mobileMenuBtn.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });

        // Highlight active navigation
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('.nav-link');

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === currentPath || link.getAttribute('href') === window.location.href) {
                link.classList.add('active');
            }
        });
    });
</script>

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