<?php

namespace App\Models;

use CodeIgniter\Model;

class BannerModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'banner';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['titulo', 'descricao', 'arquivo', 'arquivo2', 'icone1', 'icone2', 'botao', 'ordem'];
    protected $useTimestamps = true;
    protected $createdField = 'dtCriacao';
    protected $updatedField = 'dtAlteracao';
    protected $deletedField = 'excluido';
    protected $validationRules = [
        'titulo' => 'required',
        'arquivo' => 'required',
    ];
    protected $validationMessages = [
        'titulo' => [
            'required' => 'Título obrigatório'
        ],
        'arquivo' => [
            'required' => 'Imagem obrigatória' // Não aparece mensagem
        ]
    ];
    protected $skipValidation = false;
}