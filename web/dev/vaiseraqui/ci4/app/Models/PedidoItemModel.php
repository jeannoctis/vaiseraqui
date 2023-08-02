<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoItemModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'pedido_item';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['pedidoFK', 'total', 'adicionalFK'];
    protected $useTimestamps = true;
    protected $createdField = 'dtCriacao';
    protected $updatedField = 'dtAlteracao';
    protected $deletedField = 'excluido';
    protected $validationRules = [
        'pedidoFK' => 'required',
    ];
    protected $validationMessages = [
        'pedidoFK' => [
            'required' => 'Pedido obrigatório'
        ]
    ];
    protected $skipValidation = false;
    
}
 