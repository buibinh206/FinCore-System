<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FinCore System - <?= $title ?? 'Dashboard' ?></title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-xxl bg-light justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="<?= BASE_URL ?>"><b>Dashboard</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="<?= url('branches') ?>"><b>Chi nhánh</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="<?= url('employees') ?>"><b>Nhân viên</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="<?= url('customers') ?>"><b>Khách hàng</b></a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <h1 class="mt-3 mb-3"><?= $title ?? 'Home' ?></h1>

        <div class="row">
            <?php
            if (isset($view)) {
                require_once PATH_VIEW . $view . '.php';
            }
            ?>
        </div>
    </div>

</body>

</html>