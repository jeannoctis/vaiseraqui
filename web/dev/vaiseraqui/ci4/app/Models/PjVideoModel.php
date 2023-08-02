<?php

namespace App\Models;

use CodeIgniter\Model;

class PjVideoModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'pj_video';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['titulo', 'projetoFK', 'video', 'ordem'];
   protected $useTimestamps = true;
   protected $createdField = 'dtCriacao';
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [
      'titulo' => 'required',
      'video' => 'required',
   ];
   protected $validationMessages = [
      'titulo' => [
         'required' => 'Título obrigatório'
      ],
      'video' => [
         'required' => 'Vídeo obrigatório'
      ]
   ];
   protected $skipValidation = false;
}