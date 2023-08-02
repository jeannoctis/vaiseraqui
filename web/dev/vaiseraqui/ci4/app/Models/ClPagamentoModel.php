<?php

namespace App\Models;

use CodeIgniter\Model;

class ClPagamentoModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'cl_pagamento';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['clienteFK', 'numero', 'bandeira', 'nome', 'cpf', 'validade', 'cvv'];
   protected $useTimestamps = true;
   protected $createdField = 'dtCriacao';
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [
      'numero' => 'required',
   ];
   protected $validationMessages = [
      'numero' => [
         'required' => 'Número obrigatório'
      ],
   ];
   protected $skipValidation = false;
}
