<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtigoBCategoriaTModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'artigo_bcategoria';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = \false;
   protected $allowedFields = ['artigoFK', 'bcategoriaFK'];
   protected $useTimestamps = true;
   protected $createdField = 'dtCriacao';
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [];
   protected $validationMessages = [];
   protected $skipValidation = false;
}
