<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoPontoDeVendaModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'produto_pontodevenda';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['produtoFK', 'tipo', 'titulo', 'endereco', 'cep', 'cidade', 'ordem'];
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
