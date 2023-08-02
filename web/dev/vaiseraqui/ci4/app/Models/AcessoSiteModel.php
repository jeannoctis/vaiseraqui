<?php

namespace App\Models;

use CodeIgniter\Model;

class AcessoSiteModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'acesso_site';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['ip'];
    protected $useTimestamps = true;
    protected $createdField = 'dtCriacao';
    protected $updatedField = 'dtAlteracao';
    protected $deletedField = 'excluido';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

}
