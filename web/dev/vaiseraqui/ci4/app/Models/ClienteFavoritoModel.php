<?php

namespace App\Models;

use CodeIgniter\Model;

class ClienteFavoritoModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'cliente_favorito';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['clienteFK','produtoFK'];
    protected $useTimestamps = true;
    protected $createdField = 'dtCriacao';
    protected $updatedField = 'dtAlteracao';
    protected $deletedField = 'excluido';
    protected $validationRules = [
        'clienteFK' => 'required',
    ];
    protected $validationMessages = [
        'clienteFK' => [
            'required' => 'Cliente obrigatório'
        ]
    ];
    protected $skipValidation = false;

}
 