<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfigModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'config';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['nome', 'whatsapp', 'telefone','celular','email', 'public_recaptcha',
        'private_recaptcha','parcelasjuros','cidadeFK'];
    protected $useTimestamps = true;
    protected $createdField = 'dtCriacao';
    protected $updatedField = 'dtAlteracao';
    protected $deletedField = 'excluido';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

}
