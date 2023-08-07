<?php

namespace App\Models;

use CodeIgniter\Model;

class PlanoModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'plano';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['titulo', 'detalhe', 'mensalidade', 'inclui', 'naoInclui', 'ordem',];
   protected $useTimestamps = true;
   protected $createdField = 'dtCriacao';
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [
      'titulo' => 'required',
      'mensalidade' => 'required',
   ];
   protected $validationMessages = [
      'autor' => [
         'required' => 'Título obrigatório'
      ],
      'mensalidade' => [
         'required' => 'Mensalidade obrigatória'
      ]
   ];
   protected $skipValidation = false;
}
