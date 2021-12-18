<?php

namespace App\Models;

use CodeIgniter\Model;

class EventListModel extends Model
{
    protected $table = 'event_list';
    protected $primaryKey = 'event_id_list';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['event_code', 'name', 'date', 'status', 'created_at', 'updated_at', 'deleted_at'];

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
            return $this->where('event_id_list', $id)->findAll();
        }
    }
}
