<?php

namespace App\Controllers;

class Projeto extends BaseController {

    public function __construct() {
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session($config);
        helper(['encrypt', 'text']);

        $this->model = model('App\Models\ProjetoModel', false);
        $this->pjFotoModel = model('App\Models\PjFotoModel', false);
        $this->pjPlantaModel = model('App\Models\PjPlantaModel', false);
        $this->pjVideoModel = model('App\Models\PjVideoModel', false);
        $this->pjAdicionalModel = model('App\Models\PjAdicionalModel', false);

        $this->tabela = "projeto";
        $this->session->set('menuAdmin', '4');

        $request = request();
        $data['get'] = $request->getGet();
    }

    public function index() {
        \helper('url');
        if (isset($_POST['excluir'])) {
            foreach ($_POST['excluir'] as $exc) {
                $data['excluiu'] = $this->model->delete(['id' => $exc]);
            }
        } else if ($_POST['nexc']) {
            $data['naoExc'] = "Selecione 1 ou mais itens para Excluir";
        }

        $this->model->orderBy("ordem ASC");

        $data['projetos'] = $this->model->findAll();

        $data['title'] = 'Projetos';
        $data['tabela'] = $this->tabela;
        $data["nomeModel"] = "ProjetoModel";

        echo view('templates/admin-header', $data);
        echo view("{$data["tabela"]}/index", $data);
        echo view('templates/admin-footer');
    }

    public function form() {
        helper('form');
        helper('url');

        $request = request();
        $post = $request->getPost();
        $id = decode($this->request->uri->getSegment(4));

        $this->pavimentoModel = \model("App\Models\PavimentoModel", false);
        $data['pavimentos'] = $this->pavimentoModel->orderBy("ordem ASC, id DESC")->findAll();

        $data['title'] = 'Projeto';
        $data['tabela'] = $this->tabela;

        if ($post) {

            $post['incluso'] = $post['inclusoTopicos'][0];
            $post['valor'] = \str_replace(['.', ','], ['', '.'], $post['valor']);
            $post['impressao'] = \str_replace(['.', ','], ['', '.'], $post['impressao']);
            $post['dimensoes'] = \str_replace(' ', '', $post['dimensoes']);
            $post['loteminimo'] = \str_replace(' ', '', $post['loteminimo']);

            if (isset($post['apagararquivo'])) {
                $post['arquivo'] = NULL;
            }
            if (isset($post['apagarpdf'])) {
                $post['pdf'] = NULL;
            }
            $img = $this->request->getFile("arquivo");
            if ($img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = date('Y-m-d') . $img->getRandomName();
                    $post["arquivo"] = $newName;
                    $img->move(PATHHOME . "/uploads/{$data['tabela']}/", $newName);
                    try {
                        echo View('templates/tinypng');

                        $upload_path = "uploads/{$data['tabela']}/";
                        $upload_path_root = PATHHOME . $upload_path;

                        $file_name = $img->getName();
                        $file_path = $upload_path_root . "/" . $file_name;

                        $tinyfile = \Tinify\fromFile($file_path);
                        $tinyfile->toFile($file_path);

                        $img = imagecreatefromstring(file_get_contents(PATHSITE . "uploads/{$data['tabela']}/" . $newName));
                        imagepalettetotruecolor($img);
                        imagealphablending($img, true);
                        imagesavealpha($img, true);
                        imagewebp($img, PATHHOME . "uploads/{$data["tabela"]}/{$newName}.webp", 60);
                        imagedestroy($img);
                    } catch (\Tinify\ClientException $e) {
                        
                    }
                }
            }
            $file = $this->request->getFile("pdf");
            if ($file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = date('Y-m-d') . $file->getRandomName();
                    $post["pdf"] = $newName;
                    $file->move(PATHHOME . "/uploads/{$data['tabela']}/", $newName);
                    try {
                        echo View('templates/tinypng');

                        $upload_path = "uploads/{$data['tabela']}/";
                        $upload_path_root = PATHHOME . $upload_path;

                        $file_name = $file->getName();
                        $file_path = $upload_path_root . "/" . $file_name;

                        $tinyfile = \Tinify\fromFile($file_path);
                        $tinyfile->toFile($file_path);

                        $file = imagecreatefromstring(file_get_contents(PATHSITE . "uploads/{$data['tabela']}/" . $newName));
                        imagepalettetotruecolor($file);
                        imagealphablending($file, true);
                        imagesavealpha($file, true);
                        imagewebp($file, PATHHOME . "uploads/{$data["tabela"]}/{$newName}.webp", 60);
                        imagedestroy($file);
                    } catch (\Tinify\ClientException $e) {
                        
                    }
                }
            }

            if ($id) {
                $post["id"] = $id;
                $data['salvou'] = $this->model->save($post);
            } else {
                $post['identificador'] = arruma_url($post['titulo']);
                $data['salvou'] = $this->model->insert($post);
            }

            $data["erros"] = $this->model->errors();
        }

        if ($id) {
            $data["resultado"] = $this->model->find($id);
        }

        echo view('templates/admin-header', $data);
        echo view("{$data['tabela']}/form");
        echo view('templates/admin-footer');
    }

    public function pjFotos() {
        if (isset($_POST['excluir'])) {
            foreach ($_POST['excluir'] as $exc) {
                $data['excluiu'] = $this->pjFotoModel->delete(['id' => $exc]);
            }
        } else if ($_POST['naoExc']) {
            $data['naoExc'] = "Selecione 1 ou mais itens para Excluir";
        }
        $request = request();
        $data['get'] = $request->getGet();
        $idProjeto = decode($this->request->uri->getSegment(4));

        $this->pjFotoModel->where('projetoFK', $idProjeto);
        $this->pjFotoModel->orderBy("ordem ASC");
        $data['fotos'] = $this->pjFotoModel->findAll();
        $data['projetoAtual'] = $this->model->find($idProjeto);

        $data['idProjeto'] = $idProjeto;

        $data['title'] = 'Fotos Projeto';
        $data['view'] = 'pjFotos';
        $data['tabela'] = 'pj_foto';
        $data['tabelaFK'] = $this->tabela;
        $data['tabelaFKF'] = 'pjFoto';
        $data['nomeModel'] = 'PjFotoModel';

        echo view('templates/admin-header', $data);
        echo view("{$data['tabelaFK']}/{$data['view']}", $data);
        echo view('templates/admin-footer');
    }

    public function pjFoto() {
        $idProjeto = decode($this->request->uri->getSegment(4));
        $idFoto = decode($this->request->uri->getSegment(5));

        if (isset($_POST['excluir'])) {
            foreach ($_POST['excluir'] as $exc) {
                $data['excluiu'] = $this->pjFotoModel->delete(['id' => $exc]);
            }
        }

        $data['title'] = 'Foto Projeto';
        $data['view'] = "pjFoto";
        $data['tabela'] = 'pj_foto';
        $data['tabelaFK'] = $this->tabela;
        $data['tabelaFK2'] = 'pjFotos';
        $data["nomeModel"] = "PjFotoModel";
        $data['idProjeto'] = $idProjeto;
        $data['idFoto'] = $idFoto;

        $request = request();
        $post = $request->getPost();
        $data['get'] = $request->getGet();
        
        if ($post) {

            $post['projetoFK'] = $idProjeto;

            if ($idFoto) {

                $img = $this->request->getFile("arquivo");
                if ($img) {
                    if ($img->isValid() && !$img->hasMoved()) {
                        $newName = date('Y-m-d') . $img->getRandomName();
                        $post["arquivo"] = $newName;
                        $img->move(PATHHOME . "/uploads/{$data['tabela']}/", $newName);
                        try {
                            echo View('templates/tinypng');

                            $upload_path = "uploads/{$data['tabela']}/";
                            $upload_path_root = PATHHOME . $upload_path;

                            $file_name = $img->getName();
                            $file_path = $upload_path_root . "/" . $file_name;

                            $tinyfile = \Tinify\fromFile($file_path);
                            $tinyfile->toFile($file_path);

                            $img = imagecreatefromstring(file_get_contents(PATHSITE . "uploads/{$data['tabela']}/" . $newName));
                            imagepalettetotruecolor($img);
                            imagealphablending($img, true);
                            imagesavealpha($img, true);
                            imagewebp($img, PATHHOME . "uploads/{$data["tabela"]}/{$newName}.webp", 60);
                            imagedestroy($img);
                        } catch (\Tinify\ClientException $e) {
                            
                        }
                    }
                }

                $post["id"] = $idFoto;
                $data["salvou"] = $this->pjFotoModel->save($post);
            } else {

                if ($this->request->getFileMultiple('arquivo')) {

                    echo View('templates/tinypng');

                    foreach ($this->request->getFileMultiple('arquivo') as $img) {

                        if ($img->isValid() && !$img->hasMoved()) {

                            $newName = date('Y-m-d') . $img->getRandomName();
                            $post["arquivo"] = $newName;
                            $img->move(PATHHOME . "/uploads/{$data['tabela']}/", $newName);
                            try {
                                echo View('templates/tinypng');

                                $upload_path = "uploads/{$data['tabela']}/";
                                $upload_path_root = PATHHOME . $upload_path;

                                $file_name = $img->getName();
                                $file_path = $upload_path_root . "/" . $file_name;

                                $tinyfile = \Tinify\fromFile($file_path);
                                $tinyfile->toFile($file_path);

                                $img = imagecreatefromstring(file_get_contents(PATHSITE . "uploads/{$data['tabela']}/" . $newName));
                                imagepalettetotruecolor($img);
                                imagealphablending($img, true);
                                imagesavealpha($img, true);
                                imagewebp($img, PATHHOME . "uploads/{$data["tabela"]}/{$newName}.webp", 60);
                                imagedestroy($img);
                            } catch (\Tinify\ClientException $e) {
                                
                            }
                        }

                        $data["salvou"] = $this->pjFotoModel->insert($post);
                    }
                }
            }

            $data["erros"] = $this->pjFotoModel->errors();
        }

        $data['projetoAtual'] = $this->model->find($idProjeto);
        $data['foto'] = $this->pjFotoModel->find($idFoto);

        echo view('templates/admin-header', $data);
        echo view("{$data['tabelaFK']}/{$data['view']}", $data);
        echo view('templates/admin-footer');
    }

    public function pjPlantas() {
        if (isset($_POST['excluir'])) {
            foreach ($_POST['excluir'] as $exc) {
                $data['excluiu'] = $this->pjPlantaModel->delete(['id' => $exc]);
            }
        } else if ($_POST['naoExc']) {
            $data['naoExc'] = "Selecione 1 ou mais itens para Excluir";
        }
        $request = request();
        $data['get'] = $request->getGet(); 

        $idProjeto = decode($this->request->uri->getSegment(4));

        $this->pjPlantaModel->where('projetoFK', $idProjeto);
        $this->pjPlantaModel->orderBy("ordem ASC");
        $data['plantas'] = $this->pjPlantaModel->findAll();
        $data['projetoAtual'] = $this->model->find($idProjeto);

        $data['idProjeto'] = $idProjeto;

        $data['title'] = 'Planta Baixa';
        $data['view'] = "pjPlantas";
        $data['tabela'] = 'pj_planta';
        $data['tabelaFK'] = $this->tabela;
        $data['tabelaFKF'] = 'pjPlanta';
        $data["nomeModel"] = "PjPlantaModel";

        echo view('templates/admin-header', $data);
        echo view("{$data['tabelaFK']}/{$data['view']}", $data);
        echo view('templates/admin-footer');
    }

    public function pjPlanta() {
        $idProjeto = decode($this->request->uri->getSegment(4));
        $idPlanta = decode($this->request->uri->getSegment(5));

        if (isset($_POST['excluir'])) {
            foreach ($_POST['excluir'] as $exc) {
                $data['excluiu'] = $this->pjPlantaModel->delete(['id' => $exc]);
            }
        }

        $data['title'] = 'Planta';
        $data['view'] = "pjPlanta";
        $data['tabela'] = 'pj_planta';
        $data['tabelaFK'] = $this->tabela;
        $data['tabelaFK2'] = 'pjPlantas';
        $data["nomeModel"] = "PjPlantaModel";
        $data['idProjeto'] = $idProjeto;
        $data['idPlanta'] = $idPlanta;

        $request = request();
        $post = $request->getPost();
        $data['get'] = $request->getGet();  

        if ($post) {

            $post['projetoFK'] = $idProjeto;
            if ($idPlanta) {

                $img = $this->request->getFile("arquivo"); // Antigo
                if ($img) {
                    if ($img->isValid() && !$img->hasMoved()) {
                        $newName = date('Y-m-d') . $img->getRandomName();
                        $post["arquivo"] = $newName;
                        $img->move(PATHHOME . "/uploads/{$data['tabela']}/", $newName);
                        try {
                            echo View('templates/tinypng');

                            $upload_path = "uploads/{$data['tabela']}/";
                            $upload_path_root = PATHHOME . $upload_path;

                            $file_name = $img->getName();
                            $file_path = $upload_path_root . "/" . $file_name;

                            $tinyfile = \Tinify\fromFile($file_path);
                            $tinyfile->toFile($file_path);

                            $img = imagecreatefromstring(file_get_contents(PATHSITE . "uploads/{$data['tabela']}/" . $newName));
                            imagepalettetotruecolor($img);
                            imagealphablending($img, true);
                            imagesavealpha($img, true);
                            imagewebp($img, PATHHOME . "uploads/{$data["tabela"]}/{$newName}.webp", 60);
                            imagedestroy($img);
                        } catch (\Tinify\ClientException $e) {
                            
                        }
                    }
                }

                $post["id"] = $idPlanta;
                $data["salvou"] = $this->pjPlantaModel->save($post);
            } else {

                if ($this->request->getFileMultiple('arquivo')) {

                    echo View('templates/tinypng');

                    foreach ($this->request->getFileMultiple('arquivo') as $img) {

                        if ($img->isValid() && !$img->hasMoved()) {

                            $newName = date('Y-m-d') . $img->getRandomName();
                            $post["arquivo"] = $newName;
                            $img->move(PATHHOME . "/uploads/{$data['tabela']}/", $newName);
                            try {
                                echo View('templates/tinypng');

                                $upload_path = "uploads/{$data['tabela']}/";
                                $upload_path_root = PATHHOME . $upload_path;

                                $file_name = $img->getName();
                                $file_path = $upload_path_root . "/" . $file_name;

                                $tinyfile = \Tinify\fromFile($file_path);
                                $tinyfile->toFile($file_path);

                                $img = imagecreatefromstring(file_get_contents(PATHSITE . "uploads/{$data['tabela']}/" . $newName));
                                imagepalettetotruecolor($img);
                                imagealphablending($img, true);
                                imagesavealpha($img, true);
                                imagewebp($img, PATHHOME . "uploads/{$data["tabela"]}/{$newName}.webp", 60);
                                imagedestroy($img);
                            } catch (\Tinify\ClientException $e) {
                                
                            }
                        }

                        $data["salvou"] = $this->pjPlantaModel->insert($post);
                    }
                }
            }

            $data["erros"] = $this->pjPlantaModel->errors();
        }

        $data['projetoAtual'] = $this->model->find($idProjeto);
        $data['planta'] = $this->pjPlantaModel->find($idPlanta);

        echo view('templates/admin-header', $data);
        echo view("{$data['tabelaFK']}/{$data['view']}", $data);
        echo view('templates/admin-footer');
    }

    public function pjVideos() {
        if (isset($_POST['excluir'])) {
            foreach ($_POST['excluir'] as $exc) {
                $data['excluiu'] = $this->pjVideoModel->delete(['id' => $exc]);
            }
        } else if ($_POST['naoExc']) {
            $data['naoExc'] = "Selecione 1 ou mais itens para Excluir";
        }

        $request = request();
        $data['get'] = $request->getGet();        

        $idProjeto = decode($this->request->uri->getSegment(4));

        $this->pjVideoModel->where('projetoFK', $idProjeto);
        $this->pjVideoModel->orderBy("ordem ASC");
        $data['videos'] = $this->pjVideoModel->findAll();
        $data['projetoAtual'] = $this->model->find($idProjeto);

        $data['idProjeto'] = $idProjeto;

        $data['title'] = 'Vídeos';
        $data['view'] = "pjVideos";
        $data['tabela'] = 'pj_video';
        $data['tabelaFK'] = $this->tabela;
        $data['tabelaFKF'] = 'pjVideo';
        $data["nomeModel"] = "PjVideoModel";

        echo view('templates/admin-header', $data);
        echo view("{$data['tabelaFK']}/{$data['view']}", $data);
        echo view('templates/admin-footer');
    }

    public function pjVideo() {
        $idProjeto = decode($this->request->uri->getSegment(4));
        $idVideo = decode($this->request->uri->getSegment(5));

        if (isset($_POST['excluir'])) {
            foreach ($_POST['excluir'] as $exc) {
                $data['excluiu'] = $this->pjVideoModel->delete(['id' => $exc]);
            }
        }

        $data['title'] = 'Vídeo';
        $data['view'] = "pjVideo";
        $data['tabela'] = 'pj_video';
        $data['tabelaFK'] = $this->tabela;
        $data['tabelaFK2'] = 'pjVideos';
        $data["nomeModel"] = "PjVideoModel";
        $data['idProjeto'] = $idProjeto;
        $data['idVideo'] = $idVideo;

        $request = request();
        $post = $request->getPost();
        $data['get'] = $request->getGet();

        if ($post) {

            $post['projetoFK'] = $idProjeto;

            if ($idVideo) {
                $post["id"] = $idVideo;
                $data['salvou'] = $this->pjVideoModel->save($post);
            } else {
                $data['salvou'] = $this->pjVideoModel->insert($post);
            }

            $data["erros"] = $this->pjVideoModel->errors();
        }

        $data['projetoAtual'] = $this->model->find($idProjeto);
        $data['video'] = $this->pjVideoModel->find($idVideo);

        echo view('templates/admin-header', $data);
        echo view("{$data['tabelaFK']}/{$data['view']}", $data);
        echo view('templates/admin-footer');
    }

    public function pjAdicionais() {
        if (isset($_POST['excluir'])) {
            foreach ($_POST['excluir'] as $exc) {
                $data['excluiu'] = $this->pjAdicionalModel->delete(['id' => $exc]);
            }
        } else if ($_POST['naoExc']) {
            $data['naoExc'] = "Selecione 1 ou mais itens para Excluir";
        }

        $request = request();
        $data['get'] = $request->getGet();
        $idProjeto = decode($this->request->uri->getSegment(4));

        $this->pjAdicionalModel->where('projetoFK', $idProjeto);
        $this->pjAdicionalModel->orderBy("ordem ASC");
        $data['adicionais'] = $this->pjAdicionalModel->findAll();
        $data['projetoAtual'] = $this->model->find($idProjeto);

        $data['idProjeto'] = $idProjeto;

        $data['title'] = 'Adicionais';
        $data['view'] = "pjAdicionais";
        $data['tabela'] = 'pj_adicional';
        $data['tabelaFK'] = $this->tabela;
        $data['tabelaFKF'] = 'pjAdicional';
        $data["nomeModel"] = "PjAdicionalModel";

        echo view('templates/admin-header', $data);
        echo view("{$data['tabelaFK']}/{$data['view']}", $data);
        echo view('templates/admin-footer');
    }

    public function pjAdicional() {
        $idProjeto = decode($this->request->uri->getSegment(4));
        $idAdicional = decode($this->request->uri->getSegment(5));

        if (isset($_POST['excluir'])) {
            foreach ($_POST['excluir'] as $exc) {
                $data['excluiu'] = $this->pjAdicionalModel->delete(['id' => $exc]);
            }
        }

        $data['title'] = 'Adicional';
        $data['view'] = 'pjAdicional';
        $data['tabela'] = 'pj_adicional';
        $data['tabelaFK'] = $this->tabela;
        $data['tabelaFK2'] = 'pjAdicionais';
        $data['nomeModel'] = 'PjAdicionalModel';
        $data['idProjeto'] = $idProjeto;
        $data['idAdicional'] = $idAdicional;

        $request = request();
        $post = $request->getPost();
        $data['get'] = $request->getGet();

        if ($post) {

            $post['projetoFK'] = $idProjeto;
            $post['valor'] = \str_replace(['.', ','], ['', '.'], $post['valor']);
            $post['impressao'] = \str_replace(['.', ','], ['', '.'], $post['impressao']);

            if (isset($post['apagararquivo'])) {
                $post['arquivo'] = NULL;
            }
            if (isset($post['apagarpdf'])) {
                $post['pdf'] = NULL;
            }
            $img = $this->request->getFile("arquivo");
            if ($img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = date('Y-m-d') . $img->getRandomName();
                    $post["arquivo"] = $newName;
                    $img->move(PATHHOME . "/uploads/{$data['tabela']}/", $newName);
                    try {
                        echo View('templates/tinypng');

                        $upload_path = "uploads/{$data['tabela']}/";
                        $upload_path_root = PATHHOME . $upload_path;

                        $file_name = $img->getName();
                        $file_path = $upload_path_root . "/" . $file_name;

                        $tinyfile = \Tinify\fromFile($file_path);
                        $tinyfile->toFile($file_path);

                        $img = imagecreatefromstring(file_get_contents(PATHSITE . "uploads/{$data['tabela']}/" . $newName));
                        imagepalettetotruecolor($img);
                        imagealphablending($img, true);
                        imagesavealpha($img, true);
                        imagewebp($img, PATHHOME . "uploads/{$data["tabela"]}/{$newName}.webp", 60);
                        imagedestroy($img);
                    } catch (\Tinify\ClientException $e) {
                        
                    }
                }
            }
            $img = $this->request->getFile("pdf");
            if ($img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = date('Y-m-d') . $img->getRandomName();
                    $post["pdf"] = $newName;
                    $img->move(PATHHOME . "/uploads/{$data['tabela']}/", $newName);
                    try {
                        echo View('templates/tinypng');

                        $upload_path = "uploads/{$data['tabela']}/";
                        $upload_path_root = PATHHOME . $upload_path;

                        $file_name = $img->getName();
                        $file_path = $upload_path_root . "/" . $file_name;

                        $tinyfile = \Tinify\fromFile($file_path);
                        $tinyfile->toFile($file_path);

                        $img = imagecreatefromstring(file_get_contents(PATHSITE . "uploads/{$data['tabela']}/" . $newName));
                        imagepalettetotruecolor($img);
                        imagealphablending($img, true);
                        imagesavealpha($img, true);
                        imagewebp($img, PATHHOME . "uploads/{$data["tabela"]}/{$newName}.webp", 60);
                        imagedestroy($img);
                    } catch (\Tinify\ClientException $e) {
                        
                    }
                }
            }

            if ($idAdicional) {
                $post["id"] = $idAdicional;
                $data['salvou'] = $this->pjAdicionalModel->save($post);
            } else {
                $data['salvou'] = $this->pjAdicionalModel->insert($post);
            }

            $data["erros"] = $this->pjAdicionalModel->errors();
        }

        $data['projetoAtual'] = $this->model->find($idProjeto);
        $data['adicional'] = $this->pjAdicionalModel->find($idAdicional);

        echo view('templates/admin-header', $data);
        echo view("{$data['tabelaFK']}/{$data['view']}", $data);
        echo view('templates/admin-footer');
    }
}
