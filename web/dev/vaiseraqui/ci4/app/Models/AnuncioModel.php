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
   protected $allowedFields = ['tipoFK', 'produtoFK1', 'produtoFK2', 'produtoFK3', 'produtoFK4', 'produtoFK5', 'produtoFK6', 'arquivo', "arquivo2", 'tipo', 'link'];
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [];
   protected $validationMessages = [];
   protected $skipValidation = false;
}
