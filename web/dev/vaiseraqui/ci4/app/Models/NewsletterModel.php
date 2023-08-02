<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsletterModel extends Model
{
  protected $DBGroup = 'default';
  protected $table = 'newsletter';
  protected $primaryKey = 'id';
  protected $returnType = 'object';
  protected $useSoftDeletes = false;
  protected $allowedFields = ['nome', 'email'];
  protected $useTimestamps = true;
  protected $createdField = 'dtCriacao';
  protected $updatedField = 'dtAlteracao';
  protected $deletedField = 'excluido';
  protected $validationRules = [
    'email' => 'required',
    'email' => 'is_unique[newsletter.email,id,{id}]'
  ];
  protected $validationMessages = [
    'email' => [
      'is_unique' => 'E-mail já cadastrado.'
    ],
  ];
  protected $skipValidation = false;
}
