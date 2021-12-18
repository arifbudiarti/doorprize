<?php

namespace App\Models;

use CodeIgniter\Model;

class DoorprizeModel extends Model
{
    protected $table = 'tc_doorprize';
    protected $primaryKey = 'tc_id_doorprize';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['mt_id_participant', 'event_id_prize', 'status', 'created_at', 'updated_at', 'deleted_at'];

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
            return $this->where('tc_id_doorprize', $id)->findAll();
        }
    }
}
