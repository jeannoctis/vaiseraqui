<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoFotoModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'produto_foto';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['arquivo', 'nome', 'ordem', 'produtoFK'];
    protected $useTimestamps = true;
    protected $createdField = 'dtCriacao';
    protected $updatedField = 'dtAlteracao';
    protected $deletedField = 'excluido';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

}
