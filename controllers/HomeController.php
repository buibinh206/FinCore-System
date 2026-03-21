<?php

require_once 'models/BranchModel.php';
require_once 'models/EmployeeModel.php';

class HomeController
{
    public function index()
    {
        $branchModel = new BranchModel();
        $employeeModel = new EmployeeModel();

        // Lấy thống kê
        $totalBranches = count($branchModel->getAll());
        $totalEmployees = count($employeeModel->getAll());

        // Lấy dữ liệu gần đây
        $recentBranches = array_slice($branchModel->getAll(), 0, 5);
        $recentEmployees = array_slice($employeeModel->getAll(), 0, 5);

        require_once PATH_VIEW . 'dashboard.php';
    }
}