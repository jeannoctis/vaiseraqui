<?php

namespace App\Controllers;

class Cliente extends BaseController
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session($config);
        helper(['encrypt', 'text']);

        $this->model = model('App\Models\ClienteModel', false);
        $this->clPagamentoModel = model('App\Models\ClPagamentoModel', false);
        $this->clEnderecoModel = model('App\Models\ClEnderecoModel', false);

        $this->tabela = "cliente";
        $this->session->set('menuAdmin', '4');
    }

    public function index()
    {
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

    public function form()
    {
        helper('form');
        helper('url');

        $request = request();
        $post = $request->getPost();
        $id = decode($this->request->uri->getSegment(4));

        $data['title'] = 'Projeto';
        $data['tabela'] = $this->tabela;

        if ($post) {

            $post['incluso'] = $post['inclusoTopicos'][0];
            $post['valor'] = \str_replace(['.', ','], ['', '.'], $post['valor']);
            $post['dimensoes'] = \str_replace(' ', '', $post['dimensoes']);
            $post['loteminimo'] = \str_replace(' ', '', $post['loteminimo']);

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

    public function pjFotos()
    {
        if (isset($_POST['excluir'])) {
            foreach ($_POST['excluir'] as $exc) {
                $data['excluiu'] = $this->pjFotoModel->delete(['id' => $exc]);
            }
        } else if ($_POST['naoExc']) {
            $data['naoExc'] = "Selecione 1 ou mais itens para Excluir";
        }

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

    public function pjFoto()
    {
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

        if ($post) {

            $post['projetoFK'] = $idProjeto;

            if ($idFoto) {

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

    public function pjPlantas()
    {
        if (isset($_POST['excluir'])) {
            foreach ($_POST['excluir'] as $exc) {
                $data['excluiu'] = $this->pjPlantaModel->delete(['id' => $exc]);
            }
        } else if ($_POST['naoExc']) {
            $data['naoExc'] = "Selecione 1 ou mais itens para Excluir";
        }

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

    public function pjPlanta()
    {
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

    public function pjVideos()
    {
        if (isset($_POST['excluir'])) {
            foreach ($_POST['excluir'] as $exc) {
                $data['excluiu'] = $this->pjVideoModel->delete(['id' => $exc]);
            }
        } else if ($_POST['naoExc']) {
            $data['naoExc'] = "Selecione 1 ou mais itens para Excluir";
        }

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

    public function pjVideo()
    {
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

    public function pjAdicionais()
    {
        if (isset($_POST['excluir'])) {
            foreach ($_POST['excluir'] as $exc) {
                $data['excluiu'] = $this->pjAdicionalModel->delete(['id' => $exc]);
            }
        } else if ($_POST['naoExc']) {
            $data['naoExc'] = "Selecione 1 ou mais itens para Excluir";
        }

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

    public function pjAdicional()
    {
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

        if ($post) {

            $post['projetoFK'] = $idProjeto;
            $post['valor'] = \str_replace(['.', ','], ['', '.'], $post['valor']);

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

    public function loginFacebook()
    {

        $request = \Config\Services::request();
        $post = $request->getPost();

        $this->model->loginFacebook($post);

        if ($this->session->get('cliente')) {
            $retorno["sucesso"] = 1;

            if ($_SESSION['projetoLogin']) {
                if ($_SESSION['adicionalLogin']) {
                    foreach ($_SESSION['adicionalLogin'] as $adic) {
                        $adicional .= 'adicional%5B%5D=' . $adic . '&';
                    }
                }
                $retorno['url'] = PATHSITE . 'finalize-pedido/?' . $adicional . "&projeto=" . $_SESSION['projetoLogin'];
                unset($_SESSION['projetoLogin']);
                unset($_SESSION['adicionalLogin']);
            } else {
                $retorno['url'] = PATHSITE . 'area-do-cliente/meus-dados/';
            }
        } else {
            $retorno["erro"] = "Ocorreu um erro ao tentar fazer o login no Facebook";
        }
        echo json_encode($retorno);
    }

    public
    function loginGoogle()
    {

        $request = \Config\Services::request();
        $post = $request->getPost();

        if ($post) {
            if (isset($post["credential"]) && isset($post["g_csrf_token"])) {
                //AUTOLOAD

                require APPPATH . 'Libraries/googleapi/vendor/autoload.php';

                $client = new \Google_Client(['client_id' => $data["configs"]->chavegoogle]);

                $payload = $client->verifyIdToken($post["credential"]);
                if ($payload) {
                    $clienteModel = model('App\Models\ClienteModel', false);
                    $retornoGoogle = $clienteModel->loginGoogle($payload);
                    // If request specified a G Suite domain:
                    //$domain = $payload['hd'];
                } else {
                    // Invalid ID token
                }

                $cookie = $_COOKIE['g_csrf_token'] ?? '';

                if ($post['g_csrf_token'] != $cookie) {
                }
            }
        }
    }

    public function favoritar()
    {
        if($_SESSION['cliente']) {
        $request = \Config\Services::request();
        $post = $request->getPost();

        $post['clienteFK'] = $this->session->get('cliente')->id;

        $this->model->favoritar($post['produtoFK'], $post['clienteFK'],false);
       
    
    } else {
        $_SESSION['favoritar'] = $post['id'];
    }
    }

}
