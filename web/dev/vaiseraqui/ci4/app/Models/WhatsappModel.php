<?php

namespace App\Models;

use CodeIgniter\Model;

class WhatsappModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'whatsapp';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['titulo', 'telefone', 'categoria', 'arquivo', 'ordem'];
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
