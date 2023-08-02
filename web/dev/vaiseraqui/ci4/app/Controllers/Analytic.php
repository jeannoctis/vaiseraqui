<?php

namespace App\Controllers;

class Analytic extends BaseController {

    public function __construct() {
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session($config);
        helper(['encrypt', 'text']);
        $this->analyticModel = model('App\Models\AnalyticModel', false);
        $this->tabela = "analytic";
        $this->session->set('menuAdmin', '10');
    }

    public function index() {

        if (isset($_POST['excluir'])) {
            foreach ($_POST['excluir'] as $exc) {
                $this->analyticModel->delete(['id' => $exc]);
            }
        }


        $data['lista'] = $this->analyticModel->findAll();

        $data['title'] = 'Analytic';
        $data['tabela'] = "analytic";
        $data["nomeModel"] = "AnalyticModel";

        echo view('templates/admin-header', $data);
        echo view("{$data["tabela"]}/index", $data);
        echo view('templates/admin-footer');
    }

    public function form() {
        $request = \Config\Services::request();

        helper('form');

        $data['title'] = 'Analytic';
        $data['tabela'] = 'analytic';
        $data['resultado'] = "";

        $id = decode($this->request->uri->getSegment(4));


        $post = $request->getPost();

        if ($post) {

            if ($id) {
                $post["id"] = $id;
            }

            $nomeArquivo = "arquivo";

            $img = $this->request->getFile("arquivo");

            if ($img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = date('Y-m-d') . $img->getRandomName();
                    $post["arquivo"] = $newName;
                    $img->move(PATHHOME . '/uploads/banner/', $newName);
                }
            }



            $data["salvou"] = $this->analyticModel->save($post);

            if (!$data["salvou"]) {
                $data["erros"] = $this->analyticModel->errors();
            }
        }

        if ($id) {
            $data["resultado"] = $this->analyticModel->find($id);
        }

        echo view('templates/admin-header', $data);
        echo view("{$data['tabela']}/form");
        echo view('templates/admin-footer');
    }

    //--------------------------------------------------------------------
}
