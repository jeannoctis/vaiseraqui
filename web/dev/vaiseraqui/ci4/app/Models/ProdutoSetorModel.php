<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoSetorModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'produto_setor';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['setor', 'produtoFK', 'ordem'];
   protected $useTimestamps = true;
   protected $createdField = 'dtCriacao';
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [
      'setor' => 'required',
   ];
   protected $validationMessages = [
      'setor' => [
         'required' => 'Categoria obrigatória'
      ],
   ];
   protected $skipValidation = false;
}
