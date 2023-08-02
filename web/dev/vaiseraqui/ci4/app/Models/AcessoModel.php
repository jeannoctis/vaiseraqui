<?php

namespace App\Models;

use CodeIgniter\Model;

class AcessoModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'acesso';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['pagina','usuarioFK','ip'];
    protected $useTimestamps = true;
    protected $createdField = 'dtCriacao';
    protected $updatedField = 'dtAlteracao';
    protected $deletedField = 'excluido';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

}
