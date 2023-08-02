<?php

namespace App\Models;

use CodeIgniter\Model;

class BCategoriaModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'bcategoria';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = false;
   protected $allowedFields = ['titulo', 'identificador', 'ordem'];
   protected $useTimestamps = true;
   protected $createdField = 'dtCriacao';
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [
      'titulo' => 'required',
   ];
   protected $validationMessages = [
      'titulo' => [
         'required' => 'Título obrigatório'
      ],
   ];
   protected $skipValidation = false;
}
