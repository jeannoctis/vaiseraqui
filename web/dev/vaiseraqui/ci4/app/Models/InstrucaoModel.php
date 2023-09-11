<?php

namespace App\Models;

use CodeIgniter\Model;

class InstrucaoModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'instrucao';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['titulo', 'texto', 'ordem'];
   protected $useTimestamps = true;
   protected $createdField = 'dtCriacao';
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [
      'texto' => 'required',
   ];
   protected $validationMessages = [
      'texto' => [
         'required' => 'Texto obrigatório'
      ],
   ];
   protected $skipValidation = false;
}
