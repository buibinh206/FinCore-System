<?php

require_once 'models/CustomerModel.php';

class CustomerController
{
    private $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
    }

    public function index()
    {
        $customers = $this->customerModel->getAll();
        require_once 'views/customers/index.php';
    }

    public function create()
    {
        $users = $this->customerModel->getAllCustomerUsers();
        require_once 'views/customers/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'user_id'       => $_POST['user_id'] ?? null,
                'customer_code' => trim($_POST['customer_code'] ?? ''),
                'full_name'     => trim($_POST['full_name'] ?? ''),
                'date_of_birth' => $_POST['date_of_birth'] ?? null,
                'gender'        => $_POST['gender'] ?? null,
                'phone'         => trim($_POST['phone'] ?? ''),
                'cccd'          => trim($_POST['cccd'] ?? ''),
                'email'         => trim($_POST['email'] ?? ''),
                'address'       => trim($_POST['address'] ?? ''),
                'kyc_status'    => $_POST['kyc_status'] ?? 'pending',
            ];

            $this->customerModel->insert($data);

            header('Location: ' . url('customers'));
            exit;
        }
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            die('Thiếu ID khách hàng');
        }

        $customer = $this->customerModel->findById($id);

        if (!$customer) {
            die('Khách hàng không tồn tại');
        }

        $users = $this->customerModel->getAllCustomerUsers();

        require_once 'views/customers/edit.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;

            if (!$id) {
                die('Thiếu ID khách hàng');
            }

            $data = [
                'user_id'       => $_POST['user_id'] ?? null,
                'customer_code' => trim($_POST['customer_code'] ?? ''),
                'full_name'     => trim($_POST['full_name'] ?? ''),
                'date_of_birth' => $_POST['date_of_birth'] ?? null,
                'gender'        => $_POST['gender'] ?? null,
                'phone'         => trim($_POST['phone'] ?? ''),
                'cccd'          => trim($_POST['cccd'] ?? ''),
                'email'         => trim($_POST['email'] ?? ''),
                'address'       => trim($_POST['address'] ?? ''),
                'kyc_status'    => $_POST['kyc_status'] ?? 'pending',
            ];

            $this->customerModel->updateCustomer($id, $data);

            header('Location: ' . url('customers'));
            exit;
        }
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $this->customerModel->deleteCustomer($id);
        }

        header('Location: ' . url('customers'));
        exit;
    }
}