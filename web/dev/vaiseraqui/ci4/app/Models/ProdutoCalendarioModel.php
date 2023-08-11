<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoCalendarioModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'produto_calendario';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['date', 'produtoFK'];
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
