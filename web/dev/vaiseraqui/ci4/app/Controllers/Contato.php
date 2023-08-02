<?php

namespace App\Controllers;

class Contato extends BaseController
{
	public function __construct()
	{
		$this->db = \Config\Database::connect();
		$this->session = \Config\Services::session($config);
		helper(['encrypt', 'text']);
		$this->contatoModel = model('App\Models\ContatoModel', false);
		$this->tabela = "contato";
		$this->session->set('menuAdmin', '8');
	}

	public function index()
	{
		helper(['form', 'date']);

		if (isset($_POST['excluir'])) {
			foreach ($_POST['excluir'] as $exc) {
				$this->contatoModel->delete(['id' => $exc]);
			}
		} else if ($_POST['nexc']) {
         $data['naoExc'] = "Selecione 1 ou mais itens para Excluir";
      }

		$this->contatoModel->orderBy("id desc");

		$request = request();
		$data['get'] = $get = $request->getGet();

		$data['lista'] = $this->contatoModel->findAll();

		$data['title'] = 'Contato';
		$data['tabela'] = "contato";
		$data["nomeModel"] = "ContatoModel";

		echo view('templates/admin-header', $data);
		echo view("{$data["tabela"]}/index", $data);
		echo view('templates/admin-footer');
	}

	public function form()
	{
		$request = \Config\Services::request();

		helper(['form', 'date']);

		$data['title'] = 'Contato';
		$data['tabela'] = 'contato';
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
					$img->move(PATHHOME . '/uploads/contato/', $newName);
				}
			}

			$data["salvou"] = $this->contatoModel->save($post);

			echo $this->contatoModel->getLastQuery()->getQuery();

			if (!$data["salvou"]) {
				$data["erros"] = $this->contatoModel->errors();
			}
		}

		if ($id) {
			$data["resultado"] = $this->contatoModel->find($id);
		}

		switch ($data['resultado']->tipo) {
			case "CONTATO":
				$this->session->set('menuAdmin', '99');
				break;
			case "QUESTIONARIO":
				$this->session->set('menuAdmin', '11');
				break;
			case "VAGA":
				$this->session->set('menuAdmin', '5');
				break;
		}

		echo view('templates/admin-header', $data);
		echo view("{$data['tabela']}/form");
		echo view('templates/admin-footer');
	}

	public function enviarContato()
	{
		$request = \Config\Services::request();
		$post = $request->getPost();
		$post["ip"] = $_SERVER["REMOTE_ADDR"];
		$token = $post['g-recaptcha-response'];

		$configModel = model('App\Models\ConfigModel', false);
		$configs = $configModel->find(1);
		$secret =  $configs->private_recaptcha;

		$emailModel = model('App\Models\EmailModel', false);
		$return = $emailModel->validarRecaptcha($token, $secret);

		if ($return) {
			$result = $emailModel->find(1);
			$dados["mailTo"] = $result->email;
			$dados["subject"] = "Contato do site";
			ob_start();
			echo View('templates/email-template', $post);
			$dados["message"] = ob_get_clean();
			$emailModel->enviarEmail($dados);

			$retorno["salvar"] = $this->contatoModel->save($post);
			$retorno["post"] = $post;
		} else {
			$retorno["erro"] = "Falha no Google Recaptcha!";
		}
		//      $retorno["contato"] = $this->contatoModel->getLastQuery()->getQuery();
		echo json_encode($retorno);
	}

	//--------------------------------------------------------------------
}
