<?php

namespace App\Models;

use CodeIgniter\Model;

class AspectModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'aspecto';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['texto', 'titulo', 'arquivo', 'ordem',];
   protected $useTimestamps = true;
   protected $createdField = 'dtCriacao';
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [
      'titulo' => 'required',
      'texto' => 'required',
   ];
   protected $validationMessages = [
      'titulo' => [
         'required' => 'titulo obrigatório'
      ],
      'texto' => [
         'required' => 'texto obrigatório'
      ]
   ];
   protected $skipValidation = false;
}
