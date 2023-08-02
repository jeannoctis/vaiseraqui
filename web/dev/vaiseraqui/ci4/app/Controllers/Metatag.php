<?php

namespace App\Controllers;

class Metatag extends BaseController {

    public function __construct() {
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session($config);
        helper(['encrypt', 'text']);
        $this->metatagModel = model('App\Models\MetatagModel', false);
        $this->tabela = "metatag";
        $this->session->set('menuAdmin', '10');
    }

    public function index() {

        if (isset($_POST['excluir'])) {
            foreach ($_POST['excluir'] as $exc) {
                $this->metatagModel->delete(['id' => $exc]);
            }
        }

        //   $builder->where("id !=", 1);
        //  $query = $builder->get();

      $this->metatagModel->orderBy("id ASC");
        $data['lista'] = $this->metatagModel->findAll();

        $data['title'] = 'Metatags';
        $data['tabela'] = "metatag";

        echo view('templates/admin-header', $data);
        echo view("{$data["tabela"]}/index", $data);
        echo view('templates/admin-footer');
    }

    public function form() {
        $request = \Config\Services::request();

        helper('form');

        $data['title'] = 'Metatag';
        $data['tabela'] = 'metatag';
        $data['resultado'] = "";


        $id = decode($this->request->uri->getSegment(4));

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
                    $img->move(PATHHOME . '/uploads/metatag/', $newName);
                }
            }



            $data["salvou"] = $this->metatagModel->save($post);

            if (!$data["salvou"]) {
                $data["erros"] = $this->metatagModel->errors();
            }
        }

        if ($id) {
            $data["resultado"] = $this->metatagModel->find($id);
        }

        echo view('templates/admin-header', $data);
        echo view("{$data['tabela']}/form");
        echo view('templates/admin-footer');
    }

    //--------------------------------------------------------------------
}
