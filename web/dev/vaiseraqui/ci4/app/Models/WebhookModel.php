<?php

namespace App\Models;

use CodeIgniter\Model;

class WebhookModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'webhook';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['mensagem','codigo'];
    protected $useTimestamps = true;
    protected $createdField = 'dtCriacao';
    protected $updatedField = 'dtAlteracao';
    protected $deletedField = 'excluido';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

}
