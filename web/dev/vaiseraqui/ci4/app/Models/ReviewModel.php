<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'review';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['texto', 'autor', 'arquivo', 'servico', 'video', 'ordem',];
   protected $useTimestamps = true;
   protected $createdField = 'dtCriacao';
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [
      'autor' => 'required',
   ];
   protected $validationMessages = [
      'autor' => [
         'required' => 'Autor obrigatório'
      ]
   ];
   protected $skipValidation = false;
}
