<?php

namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'log';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['tabela','mensagem','funcao','usuarioFK'];
    protected $useTimestamps = true;
    protected $createdField = 'dtCriacao';
    protected $updatedField = 'dtAlteracao';
    protected $deletedField = 'excluido';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

}
