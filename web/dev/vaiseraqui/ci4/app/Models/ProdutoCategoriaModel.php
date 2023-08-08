<?php

namespace App\Models;

use CodeIgniter\Model;

class PavimentoModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'pavimento';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['titulo', 'identificador', 'ordem'];
   protected $useTimestamps = true;
   protected $createdField = 'dtCriacao';
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [
      'titulo' => 'required',
      'identificador' => 'is_unique[pavimento.identificador,id,{id}]'
   ];
   protected $validationMessages = [
      'titulo' => [
         'required' => 'Título obrigatório'
      ],
      'identificador' => [
         'is_unique' => 'Pavimento com o mesmo nome já cadastrado'
      ],
   ];
   protected $skipValidation = false;
}
