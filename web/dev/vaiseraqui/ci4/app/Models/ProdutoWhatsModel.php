<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoWhatsModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'produto_whats';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['produtoFK', 'ip'];
    protected $useTimestamps = true;
    protected $createdField = 'dtCriacao';
    protected $updatedField = 'dtAlteracao';
    protected $deletedField = 'excluido';
    protected $validationRules = [];
    protected $validationMessages = [];      
    protected $skipValidation = false;

  public function contaClique($produtoFK){
    
 
   $save["produtoFK"] = $produtoFK;
    $save['ip'] = $_SERVER["REMOTE_ADDR"];  
     $this->save($save);
    }

}
