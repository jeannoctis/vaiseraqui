<?php

namespace App\Models;

use CodeIgniter\Model;

class PjPlantaModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'pj_planta';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['arquivo', 'ordem', 'projetoFK'];
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