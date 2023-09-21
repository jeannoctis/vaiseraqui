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
    protected $allowedFields = [
        'titulo', 'descricao', 'ordem', 'identificador', 'proximidades', 'video', 'ativo', 'validade', 'anuncianteFK',
        'endereco', 'bairro', 'destaque', 'validadeDestaque', 'apresentacao', 'inicioValidade', 'inicioDestaque', 'cidadeFK',
        'mapa', 'acomodacao', 'permitido', 'proibido', 'texto', 'itens', 'lazer', 'categoriaFK', 'arquivo', 'capacidade',
        'hospedes', 'limpeza', 'latitude', 'longitude', 'captadorFK', 'planoFK', 'calendario', 'preco', 'apartir', 'principaiscomodidades',
        'itensdisponiveis', 'areautil', 'quartos', 'banheiros', 'vagas', 'andar', 'animais', 'mobilia', 'transporte', 'condominio',
        'observacoes', 'pode', 'naopode', 'cardapio', 'eventosatendidos', 'coordenadas', 'regrascheck', 'detalhes', 'fotoFK', 'local', 'cafedamanha', 'wifi', 'arcondicionado', 'recepcao24', 'bar', 'acessibilidade', 'estacionamento'
    ];
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

    public function fotos($id, $limit)
    {
        $produtoFotoModel = model('App\Models\ProdutoFotoModel', false);
        $produtoFotoModel->where('produtoFK', $id);
        $produtoFotoModel->orderBy('ordem ASC, id DESC');
        // $produtoFotoModel->limit($limit);
        $fotos = $produtoFotoModel->findAll($limit);

        $this->select('fotoFK');
        $principal = $this->find($id);

        if ($fotos) {
            $achou = false;
            foreach ($fotos as $ind => $foto) {
                if ($foto->id == $principal->fotoFK) {
                    $fotos[$ind]->principal = 1;
                    $achou = true;
                }
            }
            if (!$achou && $destaque) {
                $produtoFotoModel->resetQuery();
                $produtoFotoModel->where('produtoFK', $id);
                $produtoFotoModel->where("id IN ( SELECT fotoFK FROM produto WHERE id = {$id} )");
                $temDestaque = $produtoFotoModel->find()[0];
                if ($temDestaque) {
                    $fotos[-1] = $temDestaque;
                }
            }
        }

        return $fotos;
    }

    public function fotoPrincipal($array)
    {

        if ($array) {
            foreach ($array as $ind => $arr) {
                if ($arr->principal) {
                    $array['-1'] = $arr;
                    unset($array[$ind]);
                }
            }
        }

        ksort($array);

        return $array;
    }

    public function destaquePrestadores($limit)
    {
        $this->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado, t.identificador as identificadorTipo');
        $this->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
        $this->join('cidade c', 'c.id = produto.cidadeFK');
        $this->join('estado e', 'e.id = c.estadoFK');
        $this->join('tipo t', 't.id = pc.tipoFK');
        $this->where('t.tipo', 'PRESTADORES');
        $this->where('ativo', '1');
        $this->where('destaque', '1');
        $this->orderBy('rand()');
        $destaques = $this->findAll($limit);
        if ($destaques) {
            foreach ($destaques as $ind => $destaque) {
                $destaques[$ind]->fotos = $this->fotos($destaque->id, 4, true);
                if (!$destaques[$ind]->fotos[0]->destaque) {
                    $destaques[$ind]->fotos = $this->fotoPrincipal($destaques[$ind]->fotos);
                }
            }
        }
        return $destaques;
    }

    public function datas($id)
    {
        $produtoDataModel = model('App\Models\ProdutoDataModel', false);
        $produtoDataModel->where('produtoFK', $id);
        $produtoDataModel->orderBy('data ASC');
        $datas = $produtoDataModel->findAll();
        return $datas;
    }

    public function valores($id)
    {
        $produtoValorModel = model('App\Models\ProdutoValorModel', false);
        $produtoValorModel->where('produtoFK', $id);
        $produtoValorModel->orderBy('valor ASC');
        $valores = $produtoValorModel->findAll();
        return $valores;
    }

    public function setores($id)
    {
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

    public function organizacoes($id)
    {
        $produtoOrganizacaoModel = model('App\Models\ProdutoOrganizacaoModel', false);
        $produtoOrganizacaoModel->where('produtoFK', $id);
        $produtoOrganizacaoModel->orderBy('ordem ASC, id DESC');
        $organizacoes = $produtoOrganizacaoModel->findAll();

        return $organizacoes;
    }

    public function pontosVenda($id)
    {
        $produtoPontoDeVendaModel = model('App\Models\ProdutoPontoDeVendaModel', false);
        $produtoPontoDeVendaModel->where('produtoFK', $id);
        $produtoPontoDeVendaModel->orderBy('ordem ASC, id DESC');
        $pontos = $produtoPontoDeVendaModel->findAll();
        return $pontos;
    }

    public function cardapio($id)
    {
        $produtoCardapioModel = model('App\Models\ProdutoCardapioModel', false);
        $produtoCardapioModel->where('produtoFK', $id);
        $produtoCardapioModel->orderBy('ordem ASC, id DESC');
        $cardapio = $produtoCardapioModel->findAll();
        return $cardapio;
    }

    public function comodidades($id)
    {
        $produtoComodidadeModel = \model("App\Models\ProdutoComodidadeModel", false)
            ->select("titulo, comodidades")
            ->where("produtoFK", $id)
            ->orderBy("titulo ASC");
        $comodidades = $produtoComodidadeModel->findAll();

        return $comodidades;
    }

    public function proximidades($id)
    {
        $produtoProximidadeModel = \model("App\Models\ProdutoProximidadeModel", false)
            ->select("produto_proximidade.proximidades, px.arquivo, px.titulo")
            ->join("proximidade as px", "produto_proximidade.proximidadeFK = px.id")
            ->where("produtoFK", $id);
        $proximidades = $produtoProximidadeModel->findAll();

        return $proximidades;
    }

    public function anunciante($id)
    {
        $anuncianteModel = \model("App\Models\AnuncianteModel", false)
            ->select("titulo, telefone, telefone2, telefone3, email, arquivo");
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

        if ($anunciante->telefone) {
            $anunciante->whatsapp = "https://" . $usaApi . ".whatsapp.com/send?phone=55" . str_replace($removeChars, "", $anunciante->telefone);
        }
        if ($anunciante->telefone2) {
            $anunciante->whatsapp2 = "https://" . $usaApi . ".whatsapp.com/send?phone=55" . str_replace($removeChars, "", $anunciante->telefone2);
        }

        if ($anunciante->telefone3) {
            $anunciante->whatsapp3 = "https://" . $usaApi . ".whatsapp.com/send?phone=55" . str_replace($removeChars, "", $anunciante->telefone3);
        }

        return $anunciante;
    }

    public function valorTotal($valores, $preco)
    {
        $total = array_column($valores, "valor");
        $total = array_sum($total);
        $total += $preco;

        return $total;
    }

    public function dadosCard()
    {
        return $this->select("produto.*, pc.titulo as categoria ,c.titulo as cidade, e.sigla as estado, t.identificador as tipo, t.id as tipo_id")
            ->join("produto_categoria pc", "pc.id = produto.categoriaFK")
            ->join("cidade c", "c.id = produto.cidadeFK")
            ->join("estado e", "e.id = c.estadoFK")
            ->join("tipo t", "t.id = pc.tipoFK");
    }

    public function hospedagens($limit)
    {

        $data['get'] = $get = \request()->getGet();

        if (!is_numeric($get['page_anuncios'])) {
            $paginate = 1;
        } else {
            $paginate = $get['page_anuncios'];
        }

        $this->resetQuery();
        $this->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
        $this->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
        $this->join('cidade c', 'c.id = produto.cidadeFK');
        $this->join('estado e', 'e.id = c.estadoFK');
        $this->where('pc.tipoFK', 3);
        $this->where('ativo', '1');
        $data['servicos'] = $this->paginate($limit, 'produto', $paginate);
        $data['pager'] = $this->pager;

        return $data;
    }

    public function ordernar($ordem)
    {
        if (!$ordem || $ordem == "recentes") {
            return $this->orderBy("id DESC");
        } else if ($ordem == "antigos") {
            return $this->orderBy("id ASC");
        } else if ($ordem == "maior") {
            return $this->orderBy("preco DESC");
        } else if ($ordem == "menor") {
            return $this->orderBy("preco ASC");
        }
    }

    public function filtros($get)
    {
        helper('date');
        
        if($get['cidade']){
           $_SESSION['cidade'] = $get['cidadeFK']; 
        } else {
           $get['cidadeFK'] = $_SESSION['cidade'];
        }
        
        if ($get['cidadeFK']) {
            $this->where('produto.cidadeFK', $get['cidadeFK']);
        }
      

        if ($get['dataIni'] && $get['dataFim']) {
            $data1 = dataFormata($get["dataIni"]);
            $data2 = dataFormata($get["dataFim"]);
            $this->where("produto.id NOT IN (SELECT produtoFK FROM produto_calendario WHERE date BETWEEN  '{$data1}' AND '{$data2}' )");
        }

        if ($get['tipoFK']) {
            $this->where('produto.categoriaFK', $get['tipoFK']);
        }
        if ($get['texto']) {
            $this->groupStart();
            $this->orLike('produto.titulo', $get['texto']);
            $this->orLike('produto.descricao', $get['texto']);
            $this->orLike('produto.principaiscomodidades', $get['texto']);
            $this->groupEnd();
        }
    }

    public function eventos($get)
    {

        $this->select('produto.titulo, produto.id, produto.local, pc.id as categoriaFK, c.titulo as cidade, '
            . 'e.sigla as estado, produto.identificador');
        $this->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
        $this->join('cidade c', 'c.id = produto.cidadeFK');
        $this->join('estado e', 'e.id = c.estadoFK');
        $this->where("produto.id IN (SELECT produtoFK FROM produto_data WHERE produto_data.data = '{$get['dia']}')");
        $this->where('pc.tipoFK', 5);
        $this->where('ativo', '1');
        $eventos = $this->findAll();

        $produtoCategoriaModel = model('App\Models\ProdutoCategoriaModel', false);
        $produtoCategoriaModel->select('id, titulo');
        $produtoCategoriaModel->orderBy("ordem ASC, id DESC");
        $produtoCategoriaModel->where('tipoFK', 5);
        $categorias = $produtoCategoriaModel->findAll();

        foreach ($eventos as $ind => $evento) {
            $eventos[$ind]->fotos = $this->fotos($evento->id, 1, false);
        }

        foreach ($categorias as $ind => $categoria) {
            if (!$categorias[$ind]->eventos) {
                $categorias[$ind]->eventos = array();
            }
            foreach ($eventos as $evento) {
                if ($evento->categoriaFK == $categoria->id) {
                    $categorias[$ind]->eventos[] = $evento;
                }
            }
        }

        ob_start();
?>
        <div class="item show swiper-eventos-home" data-modal="">
            <? if ($categorias) { ?>
                <div class="events-with-data j-calendar-columns swiper-wrapper">
                    <? foreach ($categorias as $categoria) { ?>
                        <div class="column swiper-slide">
                            <h3><?= $categoria->titulo ?></h3>
                            <div class="scroll-h">
                                <div class="wraper">
                                    <?
                                    if ($categoria->eventos) {
                                        foreach ($categoria->eventos as $evento) {
                                    ?>
                                            <div onclick="window.location.href = '<?= PATHSITE ?>evento/<?= $evento->identificador ?>/'" class="item" style="background-image: url('<?= PATHSITE ?>uploads/produto/<?= $evento->id ?>/<?= $evento->fotos[0]->arquivo ?>');">
                                                <h4><?= $evento->titulo ?></h4>
                                                <div class="box-address">
                                                    <img src="<?= PATHSITE ?>assets/images/icon-map.svg" alt="">
                                                    <span>
                        <?= $evento->local ?> <br>
                                                        <?= $evento->cidade ?>- <?= $evento->estado ?>
                                                    </span>
                                                </div>
                                                <a href="<?= PATHSITE ?>evento/<?= $evento->identificador ?>/">Mais detalhes <img src="<?= PATHSITE ?>assets/images/icon-arrow-right.svg" alt=""></a>
                                            </div>
                                        <?
                                        }
                                    } else {
                                        ?>
                                        <div class="wraper">
                                            <div class="empty">
                                                <img src="<?= PATHSITE ?>assets/images/icon-calendar-not-available.svg" alt="">
                                                <span>
                                                    Nenhum evento cadastrado <br>
                                                    nesta sessão para o dia de hoje.
                                                </span>
                                            </div>
                                        </div>
                                    <? } ?>
                                </div>
                            </div>
                        </div>
            <? } ?>
                </div>
            <? } ?>
        </div>
        <script>
            new Swiper(".swiper-eventos-home", {
                slidesPerView: 'auto',
            })

            // dropdown callendar
            const calendarTitle = document.querySelectorAll('.j-calendar-columns .column h3')
            calendarTitle.forEach(title => {
                title.addEventListener('click', function(e) {
                    e.preventDefault()                    

                    const columns = this.parentNode.parentNode.querySelectorAll(".column")
                    columns.forEach(column => {
                        column.classList.toggle("show")
                    })
                    calendarTitle.forEach(title => {
                        title.classList.toggle("show")
                    })
                })
            })

            function closeAllAdsColumn() {
                calendarTitle.forEach(title => {
                    const column = title.parentNode
                    column.classList.remove('show')
                    title.classList.remove('show')
                })
            }
        </script>
<?
        $retorno['html'] = ob_get_clean();
        echo json_encode($retorno);
    }

    public function videos($id)
    {
        $produtoVideoModel = model('App\Models\ProdutoVideoModel', false);
        $produtoVideoModel->where('produtoFK', $id);
        $produtoVideoModel->orderBy('ordem ASC, id DESC');
        $videos = $produtoVideoModel->findAll();
        return $videos;
    }

    public function datasOcupacao($id) {
        $produtoCalendarioModel = model('App\Models\ProdutoCalendarioModel', false);
        $produtoCalendarioModel->select("DATE_FORMAT(date, '%d/%m/%Y') as dataConcat");
        $produtoCalendarioModel->where('produtoFK', $id);
        $produtoCalendarioModel->where('date > NOW()');
        $datas = $produtoCalendarioModel->findAll();
        return $datas;
    }

    public function default($data, $page) {



        $tipoModel = \model("App\Models\TipoModel", false);
        $tipoModel->where('identificador', $data['segments'][0]);
        $tipo = $tipoModel->find()[0];

        $data['tipoAtual'] = $tipo;

        switch ($tipo->tipo) {
            case 'ALUGUEL':
                $page = 'aluguel-para-temporada';
                break;
            case 'SALOES':
                $page = 'saloes-de-festas-e-areas-de-lazer';
                break;
            case 'HOSPEDAGEM':
                $page = 'hospedagens';
                break;
            case 'LOJAS':
                $page = 'lojas-temporarias';
                break;
            case 'PRESTADORES':
                $page = 'prestadores-de-servicos';
                break;
        }

        switch ($page) {
            case "hospedagens":
                if ($data['segments'][1] && !is_numeric($data['segments'][1])) {
                    $data['escondeWhatsapp'] = true;
                    helper('encrypt');
                    $data['style_list'] = ['jquery_ui', 'swiper', 'fancybox'];
                    $data['script_list'] = ['fancybox', 'swiper', 'jquery', 'jquery_ui', 'card-like', 'controller-card', 'controller-imoveis', 'controller-presentation', 'faq-dropdown', 'fs-lightbox', 'modal-filter', 'modal-select-order'];
                    $data['bodyClass'] = 'internal-rent';

                    $data['tipopagina'] = 'hospedagem';
                    $page = 'hospedagem';

                    helper(['date', 'utils']);
                    $produtoModel = \model("App\Models\ProdutoModel", false);
                    $produtoModel->select('produto.*, c.titulo as cidade, e.sigla as estado');
                    $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                    $produtoModel->join('estado e', 'e.id = c.estadoFK');
                    $produtoModel->where('identificador', $data['segments'][1]);
                    $data['metatag'] = $produtoModel->find()[0];
                    $data['metatag']->valores = $produtoModel->valores($data['metatag']->id);
                    $data['metatag']->proximidades = $produtoModel->proximidades($data['metatag']->id);
                    $data['fotos'] = $produtoModel->fotos($data['metatag']->id, 999999, false);
                    $data['anunciante'] = $produtoModel->anunciante($data['metatag']->anuncianteFK);
                    $data['comodidades'] = $produtoModel->comodidades($data['metatag']->id);
                    $data['valores'] = $produtoModel->valores($data['metatag']->id);
                    $data['datasOcupada'] = $produtoModel->datasOcupacao($data['metatag']->id);
                    $data['anunciante'] = $produtoModel->anunciante($data['metatag']->anuncianteFK);
                    $data['videos'] = $produtoModel->videos($data['metatag']->id);

                    $produtoModel = \model("App\Models\ProdutoModel", false);
                    $data['destaques'] = $produtoModel->destaquePrestadores(4);

                    $data['coordenadas'] = array();
                } else {
                    $data['style_list'] = ['fancybox', 'swiper', 'jquery_ui'];
                    $data['script_list'] = ['fancybox', 'swiper', 'card-like', 'controller-card', 'fs-lightbox', 'modal-filter', 'modal-select-order', 'jquery_ui'];
                    $data['pagina'] = 23;
                    $data['bodyClass'] = 'base-list-map';
                    $data['get'] = request()->getGet();
                    $data['form5Visible'] = "visible";

                    $produtoModel = model('App\Models\ProdutoModel', false);
                    $retorno = $produtoModel->hospedagens(32);
                    $data['produtos'] = $retorno['servicos'];
                    $data['pager'] = $retorno['pager'];
                    if ($data['produtos']) {
                        foreach ($data['produtos'] as $ind => $produto) {
                            $data['produtos'][$ind]->fotos = $produtoModel->fotos($produto->id, 4, true);

                            if ($data['produtos'][$ind]->fotos) {
                                $data['produtos'][$ind]->fotos = $produtoModel->fotoPrincipal($data['produtos'][$ind]->fotos);
                            }
                            
                            if ($produto->latitude && $produto->latitude) {
                                $produto->coordenadas = $produto->latitude . "," . $produto->longitude;
                            }

                            if ($produto->coordenadas) {
                                $data["coordenadas"][$ind]["id"] = $produto->id;

                                $data["coordenadas"][$ind]["titulo"] = $produto->titulo;
                                $data["coordenadas"][$ind]["foto"] = $data['produtos'][$ind]->fotos[0];
                                $data["coordenadas"][$ind]["preco"] = $produto->preco;

                                $data["coordenadas"][$ind]["pagina"] = "hospedagem";

                                $data["coordenadas"][$ind]["coord"] = $produto->coordenadas;
                                $data["coordenadas"][$ind]["identificador"] = $produto->identificador;
                            }
                        }
                    }
           
                    $produtoModel = \model("App\Models\ProdutoModel", false);
                    $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                    $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                    $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                    $produtoModel->join('estado e', 'e.id = c.estadoFK');
                    $produtoModel->where('pc.tipoFK', 3);
                    $produtoModel->where('ativo', '1');
                    $produtoModel->orderBy('rand()');
                    $data['destaques'] = $produtoModel->findAll(8);

                    if ($data['destaques']) {
                        foreach ($data['destaques'] as $ind => $destaque) {
                            $data['destaques'][$ind]->fotos = $produtoModel->fotos($destaque->id, 4, true);

                            if ($data['destaques'][$ind]->fotos) {
                                $data['destaques'][$ind]->fotos = $produtoModel->fotoPrincipal($data['produtos'][$ind]->fotos);
                            }
                        }
                    }
                }
                break;
            case "prestadores-de-servicos":
                if ($data['segments'][1] && !is_numeric($data['segments'][1])) {
                    $data['escondeWhatsapp'] = true;
                    helper('encrypt');
                    $page = 'prestador-de-servico';
                    $data['style_list'] = ['fancybox', 'swiper', 'jquery_ui'];
                    $data['script_list'] = ['fancybox', 'swiper', 'jquery', 'jquery_ui', 'card-like', 'controller-card', 'controller-imoveis', 'controller-presentation', 'faq-dropdown', 'fs-lightbox', 'modal-filter', 'modal-select-order'];

                    helper('date');
                    $data['bodyClass'] = 'internal-rent';
                    $produtoModel = \model("App\Models\ProdutoModel", false);
                    $produtoModel->select('produto.*, c.titulo as cidade, e.sigla as estado');
                    $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                    $produtoModel->join('estado e', 'e.id = c.estadoFK');
                    $produtoModel->where('identificador', $data['segments'][1]);
                    $data['metatag'] = $produtoModel->find()[0];
                    $data['fotos'] = $produtoModel->fotos($data['metatag']->id, 999999, false);
                    $data['cardapio'] = $produtoModel->cardapio($data['metatag']->id);
                    $data['anunciante'] = $produtoModel->anunciante($data['metatag']->anuncianteFK);
                     $data['videos'] = $produtoModel->videos($data['metatag']->id);
                    //  $data['pontosVenda'] = $produtoModel->pontosVenda($data['metatag']->id);
                    //  $data['setores'] = $produtoModel->setores($data['metatag']->id);
                    //  $data['organizacoes'] = $produtoModel->organizacoes($data['metatag']->id);

                    $produtoModel->resetQuery();
                    $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade');
                    $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                    $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                    $produtoModel->where('pc.tipoFK', $tipo->id);
                    $produtoModel->where('ativo', '1');
                    $data['destaques'] = $produtoModel->findAll();
                    if ($data['destaques']) {
                        foreach ($data['destaques'] as $ind => $destaque) {
                            $data['destaques'][$ind]->fotos = $produtoModel->fotos($destaque->id, 4, true);
                            $data['destaques'][$ind]->datas = $produtoModel->datas($destaque->id);
                        }
                    }
                } else {
                    $data['get'] = $get = request()->getGet();
                    $data['style_list'] = ['swiper'];
                    $data['script_list'] = ['swiper', 'card-like', 'controller-card', 'controller-imoveis', 'fs-lightbox', 'modal-filter', 'modal-select-order'];

                    $data['form4Visible'] = 'visible';
                    $produtoModel = \model("App\Models\ProdutoModel", false);
                    $data['destaques'] = $produtoModel->destaquePrestadores(4);

                    if (!is_numeric($get['page_produto'])) {
                        $paginate = 1;
                    } else {
                        $paginate = $get['page_produto'];
                    }

                    $produtoModel->resetQuery();
                    $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                    $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                    $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                    $produtoModel->join('estado e', 'e.id = c.estadoFK');
                    $produtoModel->where('pc.tipoFK', $tipo->id);
                    $produtoModel->where('ativo', '1');
                    $produtoModel->filtros($get);
                    $data['servicos'] = $produtoModel->paginate(32, 'produto', $paginate);
                    $data['pager'] = $produtoModel->pager;

                    if ($data['servicos']) {
                        foreach ($data['servicos'] as $ind => $destaque) {
                            $data['servicos'][$ind]->fotos = $produtoModel->fotos($destaque->id, 4, true);
                            if ($data['produtos'][$ind]->fotos) {
                                $data['produtos'][$ind]->fotos = $produtoModel->fotoPrincipal($data['produtos'][$ind]->fotos);
                            }
                        }
                    }

                    $data['pagina'] = 11;
                }
                break;
            case "lojas-temporarias":
                $data['form3Visible'] = 'visible';
                $this->produtoModel = \model('App\Models\ProdutoModel', false);
                $this->anuncioModel = \model('App\Models\AnuncioModel', false);

                $data['get'] = $get = request()->getGet();

                if ($data['segments'][1] && !is_numeric($data['segments'][1])) {
                    $data['escondeWhatsapp'] = true;
                    helper("utils");
                    helper('encrypt');
                    // Interna

                    $data['lojaAtual'] = $data['metatag'] = $this->produtoModel
                        ->resetQuery()
                        ->dadosCard()
                        ->where("produto.identificador", $data['segments'][1])
                        ->first();

                    $data['coordenadas'] = NULL;
                    $data['style_list'] = ['fancybox', 'swiper', 'jquery_ui'];
                    $data['script_list'] = ['fancybox', 'swiper', 'jquery', 'jquery_ui', 'card-like', 'controller-card', 'controller-presentation', 'faq-dropdown', 'fs-lightbox', 'modal-filter', 'modal-select-order'];
                    $page = "lojas-temporarias-interna";
                    $data['bodyClass'] = "internal-rent";
                    $data['escondeWhatsapp'] = true;

                    $data['fotos'] = $this->produtoModel->fotos($data['lojaAtual']->id, 99, true);
                    $data['lojaAtual']->valores = $this->produtoModel->valores($data['lojaAtual']->id);
                    $data['lojaAtual']->comodidades = $this->produtoModel->comodidades($data['lojaAtual']->id);
                    $data['lojaAtual']->proximidades = $this->produtoModel->proximidades($data['lojaAtual']->id);
                    $data['anunciante'] = $this->produtoModel->anunciante($data['lojaAtual']->anuncianteFK);
                    $data['videos'] = $this->produtoModel->videos($data['metatag']->id);

                    $data['lojaAtual']->total = $this->produtoModel->valorTotal($data['lojaAtual']->valores, $data['lojaAtual']->preco);

                    // Serviços em Alta
                    $this->anuncioModel->resetQuery();
                    $this->anuncioModel->select("produtoFK1, produtoFK2, produtoFK3, produtoFK4, produtoFK5, produtoFK6, produtoFK7");
                    $busca = $this->anuncioModel->find(9);
                } else {
                    $data['style_list'] = ['fancybox', 'swiper'];
                    $data['script_list'] = ['fancybox', 'swiper', 'card-like', 'controller-card', 'controller-imoveis', 'modal-filter', 'modal-select-order'];

                    \helper(['utils']);
                    $data['bodyClass'] = "base-list-map";
                    $data['pagina'] = 24;

                    $data['get'] = $get = request()->getGet();

                    $paginate = \is_numeric($get['page_anuncios']) ? $get['page_anuncios'] : 1;

                    $this->anuncioModel = \model("App\Models\AnuncioModel", false)
                        ->select("anuncio.produtoFK1, anuncio.produtoFK2, anuncio.produtoFK3");
                    $emAlta = $this->anuncioModel->find(4);

                    if ($emAlta->produtoFK1) {
                        $this->produtoModel->resetQuery();
                        $this->produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                        $this->produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                        $this->produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                        $this->produtoModel->join('estado e', 'e.id = c.estadoFK');
                        $data['lojasEmAlta'][0] = $this->produtoModel->find($emAlta->produtoFK1);
                        $data['lojasEmAlta'][0]->fotos = $this->produtoModel->fotos($emAlta->produtoFK1, 4, true);
                    }
                    if ($emAlta->produtoFK2) {
                        $this->produtoModel->resetQuery();
                        $this->produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                        $this->produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                        $this->produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                        $this->produtoModel->join('estado e', 'e.id = c.estadoFK');
                        $data['lojasEmAlta'][1] = $this->produtoModel->find($emAlta->produtoFK2);
                        $data['lojasEmAlta'][1]->fotos = $this->produtoModel->fotos($emAlta->produtoFK2, 4, true);
                    }
                    if ($emAlta->produtoFK3) {
                        $this->produtoModel->resetQuery();
                        $this->produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                        $this->produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                        $this->produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                        $this->produtoModel->join('estado e', 'e.id = c.estadoFK');
                        $data['lojasEmAlta'][2] = $this->produtoModel->find($emAlta->produtoFK3);
                        $data['lojasEmAlta'][2]->fotos = $this->produtoModel->fotos($emAlta->produtoFK3, 4, true);
                    }
                    $contador = 0;
                   

                    $this->produtoModel->resetQuery()
                        ->dadosCard()
                        ->where("pc.tipoFK", $tipo->id)
                        ->where("ativo", 1);
                    $this->produtoModel->filtros($get);
                    $this->produtoModel->ordernar($get['ordem']);
                    $data['lojasTemporarias'] = $this->produtoModel->paginate(32, "anuncios", $paginate);
                    $data['pager'] = $this->produtoModel->pager;

                    if ($data['lojasTemporarias']) {
                        foreach ($data['lojasTemporarias'] as $ind => $produto) {
                            $data['lojasTemporarias'][$ind]->fotos = $this->produtoModel->fotos($produto->id, 4, true);

                            if ($produto->latitude && $produto->latitude) {
                                $produto->coordenadas = $produto->latitude . "," . $produto->longitude;
                            }

                            if ($produto->coordenadas) {
                                $data["coordenadas"][$contador]["id"] = $produto->id;

                                $data["coordenadas"][$contador]["titulo"] = $produto->titulo;
                                $data["coordenadas"][$contador]["foto"] = $produto->fotos[0];
                                $data["coordenadas"][$contador]["preco"] = $produto->preco;

                                $data["coordenadas"][$contador]["pagina"] = "hospedagem";

                                $data["coordenadas"][$contador]["coord"] = $produto->coordenadas;
                                $data["coordenadas"][$contador]["identificador"] = $produto->identificador;
                            }
                            $contador++;
                        }
                    }
                }

                if (!$data['coordenadas']) {
                    $data['coordenadas'] = array();
                }

                $this->produtoModel = \model('App\Models\ProdutoModel', false);
                $data['destaques'] = $this->produtoModel->destaquePrestadores(4);
                break;
            case "saloes-de-festas-e-areas-de-lazer":
                if ($data['segments'][1] && !is_numeric($data['segments'][1])) {
                    $data['escondeWhatsapp'] = true;
                    $page = 'salao-de-festa-e-area-de-lazer';
                    helper('encrypt');
                    helper('utils');
                    $data['style_list'] = ['fancybox', 'swiper', 'jquery_ui'];
                    $data['script_list'] = ['fancybox', 'swiper', 'jquery_ui', 'card-like', 'controller-card', 'controller-page-internal', 'controller-presentation', 'faq-dropdown', 'fs-lightbox', 'modal-filter', 'modal-select-order'];

                    $data['bodyClass'] = 'internal-rent ';
                    $data['tipopagina'] = 'salao-de-festa';

                    $produtoModel = \model("App\Models\ProdutoModel", false);
                    $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                    $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                    $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                    $produtoModel->join('estado e', 'e.id = c.estadoFK');
                    $produtoModel->where('produto.identificador', $data['segments'][1]);
                    $data['metatag'] = $produtoModel->find()[0];
                    $data['fotos'] = $produtoModel->fotos($data['metatag']->id, 999999, false);

                    $data['valores'] = $produtoModel->valores($data['metatag']->id);
                    $data['proximidades'] = $produtoModel->proximidades($data['metatag']->id);
                    $data['anunciante'] = $produtoModel->anunciante($data['metatag']->anuncianteFK);
                    $data['destaques'] = $produtoModel->destaquePrestadores(4);
                    $data['videos'] = $produtoModel->videos($data['metatag']->id);
                    $data['datasOcupada'] = $produtoModel->datasOcupacao($data['metatag']->id);
                } else {
                    $data['form2Visible'] = 'visible';
                    $data['get'] = $get = request()->getGet();

                    $anuncioModel = model('App\Models\AnuncioModel', false);
                    $emAlta = $anuncioModel->find(2);

                    $data['style_list'] = ['fancybox', 'swiper', 'jquery_ui'];
                    $data['script_list'] = ['fancybox', 'swiper', 'card-like', 'jquery_ui', 'controller-card', 'controller-imoveis', 'fs-lightbox', 'modal-filter', 'modal-select-order'];

                    $data['bodyClass'] = 'base-list-map';
                    $data['pagina'] = 25;

                    $produtoModel = \model("App\Models\ProdutoModel", false);

                    $data['destaques'] = $produtoModel->destaquePrestadores(4);

                    if (!is_numeric($get['page_produto'])) {
                        $paginate = 1;
                    } else {
                        $paginate = $get['page_produto'];
                    }
                    if ($emAlta->produtoFK1) {
                        $produtoModel->resetQuery();
                        $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                        $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                        $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                        $produtoModel->join('estado e', 'e.id = c.estadoFK');
                        $produtoModel->where('pc.tipoFK', $tipo->id);
                        $produtoModel->where('ativo', '1');
                        $data['emAlta'][0] = $produtoModel->find($emAlta->produtoFK1);
                        $data['emAlta'][0]->fotos = $produtoModel->fotos($emAlta->produtoFK1, 4, true);
                    }
                    if ($emAlta->produtoFK2) {
                        $produtoModel->resetQuery();
                        $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                        $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                        $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                        $produtoModel->join('estado e', 'e.id = c.estadoFK');
                        $data['emAlta'][1] = $produtoModel->find($emAlta->produtoFK2);
                        $data['emAlta'][1]->fotos = $produtoModel->fotos($emAlta->produtoFK2, 4, true);
                    }
                    if ($emAlta->produtoFK3) {
                        $produtoModel->resetQuery();
                        $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                        $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                        $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                        $produtoModel->join('estado e', 'e.id = c.estadoFK');
                        $data['emAlta'][2] = $produtoModel->find($emAlta->produtoFK3);
                        $data['emAlta'][2]->fotos = $produtoModel->fotos($emAlta->produtoFK3, 4, true);
                    }
                    $contador = 0;

                    $produtoModel->resetQuery();
                    $produtoModel->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
                    $produtoModel->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
                    $produtoModel->join('cidade c', 'c.id = produto.cidadeFK');
                    $produtoModel->join('estado e', 'e.id = c.estadoFK');
                    $produtoModel->where('pc.tipoFK', $tipo->id);
                    $produtoModel->where('ativo', '1');
                    $produtoModel->filtros($get);
                    $data['saloes'] = $produtoModel->paginate(32, 'produto', $paginate);
                    $data['pager'] = $produtoModel->pager;

                    foreach ($data['saloes'] as $ind => $produto) {
                        $data['saloes'][$ind]->fotos = $produtoModel->fotos($produto->id, 4, true);
                        if ($produto->latitude && $produto->latitude) {
                            $produto->coordenadas = $produto->latitude . "," . $produto->longitude;
                        }

                        if ($produto->coordenadas) {
                            $data["coordenadas"][$contador]["id"] = $produto->id;

                            $data["coordenadas"][$contador]["titulo"] = $produto->titulo;
                            $data["coordenadas"][$contador]["foto"] = $data['produtos'][$ind]->fotos[0];
                            $data["coordenadas"][$contador]["preco"] = $produto->preco;

                            $data["coordenadas"][$contador]["pagina"] = "hospedagem";

                            $data["coordenadas"][$contador]["coord"] = $produto->coordenadas;
                            $data["coordenadas"][$contador]["identificador"] = $produto->identificador;
                        }
                        $contador++;
                    }
                }
                break;
            case "aluguel-para-temporada":
                $data['escondeWhatsapp'] = true;
                $data['form1Visible'] = 'visible';
                $data['style_list'] = ['fancybox', 'swiper', 'jquery_ui'];
                $data['script_list'] = ['fancybox', 'swiper', 'card-like', 'controller-blog', 'controller-card', 'controller-presentation', 'controller-page-internal', 'fs-lightbox', 'modal-filter', 'modal-select-order', 'jquery_ui'];

                \helper(['utils']);
                $data['bodyClass'] = "base-list-map";
                $data['pagina'] = 12;

                $data['get'] = $get = request()->getGet();

                $paginate = \is_numeric($get['page_anuncios']) ? $get['page_anuncios'] : 1;

                $this->anuncioModel = \model("App\Models\AnuncioModel", false)
                    ->select("anuncio.produtoFK1, anuncio.produtoFK2, anuncio.produtoFK3, anuncio.produtoFK4, anuncio.produtoFK5, anuncio.produtoFK7");
                $busca = (array) $this->anuncioModel->find(1);

                $this->produtoModel = \model('App\Models\ProdutoModel', false)
                    ->dadosCard()
                    ->whereIn("produto.id", $busca)
                    ->where("ativo", 1);
                $data['alugueisEmAlta'] = $this->produtoModel->findAll();
                $contador = 0;

                $this->produtoModel->resetQuery()
                    ->dadosCard()
                    ->where("pc.tipoFK", $tipo->id)
                    ->where("ativo", 1);
                $this->produtoModel->filtros($get);
                $this->produtoModel->ordernar($get['ordem']);

                $data['alugueisParaTemporada'] = $this->produtoModel->paginate(32, "anuncios", $paginate);
                if ($data['alugueisParaTemporada']) {
                    foreach ($data['alugueisParaTemporada'] as $ind => $produto) {
                        $data['alugueisParaTemporada'][$ind]->fotos = $this->produtoModel->fotos($produto->id, 4, true);

                        if ($produto->latitude && $produto->latitude) {
                            $produto->coordenadas = $produto->latitude . "," . $produto->longitude;
                        }

                        if ($produto->coordenadas) {
                            $data["coordenadas"][$contador]["id"] = $produto->id;

                            $data["coordenadas"][$contador]["titulo"] = $produto->titulo;
                            $data["coordenadas"][$contador]["foto"] = $produto->fotos[0];
                            $data["coordenadas"][$contador]["preco"] = $produto->preco;

                            $data["coordenadas"][$contador]["pagina"] = "hospedagem";

                            $data["coordenadas"][$contador]["coord"] = $produto->coordenadas;
                            $data["coordenadas"][$contador]["identificador"] = $produto->identificador;
                        }
                        $contador++;
                    }
                }

                $data['pager'] = $this->produtoModel->pager;

                foreach ($data['alugueisParaTemporada'] as $item) {
                    $item->fotos = $this->produtoModel->fotos($item->id, 5, true);
                }

                if ($data['segments'][1] && !is_numeric($data['segments'][1])) {
                    helper('encrypt');

                    unset($data['pagina']);

                    $data['espacoAtual'] = $data['metatag'] = $this->produtoModel
                            ->resetQuery()
                            ->dadosCard()
                            ->where("produto.identificador", $data['segments'][1])
                            ->first();

                    $data['videos'] = $this->produtoModel->videos($data['metatag']->id);

                    // Interna
                    $data['script_list'] = ['fancybox', 'swiper', 'sticksy', 'card-like', 'controller-card', 'controller-page-internal', 'controller-presentation', 'faq-dropdown', 'fs-lightbox', 'modal-filter'];

                    $page = "aluguel-para-temporada-interna";
                    $data['bodyClass'] = "internal-rent";

                    $data['fotos'] = $this->produtoModel->fotos($data['metatag']->id, 99);
                    $data['espacoAtual']->valores = $this->produtoModel->valores($data['metatag']->id);
                    // $data['espacoAtual']->fotoDestaque = $this->produtoModel->fotoDestaque($data['espacoAtual']->fotoFK);
                    $data['espacoAtual']->comodidades = $this->produtoModel->comodidades($data['metatag']->id);
                    $data['espacoAtual']->proximidades = $this->produtoModel->proximidades($data['metatag']->id);
                    $data['anunciante'] = $this->produtoModel->anunciante($data['metatag']->anuncianteFK);
                    $data['espacoAtual']->total = $this->produtoModel->valorTotal($data['espacoAtual']->valores, $data['metatag']->preco);

                    // Serviços em Alta
                    $this->anuncioModel->resetQuery()
                        ->select("produtoFK1, produtoFK2, produtoFK3, produtoFK4, produtoFK5, produtoFK6, produtoFK7");
                    $busca = $this->anuncioModel->find(9);

                    $this->produtoModel->resetQuery()
                        ->dadosCard()
                        ->whereIn("produto.id", (array) $busca)
                        ->orderBy("rand()");
                    $this->produtoModel->limit(4);
                    $data['servicosEmAlta'] = $this->produtoModel->findAll(4);
                    foreach ($data['servicosEmAlta'] as $ind => $emAlta) {
                        $data['servicosEmAlta'][$ind]->fotos = $this->produtoModel->fotos($emAlta->id, 4);
                    }
                }

                if (!$data['coordenadas']) {
                    $data['coordenadas'] = array();
                }


                break;
        }
        $data['page'] = $page;
        return $data;
    }
}
