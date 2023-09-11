<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtigoModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'artigo';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['titulo', 'chamada', 'identificador', 'arquivo', 'texto', 'categoriaFK', 'destaque', 'ordem'];
   protected $useTimestamps = true;
   protected $createdField = 'dtCriacao';
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [
      'titulo' => 'required',
      'categoriaFK' => 'required',
   ];
   protected $validationMessages = [
      'titulo' => [
         'required' => 'Título obrigatório'
      ],
      'categoriaFK' => [
         'required' => 'Categoria obrigatória'
      ],
   ];
   protected $skipValidation = false;

   public function ordenar($get)
   {
      if (!$get['ordem'] || $get['ordem'] == "recentes") {         
         return $this->orderBy("id DESC");

      } else if ($get['ordem'] == "antigos") {
         return $this->orderBy("id ASC");

      } else if ($get['ordem'] == "maisvistos") {
         return $this->orderBy("ordem ASC, id DESC");
}
   }
}
