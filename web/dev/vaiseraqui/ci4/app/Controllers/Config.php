<?php

namespace App\Controllers;

class Config extends BaseController
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session($config);
        helper(['encrypt', 'text']);
        $this->configModel = model('App\Models\ConfigModel', false);
        $this->tabela = "config";
        $this->session->set('menuAdmin', '100');
    }

    public function index()
    {

        if (isset($_POST['excluir'])) {
            foreach ($_POST['excluir'] as $exc) {
                $this->configModel->delete(['id' => $exc]);
            }
        }

        //   $builder->where("id !=", 1);
        //  $query = $builder->get();

        $data['lista'] = $this->configModel->findAll();

        $data['title'] = 'Configurações';
        $data['tabela'] = "config";

        echo view('templates/admin-header', $data);
        echo view("{$data["tabela"]}/index", $data);
        echo view('templates/admin-footer');
    }

    public function form()
    {
        $request = \Config\Services::request();

        helper('form');

        $data['title'] = 'Configurações';
        $data['tabela'] = 'config';
        $data['resultado'] = "";


        $id = decode($this->request->uri->getSegment(4));

        $data['qualPagina'] = $this->request->uri->getSegment(5);

        if ($data['qualPagina'] == 2) {
            $this->session->set('menuAdmin', '2');
        }
        if ($data['qualPagina'] == 2 && $id == 2) {
            $this->session->set('menuAdmin', '6');
        }

        $post = $request->getPost();

        if ($post) {

            if ($id) {
                $post["id"] = $id;
            }

            $nomeArquivo = "arquivo";

            $img = $this->request->getFile("arquivo");
            if ($img != NULL) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = date('Y-m-d') . $img->getRandomName();
                    $post["arquivo"] = $newName;
                    $img->move(PATHHOME . '/uploads/config/', $newName);
                }
            }

            $img = $this->request->getFile("icone1");

            if ($img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = date('Y-m-d') . arruma_url($img->getName()) . "." . $img->guessExtension();

                    $post["icone1"] = $newName;
                    $img->move(PATHHOME . "/uploads/{$data['tabela']}/", $newName);
                }
            }

            $img = $this->request->getFile("icone2");

            if ($img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = date('Y-m-d') . arruma_url($img->getName()) . "." . $img->guessExtension();

                    $post["icone2"] = $newName;
                    $img->move(PATHHOME . "/uploads/{$data['tabela']}/", $newName);
                }
            }

            $img = $this->request->getFile("icone3");

            if ($img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = date('Y-m-d') . arruma_url($img->getName()) . "." . $img->guessExtension();

                    $post["icone3"] = $newName;
                    $img->move(PATHHOME . "/uploads/{$data['tabela']}/", $newName);
                }
            }



            $data["salvou"] = $this->configModel->save($post);

            if (!$data["salvou"]) {
                $data["erros"] = $this->configModel->errors();
            }
        }

        if ($id) {
            $data["resultado"] = $this->configModel->find($id);
        }

        echo view('templates/admin-header', $data);
        echo view("{$data['tabela']}/form");
        echo view('templates/admin-footer');
    }

    //--------------------------------------------------------------------
}
