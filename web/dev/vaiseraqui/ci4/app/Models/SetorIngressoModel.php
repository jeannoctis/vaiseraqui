<?php

namespace App\Models;

use CodeIgniter\Model;

class SetorIngressoModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'setor_ingresso';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['titulo', 'preco', 'setorFK', 'ordem'];
   protected $useTimestamps = true;
   protected $createdField = 'dtCriacao';
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [
      'titulo' => 'required',
      'preco' => 'required',
   ];
   protected $validationMessages = [
      'titulo' => [
         'required' => 'Título obrigatório'
      ],
      'preco' => [
         'required' => 'Preço obrigatório'
      ],
   ];
   protected $skipValidation = false;
}
