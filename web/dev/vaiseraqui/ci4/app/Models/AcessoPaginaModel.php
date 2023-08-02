<?php

namespace App\Models;

use CodeIgniter\Model;

class AcessoPaginaModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'acesso_pagina';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['acessoFK','pagina'];
    protected $useTimestamps = true;
    protected $createdField = 'dtCriacao';
    protected $updatedField = 'dtAlteracao';
    protected $deletedField = 'excluido';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

}
