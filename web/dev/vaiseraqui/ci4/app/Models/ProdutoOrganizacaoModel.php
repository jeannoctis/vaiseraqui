<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoOrganizacaoModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'produto_organizacao';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['produtoFK', 'titulo', 'endereco', 'site', 'cidade', 'ordem'];
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
