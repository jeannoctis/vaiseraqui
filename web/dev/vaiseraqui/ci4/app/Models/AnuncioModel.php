<?php

namespace App\Models;

use CodeIgniter\Model;

class AnuncioModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'anuncio';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['produtoFK', 'inicio', 'termino', 'tipo'];
   protected $useTimestamps = true;
   protected $createdField = 'dtCriacao';
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [];
   protected $validationMessages = [];
   protected $skipValidation = false;
}
