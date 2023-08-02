<?php

namespace App\Models;

use CodeIgniter\Model;

class CliqueWhatsappModel extends Model {

  protected $DBGroup = 'default';
  protected $table = 'cliqueWhatsapp';
  protected $primaryKey = 'id';
  protected $returnType = 'object';
  protected $useSoftDeletes = true;
  protected $allowedFields = ['whatsappFK', 'ip'];
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
