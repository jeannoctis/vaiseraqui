<?php

namespace App\Models;

use CodeIgniter\Model;

class RedeSocialModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'rede_social';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['nome', 'link', 'ordem', 'imagem'];
    protected $useTimestamps = true;
    protected $createdField = 'dtCriacao';
    protected $updatedField = 'dtAlteracao';
    protected $deletedField = 'excluido';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
