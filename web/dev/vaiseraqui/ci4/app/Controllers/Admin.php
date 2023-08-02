<?php

namespace App\Controllers;

class Admin extends BaseController
{
  public function __construct()
  {
    $this->db = \Config\Database::connect();
    $this->session = \Config\Services::session($config);
    helper('encrypt');
  }

  public function index()
  {

    if (isset($this->session->admin)) {
      helper("date");

      $request = \Config\Services::request();
      $cliqueBannerModel = model('App\Models\CliqueBannerModel', false);
      $cliqueWhatsappModel = model('App\Models\CliqueWhatsappModel', false);

      $acessoPaginaModel = model('App\Models\AcessoPaginaModel', false);
      $acessoSiteModel = model('App\Models\AcessoSiteModel', false);

      $contatoModel = model('App\Models\ContatoModel', false);

      $get = $request->getGet();

      if ($get['datas']) {
        $datas = explode(" - ", $get['datas']);

        if ($datas) {
          $get['dtIni'] = $datas[0];
          $get['dtFim'] = $datas[1];
        }
      }

      $time = strtotime(date("Y-m-d"));
      $final = date("d/m/Y", strtotime("- 30 days", $time));

      if (!$get["dtFim"]) {
        $get["dtFim"] = date("d/m/Y");
      }
      if (!$get["dtIni"]) {
        $get["dtIni"] = $final;
      }

      $data["get"] = $get;


      $dataIni = dataFormata($get['dtIni']);
      $dataFim = dataFormata($get['dtFim']);

      $acessoSiteModel->select('count(id) as contador');
      $acessoSiteModel->where("dtCriacao BETWEEN '{$dataIni} 00:00:00' AND '{$dataFim} 23:59:59' ");
      $data['acessos'] = $acessoSiteModel->find()[0];

      $acessoPaginaModel->select('COUNT(id) qtd, pagina');
      $acessoPaginaModel->groupBy("pagina");
      $acessoPaginaModel->orderBy("qtd DESC");
      $acessoPaginaModel->where("dtCriacao BETWEEN '{$dataIni} 00:00:00' AND '{$dataFim} 23:59:59' ");
      $data['acessosPagina'] = $acessoPaginaModel->findAll();

      if ($data['acessosPagina']) {
        foreach ($data['acessosPagina'] as $acc) {
          $data['qtdAcessos'] +=  $acc->qtd;
        }
      }

      $cliqueWhatsappModel->select("count(id) as contador");
      $cliqueWhatsappModel->where("dtCriacao BETWEEN '{$dataIni} 00:00:00' AND '{$dataFim} 23:59:59' ");
      $data['cliquesZap'] = $cliqueWhatsappModel->find()[0];

      $cliqueBannerModel->select("count(id) as contador");
      $cliqueBannerModel->where("dtCriacao BETWEEN '{$dataIni} 00:00:00' AND '{$dataFim} 23:59:59' ");
      $data['cliquesBanner'] = $cliqueBannerModel->find()[0];

      $contatoModel->select("count(id) as contador");
      $contatoModel->where("dtCriacao BETWEEN '{$dataIni} 00:00:00' AND '{$dataFim} 23:59:59 '");
      $data['contatos'] = $contatoModel->find()[0];

      $contatoModel->resetQuery();
      $contatoModel->orderBy("id DESC");
      $contatoModel->limit(5);
      $data['ultimosContatos'] = $contatoModel->findAll(5);

      echo view('templates/admin-header');
      echo view('admin/home', $data);
      echo view('templates/admin-footer');
    } else {
      helper('url');
      //redirect()->to('/admin/login');
      return redirect()->route('admin/login');
    }
  }

  public function logout()
  {
    unset($_SESSION['admin']);
    return redirect()->route('admin/login');
    // $this->load->helper('url');
    // redirect('/admin/login');
  }

  //--------------------------------------------------------------------
}
