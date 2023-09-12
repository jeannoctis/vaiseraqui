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
    protected $allowedFields = ['titulo', 'descricao', 'ordem', 'identificador', 'proximidades', 'video', 'ativo', 'validade', 'anuncianteFK',
        'endereco', 'bairro', 'destaque', 'validadeDestaque', 'apresentacao', 'inicioValidade', 'inicioDestaque', 'cidadeFK',
        'mapa', 'acomodacao', 'permitido', 'proibido', 'texto', 'itens', 'lazer', 'categoriaFK', 'arquivo', 'capacidadeFK', 
        'hospedes', 'limpeza', 'latitude', 'longitude', 'captadorFK', 'planoFK', 'calendario', 'preco', 'apartir', 'principaiscomodidades', 
        'itensdisponiveis', 'areautil', 'quartos', 'banheiros', 'vagas', 'andar', 'animais', 'mobilia', 'transporte', 'condominio',
        'observacoes', 'pode', 'naopode', 'cardapio', 'eventosatendidos', 'coordenadas', 'regrascheck', 'detalhes', 'fotoFK', 'local'];
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
        $produtoFotoModel->limit($limit);
        $fotos = $produtoFotoModel->findAll();

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
        $this->select('produto.*, pc.titulo as categoria, c.titulo as cidade, e.sigla as estado');
        $this->join('produto_categoria pc', 'pc.id = produto.categoriaFK');
        $this->join('cidade c', 'c.id = produto.cidadeFK');
        $this->join('estado e', 'e.id = c.estadoFK');
        $this->where('pc.tipoFK', 6);
        $this->where('ativo', '1');
        $this->where('destaque', '1');
        $this->orderBy('rand()');
        $destaques = $this->findAll($limit);
        if ($destaques) {
            foreach ($destaques as $ind => $destaque) {
                $destaques[$ind]->fotos = $this->fotos($destaque->id, 4, true);
                if (!$destaques[$ind]->fotos[0]->destaque) {
                    $destaques[$ind]->fotos =  $this->fotoPrincipal($destaques[$ind]->fotos);
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

    public function responsavel($id)
    {
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
              
        if($anunciante->telefone) {
             $anunciante->whatsapp = "https://" . $usaApi . ".whatsapp.com/send?phone=55" . str_replace($removeChars, "",$anunciante->telefone);
        }
        if($anunciante->telefone2) {
             $anunciante->whatsapp2 = "https://" . $usaApi . ".whatsapp.com/send?phone=55" . str_replace($removeChars, "",$anunciante->telefone2);
        }
        
        if($anunciante->telefone3) {
             $anunciante->whatsapp3 = "https://" . $usaApi . ".whatsapp.com/send?phone=55" . str_replace($removeChars, "",$anunciante->telefone3);
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
        return $this->select("produto.*, pc.titulo as categoria ,c.titulo as cidade, e.sigla as estado")
                        ->join("produto_categoria pc", "pc.id = produto.categoriaFK")
                        ->join("cidade c", "c.id = produto.cidadeFK")
                        ->join("estado e", "e.id = c.estadoFK");
    }

    public function hospedagens($limit)
    {

        $data['get'] = $get = \request()->getGet();

        if (!is_numeric($get['page_produto'])) {
            $paginate = 1;
        } else {
            $paginate = $get['page_produto'];
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
            
          }else if ($ordem == "menor") {
            return $this->orderBy("preco ASC");
        }
    }            
             
    public function eventos($get) {

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
             $eventos[$ind]->fotos = $this->fotos($evento->id,1,false);
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
        <div class="item show" data-modal="">
            <? if ($categorias) { ?>
                <div class="events-with-data j-calendar-columns">
                    <? foreach ($categorias as $categoria) { ?>
                        <div class="column">
                            <h3><?= $categoria->titulo ?></h3>
                            <div class="scroll-h">
                                <div class="wraper">
                                    <?
                                    if ($categoria->eventos) {
                                        foreach ($categoria->eventos as $evento) {
                                            ?>
                                            <div onclick="window.location.href='<?=PATHSITE?>evento/<?=$evento->identificador?>/'" class="item" style="background-image: url('<?= PATHSITE ?>uploads/produto/<?=$evento->id?>/<?=$evento->fotos[0]->arquivo?>');">
                                                <h4><?= $evento->titulo ?></h4>
                                                <div class="box-address">
                                                    <img src="<?= PATHSITE ?>assets/images/icon-map.svg" alt="">
                                                    <span>
                                                        <?=$evento->local?> <br>
                                                        <?=$evento->cidade?>- <?=$evento->estado?>
                                                    </span>
                                                </div>
                                                <a href="<?=PATHSITE?>evento/<?=$evento->identificador?>/">Mais detalhes <img src="<?= PATHSITE ?>assets/images/icon-arrow-right.svg" alt=""></a>
                                            </div>
                                        <? }
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
            </div>
        <? } ?>
        <?
        $retorno['html'] = ob_get_clean();
        echo json_encode($retorno);
    }
}
