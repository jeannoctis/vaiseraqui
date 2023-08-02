<?php

namespace App\Models;

use CodeIgniter\Model;

class MetatagModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'metatag';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['titulo', 'description', 'keywords'];
    protected $useTimestamps = true;
    protected $createdField = 'dtCriacao';
    protected $updatedField = 'dtAlteracao';
    protected $deletedField = 'excluido';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

}
