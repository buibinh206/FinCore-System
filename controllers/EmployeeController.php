<?php

require_once 'models/EmployeeModel.php';

class EmployeeController
{
    private $employeeModel;

    public function __construct()
    {
        $this->employeeModel = new EmployeeModel();
    }

    public function index()
    {
        $employees = $this->employeeModel->getAll();
        require_once 'views/employees/index.php';
    }

    public function create()
    {
        $branches = $this->employeeModel->getAllBranches();
        $users = $this->employeeModel->getAllUsers();

        require_once 'views/employees/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'user_id'       => $_POST['user_id'] ?? null,
                'branch_id'     => $_POST['branch_id'] ?? null,
                'employee_code' => trim($_POST['employee_code'] ?? ''),
                'full_name'     => trim($_POST['full_name'] ?? ''),
                'position'      => trim($_POST['position'] ?? ''),
                'phone'         => trim($_POST['phone'] ?? ''),
                'email'         => trim($_POST['email'] ?? ''),
                'status'        => $_POST['status'] ?? 'active',
            ];

            $this->employeeModel->insert($data);

            header('Location: index.php?action=employees');
            exit;
        }
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            die('Thiếu ID nhân viên');
        }

        $employee = $this->employeeModel->findById($id);

        if (!$employee) {
            die('Nhân viên không tồn tại');
        }

        $branches = $this->employeeModel->getAllBranches();
        $users = $this->employeeModel->getAllUsers();

        require_once 'views/employees/edit.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;

            if (!$id) {
                die('Thiếu ID nhân viên');
            }

            $data = [
                'user_id'       => $_POST['user_id'] ?? null,
                'branch_id'     => $_POST['branch_id'] ?? null,
                'employee_code' => trim($_POST['employee_code'] ?? ''),
                'full_name'     => trim($_POST['full_name'] ?? ''),
                'position'      => trim($_POST['position'] ?? ''),
                'phone'         => trim($_POST['phone'] ?? ''),
                'email'         => trim($_POST['email'] ?? ''),
                'status'        => $_POST['status'] ?? 'active',
            ];

            $this->employeeModel->updateEmployee($id, $data);

            header('Location: index.php?action=employees');
            exit;
        }
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $this->employeeModel->deleteEmployee($id);
        }

        header('Location: index.php?action=employees');
        exit;
    }
}