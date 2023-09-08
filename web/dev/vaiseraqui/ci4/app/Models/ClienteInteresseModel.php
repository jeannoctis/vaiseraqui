<?php

namespace App\Models;

use CodeIgniter\Model;

class ClienteInteresseModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'cliente_interesse';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['clienteFK','categoriaFK'];
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
 