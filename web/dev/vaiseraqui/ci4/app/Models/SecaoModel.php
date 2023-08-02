<?php

namespace App\Models;

use CodeIgniter\Model;

class SecaoModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'secao';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = [];
    protected $useTimestamps = true;
    protected $createdField = 'dtCriacao';
    protected $updatedField = 'dtAlteracao';
    protected $deletedField = 'excluido';
    protected $validationRules = [
    ];
    protected $validationMessages = [       
    ];
    protected $skipValidation = false;

}
 