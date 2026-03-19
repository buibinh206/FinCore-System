<?php

require_once 'models/BranchModel.php';

class BranchController{
    protected $branchModel;

    public function __construct()
    {
        $this->branchModel = new BranchModel();
    }

    public function index(){
        $branches = $this->branchModel->getAll();
        require_once 'views/branches/index.php';
    }

    public function create(){
        require_once 'views/branches/create.php';
    }

    public function store(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'branch_code' => $_POST['branch_code'] ?? '',
                'branch_name' => $_POST['branch_name'] ?? '',
                'address'     => $_POST['address'] ?? '',
                'phone'       => $_POST['phone'] ?? ''
            ];

            $this->branchModel->insert($data);
            header('Location: index.php?controller=branch&action=index');
            exit;
        }
    }

    public function edit(){
        $id = $_GET['id'] ?? null;
        if(!$id){
            die('Thiếu ID chi nhánh');
        }

        $branch = $this->branchModel->findById($id);
        require_once 'views/branches/edit.php';
    }

    public function update(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'] ?? null;

            $data = [
                'branch_code' => $_POST['branch_code'] ?? '',
                'branch_name' => $_POST['branch_name'] ?? '',
                'address'     => $_POST['address'] ?? '',
                'phone'       => $_POST['phone'] ?? ''
            ];

            $this->branchModel->updateBranch($id, $data);
            header('Location: index.php?controller=branch&action=index');
            exit;
        }
    }

    public function delete(){
        $id = $_GET['id'] ?? null;
        if($id){
            $this->branchModel->deleteBranch($id);
        }
        header('Location: index.php?controller=branch&action=index');
        exit;
    }
}