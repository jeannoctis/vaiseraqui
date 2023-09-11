<?php

namespace App\Models;

use CodeIgniter\Model;

class PoliticaTermoTopicoModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'politicatermo_topico';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['texto', 'titulo', 'ordem',];
   protected $useTimestamps = true;
   protected $createdField = 'dtCriacao';
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [
      'titulo' => 'required',
      'texto' => 'required'
   ];
   protected $validationMessages = [
      
   ];
   protected $skipValidation = false;
}
