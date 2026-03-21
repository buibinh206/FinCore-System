<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'         => (new HomeController)->index(),
    'branches'  => (new BranchController)->index(),
    'branch-create' => (new BranchController)->create(),
    'branch-store' => (new BranchController)->store(),
    'branch-edit' => (new BranchController)->edit(),
    'branch-update' => (new BranchController)->update(),
    'branch-delete' => (new BranchController)->delete(),

    //employees
    'employees' => (new EmployeeController)->index(),
    'employee-create' => (new EmployeeController)->create(),
    'employee-store' => (new EmployeeController)->store(),
    'employee-edit' => (new EmployeeController)->edit(),
    'employee-update' => (new EmployeeController)->update(),
    'employee-delete' => (new EmployeeController)->delete(),

    default => die('Route không tồn tại'),
};
