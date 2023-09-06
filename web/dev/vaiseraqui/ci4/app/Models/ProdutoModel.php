<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'produto';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['titulo', 'descricao', 'ordem', 'identificador', 'proximidades', 'video', 'ativo', 'validade', 'anuncianteFK', 'endereco', 'bairro', 'destaque', 'validadeDestaque', 'apresentacao', 'inicioValidade', 'inicioDestaque', 'cidadeFK', 'mapa', 'acomodacao', 'permitido', 'proibido', 'texto', 'itens', 'lazer', 'categoriaFK', 'arquivo', 'capacidadeFK', 'hospedes', 'limpeza', 'latitude', 'longitude', 'captadorFK', 'planoFK', 'calendario', 'preco', 'apartir', 'principaiscomodidades', 'itensdisponiveis', 'areautil', 'quartos', 'banheiros', 'vagas', 'andar', 'animais', 'mobilia', 'transporte', 'condominio', 'observacoes', 'pode', 'naopode', 'cardapio', 'eventosatendidos', 'coordenadas', 'regrascheck', 'detalhes', 'fotoFK', 'local'];
    protected $useTimestamps = true;
    protected $createdField = 'dtCriacao';
    protected $updatedField = 'dtAlteracao';
    protected $deletedField = 'excluido';
    protected $validationRules = [
        'titulo' => 'required',
        'identificador' => 'is_unique[pavimento.identificador,id,{id}]'
    ];
    protected $validationMessages = [
        'titulo' => [
            'required' => 'Título obrigatório'
        ],
        'identificador' => [
            'is_unique' => 'Produto com o mesmo nome já cadastrado'
        ],
    ];
    protected $skipValidation = false;

    public function fotos($id, $limit) {
        $produtoFotoModel = model('App\Models\ProdutoFotoModel', false);
        $produtoFotoModel->where('produtoFK', $id);
        $produtoFotoModel->orderBy('ordem ASC, id DESC');
        // $produtoFotoModel->limit($limit);
        $fotos = $produtoFotoModel->findAll($limit);
        return $fotos;
    }

    public function fotoDestaque($fotoFK) {
        $produtoFotoModel = model('App\Models\ProdutoFotoModel', false);
        $produtoFotoModel->select("arquivo");
        $foto = $produtoFotoModel->find($fotoFK);
        return $foto;
    }

    public function datas($id) {
        $produtoDataModel = model('App\Models\ProdutoDataModel', false);
        $produtoDataModel->where('produtoFK', $id);
        $produtoDataModel->orderBy('data ASC');
        $datas = $produtoDataModel->findAll();
        return $datas;
    }

    public function valores($id) {
        $produtoValorModel = model('App\Models\ProdutoValorModel', false);
        $produtoValorModel->where('produtoFK', $id);
        $produtoValorModel->orderBy('valor ASC');
        $valores = $produtoValorModel->findAll();
        return $valores;
    }

    public function setores($id) {
        $produtoSetorModel = model('App\Models\ProdutoSetorModel', false);
        $produtoSetorModel->where('produtoFK', $id);
        $produtoSetorModel->orderBy('ordem ASC, id DESC');
        $setores = $produtoSetorModel->findAll();

        $setorIngressoModel = model('App\Models\SetorIngressoModel', false);

        if ($setores) {
            foreach ($setores as $ind => $setor) {
                $setorIngressoModel->resetQuery();
                $setorIngressoModel->where('setorFK', $setor->id);
                $setorIngressoModel->orderBy('preco ASC');
                $setores[$ind]->ingressos = $setorIngressoModel->findAll();
            }
        }
        return $setores;
    }

    public function organizacoes($id) {
        $produtoOrganizacaoModel = model('App\Models\ProdutoOrganizacaoModel', false);
        $produtoOrganizacaoModel->where('produtoFK', $id);
        $produtoOrganizacaoModel->orderBy('ordem ASC, id DESC');
        $organizacoes = $produtoOrganizacaoModel->findAll();

        return $organizacoes;
    }

    public function pontosVenda($id) {
        $produtoPontoDeVendaModel = model('App\Models\ProdutoPontoDeVendaModel', false);
        $produtoPontoDeVendaModel->where('produtoFK', $id);
        $produtoPontoDeVendaModel->orderBy('ordem ASC, id DESC');
        $pontos = $produtoPontoDeVendaModel->findAll();
        return $pontos;
    }

    public function cardapio($id) {
        $produtoCardapioModel = model('App\Models\ProdutoCardapioModel', false);
        $produtoCardapioModel->where('produtoFK', $id);
        $produtoCardapioModel->orderBy('ordem ASC, id DESC');
        $cardapio = $produtoCardapioModel->findAll();
        return $cardapio;
    }

    public function responsavel($id) {
        $anuncianteModel = model('App\Models\AnuncianteModel', false);
        $anuncianteModel->select('titulo, telefone, telefone2, telefone3, email, arquivo');
        $anunciante = $anuncianteModel->find($id);
        
        $removeChars = array("-", "(", ")", " ");
        $iphone = strpos($_SERVER['HTTP_USER_AGENT'], "iPhone");
        $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
        $palmpre = strpos($_SERVER['HTTP_USER_AGENT'], "webOS");
        $berry = strpos($_SERVER['HTTP_USER_AGENT'], "BlackBerry");
        $ipod = strpos($_SERVER['HTTP_USER_AGENT'], "iPod");

        if ($iphone || $android || $palmpre || $ipod || $berry == true) {
            $usaApi = "api";
        } else {
            $usaApi = "web";
        }
        $anunciante->link1 = "https://" . $usaApi . ".whatsapp.com/send?phone=55" . str_replace($removeChars, "", $anunciante->telefone);
        $anunciante->link2 = "https://" . $usaApi . ".whatsapp.com/send?phone=55" . str_replace($removeChars, "", $anunciante->telefone2);
        $anunciante->link3 = "https://" . $usaApi . ".whatsapp.com/send?phone=55" . str_replace($removeChars, "", $anunciante->telefone3);


        
        return $anunciante;
    }
}
