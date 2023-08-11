<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoValorModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'produto_valor';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['titulo', 'valor', 'ordem', 'produtoFK'];
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
