<?php

namespace App\Models;

use CodeIgniter\Model;

class EmailModel extends Model
{

  protected $DBGroup = 'default';
  protected $table = 'email';
  protected $primaryKey = 'id';
  protected $returnType = 'object';
  protected $useSoftDeletes = true;
  protected $allowedFields = ['nome', 'email'];
  protected $useTimestamps = true;
  protected $createdField = 'dtCriacao';
  protected $updatedField = 'dtAlteracao';
  protected $deletedField = 'excluido';
  protected $validationRules = [
    'email' => 'required',
  ];
  protected $validationMessages = [
    'email' => [
      'required' => 'E-mail obrigatório'
    ]
  ];
  protected $skipValidation = false;

  public function enviarEmail($dados)
  {
    $to = $dados["mailTo"];
    $subject = $dados["subject"];
    $message = $dados["message"];

    $email = \Config\Services::email();

    $email->setTo($to);
    $email->setFrom('site@projetosonlinearq.com.br', "Projetos Online Arq");

    $email->setSubject($subject);
    $email->setMessage($message);

    if ($dados["arquivoLink"]) {
      $email->attach($dados["arquivoLink"]);
    }

    if ($email->send()) {
      //  echo 'Email successfully sent';
      return true;
    } else {
      // $data = $email->printDebugger(['headers']);
      // echo "<pre>";
      // print_r($email->printDebugger());
      // echo "</pre>";
      return false;
    }
  }

  public function validarRecaptcha($token, $secret)
  {

    $ip = $_SERVER["REMOTE_ADDR"];

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$token}&remoteip={$ip}",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_POSTFIELDS => "",
      CURLOPT_HTTPHEADER => array(
        "Postman-Token: 07226bf6-7d2d-41fc-8218-ccbdbab4dbdd",
        "cache-control: no-cache"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      // echo "cURL Error #:" . $err;
    } else {
      //  echo $response;
      $retorno = json_decode($response);
    }

    //  $retorno->score = 0.8;

    if ($retorno->score < 0.7) {
      return FALSE; //$erro[] = "Falha na verificação do google recaptcha";
    } else {
      return TRUE;
    }
  }
}
