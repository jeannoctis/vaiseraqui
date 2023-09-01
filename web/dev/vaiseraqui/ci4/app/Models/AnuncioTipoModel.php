<?php

namespace App\Models;

use CodeIgniter\Model;

class AnuncioTipoModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'anuncio_tipo';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useSoftDeletes = true;
   protected $allowedFields = ['tipoFK', 'produtoFK1', 'produtoFK2', 'produtoFK3', 'produtoFK4', 'produtoFK5', 'produtoFK6'];
   protected $useTimestamps = true;
   protected $createdField = 'dtCriacao';
   protected $updatedField = 'dtAlteracao';
   protected $deletedField = 'excluido';
   protected $validationRules = [];
   protected $validationMessages = [];
   protected $skipValidation = false;
}
