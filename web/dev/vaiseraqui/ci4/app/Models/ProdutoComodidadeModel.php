<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoComodidadeModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'produto_comodidade';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['titulo', 'comodidades', 'produtoFK', 'ordem'];
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