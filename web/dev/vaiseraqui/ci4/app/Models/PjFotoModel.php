<?php

namespace App\Models;

use CodeIgniter\Model;

class PjFotoModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'pj_foto';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['projetoFK', 'arquivo', 'ordem'];
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