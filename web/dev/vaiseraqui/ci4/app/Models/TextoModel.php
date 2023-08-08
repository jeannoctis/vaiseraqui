<?php

namespace App\Models;

use CodeIgniter\Model;

class TextoModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'texto';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'arquivo', 'subtitulo', 'titulo','descricao', 'video', 'ordem', 'texto', 'texto2', 'texto3','description', 'keywords', 'topicos', 'botao', 'link', 'arquivo2', 'arquivo3', 'arquivo4', 'arquivo5', 'arquivo6','icone1', 'icone2', 'numero1', 'numero2', 'extra1', 'extra2', 'extra3', 'extra4', 'extra5', 'extra6', 'destaque'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'dtCriacao';
    protected $updatedField = 'dtAlteracao';
    protected $deletedField = 'excluido';
    protected $validationRules = [
        'titulo' => 'required',
    ];
    protected $validationMessages = [
        'titulo' => [
            'required' => 'Título obrigatório'
        ]
    ];
    protected $skipValidation = false;
}
