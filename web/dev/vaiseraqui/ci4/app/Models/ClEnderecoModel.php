<?php

namespace App\Models;

use CodeIgniter\Model;

class ClEnderecoModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'cl_endereco';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['clienteFK', 'endereco', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'cep', 'ordem'];
   protected $useTimestamps = true;
   protected $createdField = 'dtCriacao';
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [
      'endereco' => 'required',
   ];
   protected $validationMessages = [
      'endereco' => [
         'required' => 'Endereço obrigatório'
      ],
   ];
   protected $skipValidation = false;
}