<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'auth_users';
    protected $primaryKey = 'auth_id_users';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['auth_key', 'username', 'password', 'email', 'last_login', 'status', 'created_at', 'updated_at', 'deleted_at'];

    protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    public function get($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->where('auth_id_users', $id)->findAll();
        }
    }
}
