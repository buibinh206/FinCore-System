<?php

require_once 'models/BaseModel.php';

class CustomerModel extends BaseModel
{
    protected $table = 'customers';

    public function getAll()
    {
        $sql = "SELECT c.*, u.username
                FROM {$this->table} c
                LEFT JOIN users u ON c.user_id = u.id
                ORDER BY c.id DESC";

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
                    (user_id, customer_code, full_name, date_of_birth, gender, phone, cccd, email, address, kyc_status)
                VALUES
                    (:user_id, :customer_code, :full_name, :date_of_birth, :gender, :phone, :cccd, :email, :address, :kyc_status)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'user_id'       => $data['user_id'],
            'customer_code' => $data['customer_code'],
            'full_name'     => $data['full_name'],
            'date_of_birth' => $data['date_of_birth'],
            'gender'        => $data['gender'],
            'phone'         => $data['phone'],
            'cccd'          => $data['cccd'],
            'email'         => $data['email'],
            'address'       => $data['address'],
            'kyc_status'    => $data['kyc_status'],
        ]);
    }

    public function updateCustomer($id, $data)
    {
        $sql = "UPDATE {$this->table}
                SET user_id = :user_id,
                    customer_code = :customer_code,
                    full_name = :full_name,
                    date_of_birth = :date_of_birth,
                    gender = :gender,
                    phone = :phone,
                    cccd = :cccd,
                    email = :email,
                    address = :address,
                    kyc_status = :kyc_status
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'user_id'       => $data['user_id'],
            'customer_code' => $data['customer_code'],
            'full_name'     => $data['full_name'],
            'date_of_birth' => $data['date_of_birth'],
            'gender'        => $data['gender'],
            'phone'         => $data['phone'],
            'cccd'          => $data['cccd'],
            'email'         => $data['email'],
            'address'       => $data['address'],
            'kyc_status'    => $data['kyc_status'],
            'id'            => $id,
        ]);
    }

    public function deleteCustomer($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    public function getAllCustomerUsers()
    {
        $sql = "SELECT id, username
                FROM users
                WHERE role = 'customer'
                ORDER BY id DESC";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}