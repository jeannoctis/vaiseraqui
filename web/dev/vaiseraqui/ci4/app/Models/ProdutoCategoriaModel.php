<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoCategoriaModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'produto_categoria';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['titulo', 'identificador', 'ordem', 'tipoFK', 'arquivo', 'subtitulo', 'arquivo2'];
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
