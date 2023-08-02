<?php

namespace App\Models;

use CodeIgniter\Model;

class TransacaoModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'transacao';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['pedidoFK', 'transacao_id', 'code', 'status', 'tipo'];
   protected $useTimestamps = true;
   protected $createdField = 'dtCriacao';
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [
      'pedidoFK' => 'required',
   ];
   protected $validationMessages = [
      'pedidoFK' => [
         'required' => 'Pedido Obrigatório'
      ]
   ];
   protected $skipValidation = false;
}
