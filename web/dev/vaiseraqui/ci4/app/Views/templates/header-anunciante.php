<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="<?= PATHSITE ?>admins/assets/plugin/tagit/tag-it.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= PATHSITE ?>style2.css?v=1.0.4">
    <link rel="shortcut icon" type="image/x-icon" href="<?= PATHSITE ?>images/favicon.ico">
    <link rel="stylesheet" href="<?= PATHSITE ?>admins/assets/plugin/sweet-alert/sweetalert.css">

    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">
    <title>Área do Anunciante - Vai Ser Aqui</title>
</head>

<body>
    <section class="sidebar" id="menuOpen">
        <div class="conteudoSidebar">
            <a href="javascript:void(0)" class="closeMenu" onclick="closeNav()">
                <img src="<?= PATHSITE ?>images/menufechar.png">
            </a>

            <a href="<?= PATHSITE ?>" target="_blank">
                <img src="<?= PATHSITE ?>images/logo-branco.svg" class="logo">
            </a>
            <div class="areaEscolha">
                <div class="filtroSelecao">
                    <div class="col-12">
                        <div class="botaoSelecaoFiltro botaoSelecaoFiltroInterno  openBoxFiltro" data-busca=".filtroTipo2">
                            <img src="<?= PATHSITE ?>" alt="ícone" width="22"> <span id="nomeTipo"> <?= $tipoAtual->titulo ?> </span> <img src="<?= PATHSITE ?>images/icone_menu.svg">
                        </div>
                    </div>


                    <? if ($tipos) { ?>
                        <div class="boxFiltroDesativado filtroTipo2">
                            <? foreach ($tipos as $ind => $tipo) { ?>
                                <a href="javascript:void(0)" onclick="atualizaTipo(<?= $ind ?>, '<?= $tipo ?>')">
                                    <?= $tipo ?>
                                </a>
                            <? } ?>
                        </div>
                    <? } ?>
                    <div class="col-12 mb-3 mt-2">
                        <div class="botaoSelecaoFiltro botaoSelecaoFiltroInterno  openBoxFiltro" data-busca=".filtroTipo">
                            <?= $anuncio->titulo ?> <img src="<?= PATHSITE ?>images/icone_menu.svg">
                        </div>
                    </div>

                    <? if ($anuncios) { ?>
                        <div class="boxFiltroDesativado filtroTipo">
                            <? foreach ($anuncios as $anun) { ?>
                                <a class="tipoGeral tipo-<?= $anun->tipoFK ?>" href="<?= PATHSITE ?>area-do-anunciante/troca-anuncio/<?= encode($anun->id) ?>">
                                    <?= $anun->titulo ?>
                                </a>
                            <? } ?>
                        </div>
                    <? } ?>
                </div>

            </div>
            <div class="menuPainel">
                <? if ($anuncios) { ?>
                    <a href="<?= PATHSITE ?>area-do-anunciante/inicio/" class="itemMenuPainel <?= ($segments[1] == 'inicio') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icon-dashboard.svg">
                        <h5>Dashboard</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/dados" class="itemMenuPainel <?= ($segments[1] == 'dados') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icon-write.svg">
                        <h5>Dados do imóvel</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/perfil/" class="itemMenuPainel <?= ($segments[1] == 'contatos' || $segments[1] == 'perfil') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icon-phone.svg">
                        <h5>Contatos</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/fotos/" class="itemMenuPainel <?= ($segments[1] == 'fotos') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icon-image.svg">
                        <h5>Fotos</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/video/" class="itemMenuPainel <?= ($segments[1] == 'video') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icon-video.svg">
                        <h5>Vídeos </h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/acomodacoes" class="itemMenuPainel <?= ($segments[1] == 'acomodacoes') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icon-bathtub.svg">
                        <h5>Comodidades</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/proximidades" class="itemMenuPainel <?= ($segments[1] == 'proximidades') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icon-tree.svg">
                        <h5>Proximidades</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/condominio" class="itemMenuPainel <?= ($segments[1] == 'proximidades') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icon-condominio.svg">
                        <h5>Condomínio</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/obervacoes" class="itemMenuPainel <?= ($segments[1] == 'proximidades') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icon-observation.svg">
                        <h5>Observações</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/calendario" class="itemMenuPainel <?= ($segments[1] == 'calendario') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icon-calendar.svg">
                        <h5>Calendário</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/feriados" class="itemMenuPainel <?= ($segments[1] == 'calendario') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icon-vacation.svg">
                        <h5>Feriados</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/precos" class="itemMenuPainel <?= ($segments[1] == 'precos') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icon-pricing.svg">
                        <h5>Valores / Ingressos</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/precos" class="itemMenuPainel <?= ($segments[1] == 'precos') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icon-sales-point.svg">
                        <h5>Pontos de Venda</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/precos" class="itemMenuPainel <?= ($segments[1] == 'precos') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icon-crew.svg">
                        <h5>Organização</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/cardapio" class="itemMenuPainel <?= ($segments[1] == 'cardapio') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icon-menu.svg">
                        <h5>Cardápio (somente para buffet)</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/principais-comodidades" class="itemMenuPainel <?= ($segments[1] == 'principais-comodidades') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/map-icon.svg">
                        <h5>Principais comodidades</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/dados-local" class="itemMenuPainel <?= ($segments[1] == 'dados-local') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icone_dados.svg">
                        <h5>Dados do local</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/dados-evento" class="itemMenuPainel <?= ($segments[1] == 'dados-evento') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icone_dados.svg">
                        <h5>Dados do evento</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/dados-servico" class="itemMenuPainel <?= ($segments[1] == 'dados-servico') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icone_dados.svg">
                        <h5>Dados do serviço</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/o-que-tem-no-imovel" class="itemMenuPainel <?= ($segments[1] == 'o-que-tem-no-imovel') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icone_ok.svg">
                        <h5>Comodidades</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/lazer" class="itemMenuPainel <?= ($segments[1] == 'lazer') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icone_lazer.svg">
                        <h5>Lazer</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/atende-em" class="itemMenuPainel <?= ($segments[1] == 'atende-em') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icone_ok.svg">
                        <h5>Atende em</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/o-que-servimos" class="itemMenuPainel <?= ($segments[1] == 'atende-em') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icon_drink_.svg">
                        <h5>O que servimos</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/shows-ao-vivo" class="itemMenuPainel <?= ($segments[1] == 'atende-em') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icon_show.svg">
                        <h5>Shows ao vivo</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/textos" class="itemMenuPainel <?= ($segments[1] == 'textos') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icone_abas.svg">
                        <h5>Textos</h5>
                    </a>

                    <a href="<?= PATHSITE ?>area-do-anunciante/downloads" class="itemMenuPainel <?= ($segments[1] == 'downloads') ? 'menuAtivo' : '' ?>">
                        <img src="<?= PATHSITE ?>images/icone_download.svg">
                        <h5>Download</h5>
                    </a>
                <? } ?>
                <a href="<?= PATHSITE ?>logout" class="itemMenuPainel ">
                    <img src="<?= PATHSITE ?>images/icone_download.svg">
                    <h5>Sair</h5>
                </a>

            </div>
        </div>
    </section>