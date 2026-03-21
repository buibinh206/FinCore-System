<?php

require_once 'models/BaseModel.php';

class EmployeeModel extends BaseModel
{
    protected $table = 'employees';

    public function getAll()
    {
        $sql = "SELECT e.*, b.branch_name
                FROM {$this->table} e
                LEFT JOIN branches b ON e.branch_id = b.id
                ORDER BY e.id DESC";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        $sql = "INSERT INTO {$this->table}
                    (user_id, branch_id, employee_code, full_name, position, phone, email, status)
                VALUES
                    (:user_id, :branch_id, :employee_code, :full_name, :position, :phone, :email, :status)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'user_id'       => $data['user_id'],
            'branch_id'     => $data['branch_id'],
            'employee_code' => $data['employee_code'],
            'full_name'     => $data['full_name'],
            'position'      => $data['position'],
            'phone'         => $data['phone'],
            'email'         => $data['email'],
            'status'        => $data['status'],
        ]);
    }

    public function updateEmployee($id, $data)
    {
        $sql = "UPDATE {$this->table}
                SET user_id = :user_id,
                    branch_id = :branch_id,
                    employee_code = :employee_code,
                    full_name = :full_name,
                    position = :position,
                    phone = :phone,
                    email = :email,
                    status = :status
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'user_id'       => $data['user_id'],
            'branch_id'     => $data['branch_id'],
            'employee_code' => $data['employee_code'],
            'full_name'     => $data['full_name'],
            'position'      => $data['position'],
            'phone'         => $data['phone'],
            'email'         => $data['email'],
            'status'        => $data['status'],
            'id'            => $id,
        ]);
    }

    public function deleteEmployee($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    public function getAllBranches()
    {
        $sql = "SELECT id, branch_name FROM branches ORDER BY id DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllUsers()
    {
        $sql = "SELECT id, username FROM users WHERE role = 'staff' ORDER BY id DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}