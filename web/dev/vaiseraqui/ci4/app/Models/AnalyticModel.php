<?php

namespace App\Models;

use CodeIgniter\Model;

class AnalyticModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'analytic';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['codigo'];
    protected $useTimestamps = true;
    protected $createdField = 'dtCriacao';
    protected $updatedField = 'dtAlteracao';
    protected $deletedField = 'excluido';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

}
