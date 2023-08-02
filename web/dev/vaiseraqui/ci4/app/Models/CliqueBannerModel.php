<?php

namespace App\Models;

use CodeIgniter\Model;

class CliqueBannerModel extends Model {

  protected $DBGroup = 'default';
  protected $table = 'cliqueBanner';
  protected $primaryKey = 'id';
  protected $returnType = 'object';
  protected $useSoftDeletes = true;
  protected $allowedFields = ['bannerFK', 'ip'];
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
