<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoVideoModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'produto_video';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['titulo', 'produtoFK', 'arquivo', 'ordem'];
   protected $useTimestamps = true;
   protected $createdField = 'dtCriacao';
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [
      
   ];
   protected $validationMessages = [
      
   ];
   protected $skipValidation = false;
}