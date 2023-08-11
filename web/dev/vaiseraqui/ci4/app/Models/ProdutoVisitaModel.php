<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoVisitaModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'produto_visita';
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

  public function contaVisita($produtoFK){
    
    if(!$_SESSION['visita']) {
      $_SESSION['visita'] = array();
    }    
    
    if(in_array($produtoFK, $_SESSION['visita'])) {
  
    } else {
   $save["produtoFK"] = $produtoFK;
    $save['ip'] = $_SERVER["REMOTE_ADDR"];  
      $this->save($save);
    }
    $_SESSION['visita'][$produtoFK] = $produtoFK;    
  }  
}
