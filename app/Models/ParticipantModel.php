<?php

namespace App\Models;

use CodeIgniter\Model;

class ParticipantModel extends Model
{
    protected $table = 'mt_participant';
    protected $primaryKey = 'mt_id_participant';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['participant_type', 'name', 'mt_id_units', 'type', 'status', 'created_at', 'updated_at', 'deleted_at'];

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
            return $this->where('mt_id_participant', $id)->findAll();
        }
    }
}
