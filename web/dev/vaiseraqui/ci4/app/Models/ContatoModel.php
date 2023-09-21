<?php

namespace App\Models;

use CodeIgniter\Model;

class ContatoModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'contato';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['nome', 'email', 'telefone', 'mensagem', 'prefContato', 'origem', 'plano', 'duracao', 'modeloAnuncio'];
    protected $useTimestamps = true;
    protected $createdField = 'dtCriacao';
    protected $updatedField = 'dtAlteracao';
    protected $deletedField = 'excluido';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
