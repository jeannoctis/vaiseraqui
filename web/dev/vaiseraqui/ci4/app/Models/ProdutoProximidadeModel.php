<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoProximidadeModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'produto_proximidade';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['produtoFK', "proximidadeFK", 'proximidades', 'ordem'];
   protected $useTimestamps = true;
   protected $createdField = 'dtCriacao';
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [
      'proximidades' => 'required',
   ];
   protected $validationMessages = [
      'proximidades' => [
         'required' => 'Proximidade obrigatória'
      ],
   ];
   protected $skipValidation = false;
}
