<?php

namespace App\Models;

use CodeIgniter\Model;

class PjAdicionalModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'pj_adicional';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['projetoFK', 'titulo', 'arquivo', 'pdf', 'texto', 'valor', 'ordem', 'impressao', 'comprimento', 'altura', 'largura', 'peso'];
   protected $useTimestamps = true;
   protected $createdField = 'dtCriacao';
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [];
   protected $validationMessages = [];
   protected $skipValidation = false;
}
