<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'usuario';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['usuario', 'senha','secoes'];
    protected $useTimestamps = true;
    protected $createdField = 'dtCriacao';
    protected $updatedField = 'dtAlteracao';
    protected $deletedField = 'excluido';
    protected $validationRules = [
        'usuario' => 'required|alpha_numeric_space|min_length[3]',
    ];
    protected $validationMessages = [
        'usuario' => [
            'required' => 'Usuário obrigatório'
        ]
    ];
    protected $skipValidation = false;


}
