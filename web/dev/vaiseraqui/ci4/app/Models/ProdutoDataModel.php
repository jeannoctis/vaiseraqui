<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoDataModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'produto_data';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['data', 'horario', 'produtoFK'];
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
