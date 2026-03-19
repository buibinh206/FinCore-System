<?php

require_once 'models/BaseModel.php';

class BranchModel extends BaseModel{
    protected $table = 'branches';

    public function getAll(){
        $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id){
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data){
        $sql = "INSERT INTO {$this->table} (branch_code, branch_name, address, phone) VALUES (:branch_code, :branch_name, :address, :phone)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'branch_code' => $data['branch_code'],
            'branch_name' => $data['branch_name'],
            'address'     => $data['address'],
            'phone'       => $data['phone']
        ]);
    }

    public function updateBranch($id, $data){
        $sql = "UPDATE {$this->table} SET branch_code = :branch_code, branch_name = :branch_name, address = :address, phone = :phone WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'branch_code' => $data['branch_code'],
            'branch_name' => $data['branch_name'],
            'address'     => $data['address'],
            'phone'       => $data['phone'],
            'id'          => $id
        ]);
    }

    public function deleteBranch($id){
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}