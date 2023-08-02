<main class="internal-project">
    <div class="box-gallery">
        <div class="content">

            <div class="gallery">
                <div class="main-cover">
                    <img src="<?= PATHSITE ?>uploads/pj_foto/<?= $pjAtual->fotos[0]->arquivo ?>" alt="capa do projeto">
                </div>
                <div class="swiper gallerySwiper gallery-scroll">
                    <div class="swiper-wrapper gallery-list">

                        <? foreach ($pjAtual->fotos as $ind => $foto) { ?>

                            <div data-image-source="<?= PATHSITE ?>uploads/pj_foto/<?= $foto->arquivo ?>" class="swiper-slide item <?= $ind == 0 ? 'active' : '' ?>">
                                <img src="<?= PATHSITE ?>uploads/pj_foto/<?= $foto->arquivo ?>" alt="foto do projeto">
                            </div>

                        <? } ?>

                    </div>
                </div>
            </div>

            <div class="text">
                <h2><?= $pjAtual->titulo ?></h2>
                <span>R$<?= number_format($pjAtual->valor, 2, ',', '.') ?></span>

                <div class="table-list open">
                    <h2 class="title">
                        <span>Informações Gerais</span>
                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 5L5 1L1 5" stroke="#333333" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </h2>
                    <div class="table-content">
                        <p class="line">
                            <img src="<?= PATHSITE ?>assets/images/icon-table-area.svg" alt="ícone área útil" loading="lazy">
                                <span>Área útil</span> <span><?= $pjAtual->areautil ?> m²</span>
                        </p>
                        <p class="line">
                            <img src="<?= PATHSITE ?>assets/images/icon-table-larg.svg" alt="ícone largura por fundo" loading="lazy">
                                <span>Largura x Fundo (m)</span> <span><?= $pjAtual->dimensoes ?></span>
                        </p>
                        <p class="line">
                            <img src="<?= PATHSITE ?>assets/images/icon-table-lote-min.svg" alt="ícone lote mínimo" loading="lazy">
                                <span>Lote mínimo (m²)</span> <span><?= $pjAtual->loteminimo ?></span>
                        </p>
                        <p class="line">
                            <img src="<?= PATHSITE ?>assets/images/icon-table-quarto.svg" alt="ícone quartos e suítes" loading="lazy">
                                <span>Quartos</span> <span><?= $pjAtual->quartos ?>+<?= $pjAtual->suites ?></span>
                        </p>
                        <p class="line">
                            <img src="<?= PATHSITE ?>assets/images/icon-table-banheiro.svg" alt="ícone banheiros" loading="lazy">
                                <span>Banheiros</span> <span><?= $pjAtual->banheiros ?></span>
                        </p>
                        <p class="line">
                            <img src="<?= PATHSITE ?>assets/images/icon-table-vagas.svg" alt="ícone vagas" loading="lazy">
                                <span>Vagas de Garagem</span> <span><?= $pjAtual->vagas ?></span>
                        </p>
                        <? if ($pjAtual->churrasqueira == 'S') { ?>
                            <p class="line">
                                <img src="<?= PATHSITE ?>assets/images/icon-table-churrasqueira.svg" alt="ícone churrasqueira" loading="lazy">
                                    <span>Churrasqueira</span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px">
                                            <path d="M 19.980469 5.9902344 A 1.0001 1.0001 0 0 0 19.292969 6.2929688 L 9 16.585938 L 5.7070312 13.292969 A 1.0001 1.0001 0 1 0 4.2929688 14.707031 L 8.2929688 18.707031 A 1.0001 1.0001 0 0 0 9.7070312 18.707031 L 20.707031 7.7070312 A 1.0001 1.0001 0 0 0 19.980469 5.9902344 z" fill="#607380" />
                                        </svg>
                                    </span>
                            </p>
                        <? } ?>

                        <? if ($pjAtual->piscina == 'S') { ?>
                            <p class="line">
                                <img src="<?= PATHSITE ?>assets/images/icon-table-piscina.svg" alt="ícone piscina" loading="lazy">
                                    <span>Piscina</span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px">
                                            <path d="M 19.980469 5.9902344 A 1.0001 1.0001 0 0 0 19.292969 6.2929688 L 9 16.585938 L 5.7070312 13.292969 A 1.0001 1.0001 0 1 0 4.2929688 14.707031 L 8.2929688 18.707031 A 1.0001 1.0001 0 0 0 9.7070312 18.707031 L 20.707031 7.7070312 A 1.0001 1.0001 0 0 0 19.980469 5.9902344 z" fill="#607380" />
                                        </svg>
                                    </span>
                            </p>
                        <? } ?>

                        <? if ($pjAtual->escritorio == 'S') { ?>
                            <p class="line">
                                <img src="<?= PATHSITE ?>assets/images/icon-table-escritorio.svg" alt="ícone escritório" loading="lazy">
                                    <span>Escritório</span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px">
                                            <path d="M 19.980469 5.9902344 A 1.0001 1.0001 0 0 0 19.292969 6.2929688 L 9 16.585938 L 5.7070312 13.292969 A 1.0001 1.0001 0 1 0 4.2929688 14.707031 L 8.2929688 18.707031 A 1.0001 1.0001 0 0 0 9.7070312 18.707031 L 20.707031 7.7070312 A 1.0001 1.0001 0 0 0 19.980469 5.9902344 z" fill="#607380" />
                                        </svg>
                                    </span>
                            </p>
                        <? } ?>

                    </div>
                </div>
                <h3>Descrição</h3>
                <p>
                    <?= $pjAtual->descricao ?>
                </p>
                <a href="<?= PATHSITE ?>finalize-pedido?projeto=<?= $pjAtual->identificador ?>" class="btn-primary">Comprar</a>
            </div>

        </div>
    </div>

    <div class="informations" data-aos="fade-up">
        <div class="content">
            <h2>Informações Gerais</h2>
            <div class="table-group">
                <div class="table">
                    <div class="tr">
                        <div class="td"><img src="<?= PATHSITE ?>assets/images/icon-table-area.svg" alt="ícone área útil" loading="lazy"> Área útil</div>
                        <div class="td"><?= $pjAtual->areautil ?> m²</div>
                    </div>
                    <div class="tr">
                        <div class="td"><img src="<?= PATHSITE ?>assets/images/icon-table-lote-min.svg" alt="ícone lote mínimo" loading="lazy"> Lote mínimo (m²)</div>
                        <div class="td"><?= $pjAtual->loteminimo ?></div>
                    </div>
                    <div class="tr">
                        <div class="td"><img src="<?= PATHSITE ?>assets/images/icon-table-banheiro.svg" alt="ícone banheiros" loading="lazy"> Banheiros</div>
                        <div class="td"><?= $pjAtual->banheiros ?></div>
                    </div>
                    <? if ($pjAtual->churrasqueira == 'S') { ?>
                        <div class="tr">
                            <div class="td"><img src="<?= PATHSITE ?>assets/images/icon-table-churrasqueira.svg" alt="ícone churrasqueira" loading="lazy"> Churrasqueira</div>
                            <div class="td">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px">
                                    <path d="M 19.980469 5.9902344 A 1.0001 1.0001 0 0 0 19.292969 6.2929688 L 9 16.585938 L 5.7070312 13.292969 A 1.0001 1.0001 0 1 0 4.2929688 14.707031 L 8.2929688 18.707031 A 1.0001 1.0001 0 0 0 9.7070312 18.707031 L 20.707031 7.7070312 A 1.0001 1.0001 0 0 0 19.980469 5.9902344 z" fill="#607380" />
                                </svg>
                            </div>
                        </div>
                    <? } ?>
                    <? if ($pjAtual->escritorio == 'S') { ?>
                        <div class="tr">
                            <div class="td"><img src="<?= PATHSITE ?>assets/images/icon-table-escritorio.svg" alt="ícone escritório" loading="lazy"> Escritório</div>
                            <div class="td">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px">
                                    <path d="M 19.980469 5.9902344 A 1.0001 1.0001 0 0 0 19.292969 6.2929688 L 9 16.585938 L 5.7070312 13.292969 A 1.0001 1.0001 0 1 0 4.2929688 14.707031 L 8.2929688 18.707031 A 1.0001 1.0001 0 0 0 9.7070312 18.707031 L 20.707031 7.7070312 A 1.0001 1.0001 0 0 0 19.980469 5.9902344 z" fill="#607380" />
                                </svg>
                            </div>
                        </div>
                    <? } ?>
                </div>
                <div class="table">
                    <div class="tr">
                        <div class="td"><img src="<?= PATHSITE ?>assets/images/icon-table-larg.svg" alt="ícone largura por fundo" loading="lazy"> Largura x Fundo (m)</div>
                        <div class="td"><?= $pjAtual->dimensoes ?></div>
                    </div>
                    <div class="tr">
                        <div class="td"><img src="<?= PATHSITE ?>assets/images/icon-table-quarto.svg" alt="ícone quartos e suítes" loading="lazy"> Quartos</div>
                        <div class="td"><?= $pjAtual->quartos ?>x<?= $pjAtual->suites ?></div>
                    </div>
                    <div class="tr">
                        <div class="td"><img src="<?= PATHSITE ?>assets/images/icon-table-vagas.svg" alt="ícone vagas" loading="lazy"> Vagas de Garagem</div>
                        <div class="td"><?= $pjAtual->vagas ?></div>
                    </div>
                    <? if ($pjAtual->piscina == 'S') { ?>
                        <div class="tr">
                            <div class="td"><img src="<?= PATHSITE ?>assets/images/icon-table-piscina.svg" alt="ícone piscina" loading="lazy"> Piscina</div>
                            <div class="td">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px">
                                    <path d="M 19.980469 5.9902344 A 1.0001 1.0001 0 0 0 19.292969 6.2929688 L 9 16.585938 L 5.7070312 13.292969 A 1.0001 1.0001 0 1 0 4.2929688 14.707031 L 8.2929688 18.707031 A 1.0001 1.0001 0 0 0 9.7070312 18.707031 L 20.707031 7.7070312 A 1.0001 1.0001 0 0 0 19.980469 5.9902344 z" fill="#607380" />
                                </svg>
                            </div>
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>
    </div>

    <? if (!empty($pjAtual->plantas)) { ?>
        <div class="blue-print">
            <div class="content">
                <h2 data-aos="fade-right">Planta Baixa</h2>
                <p data-aos="fade-right" class="only-mobile">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_607_441)">
                            <path d="M15.9922 6.4621L12.2872 2.7571C12.1114 2.58165 11.8731 2.48311 11.6246 2.48311C11.3762 2.48311 11.1379 2.58165 10.962 2.7571L2.757 10.9621C2.58131 11.138 2.48264 11.3765 2.48264 11.6251C2.48264 11.8737 2.58131 12.1122 2.757 12.2881L6.462 15.9931C6.54906 16.0802 6.65242 16.1493 6.76618 16.1964C6.87994 16.2435 7.00186 16.2678 7.125 16.2678C7.24813 16.2678 7.37006 16.2435 7.48382 16.1964C7.59758 16.1493 7.70094 16.0802 7.788 15.9931L15.993 7.7881C16.1687 7.61218 16.2674 7.37372 16.2674 7.1251C16.2674 6.87648 16.1679 6.63802 15.9922 6.4621ZM10.5 4.28035L14.4697 8.2501L8.625 14.0949L4.65525 10.1251L10.5 4.28035ZM7.25775 15.4629C7.24033 15.4803 7.21964 15.4942 7.19686 15.5036C7.17408 15.5131 7.14966 15.5179 7.125 15.5179C7.10034 15.5179 7.07592 15.5131 7.05314 15.5036C7.03036 15.4942 7.00967 15.4803 6.99225 15.4629L5.88975 14.3604L6.26475 13.9854L4.76475 12.4853L4.38975 12.8603L3.28725 11.7579C3.26979 11.7404 3.25594 11.7197 3.24648 11.697C3.23703 11.6742 3.23216 11.6498 3.23216 11.6251C3.23216 11.6004 3.23703 11.576 3.24648 11.5532C3.25594 11.5305 3.26979 11.5098 3.28725 11.4924L4.125 10.6554L8.09475 14.6251L7.25775 15.4629ZM15.4627 7.25785L15 7.71985L11.0302 3.7501L11.4922 3.2881C11.5097 3.27064 11.5304 3.25679 11.5531 3.24733C11.5759 3.23788 11.6003 3.23302 11.625 3.23302C11.6497 3.23302 11.6741 3.23788 11.6969 3.24733C11.7196 3.25679 11.7403 3.27064 11.7577 3.2881L15.4627 6.9931C15.4978 7.02825 15.5175 7.07585 15.5175 7.12548C15.5175 7.1751 15.4978 7.2227 15.4627 7.25785ZM16.5082 11.9566V13.5001C16.5077 14.0967 16.2704 14.6686 15.8486 15.0904C15.4268 15.5123 14.8548 15.7495 14.2582 15.7501H11.7892L13.0155 16.9756L12.4852 17.5058L10.3492 15.3706L12.4852 13.2346L13.0155 13.7649L11.7802 15.0001H14.2582C14.656 14.9997 15.0373 14.8415 15.3185 14.5603C15.5997 14.2791 15.7579 13.8978 15.7582 13.5001V11.9566H16.5082ZM3 6.7501H2.25V5.2501C2.2506 4.65355 2.48784 4.0816 2.90967 3.65977C3.3315 3.23794 3.90345 3.0007 4.5 3.0001H6.96975L5.7345 1.7656L6.26475 1.23535L8.40075 3.3706L6.2655 5.5051L5.73525 4.97485L6.96 3.7501H4.5C4.1023 3.7505 3.721 3.90866 3.43978 4.18988C3.15856 4.4711 3.0004 4.8524 3 5.2501V6.7501Z" fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_607_441">
                                <rect width="18" height="18" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <span>Rotacione o seu celular para melhor visualização</span>
                </p>
                <div class="swiper custom blueSwiper" data-aos="fade-left">
                    <div class="swiper-wrapper">
                        <? foreach ($pjAtual->plantas as $planta) { ?>
                            <div class="swiper-slide">
                                <div class="cover">
                                    <img src="<?= PATHSITE ?>uploads/pj_planta/<?= $planta->arquivo ?>" alt="imagem da planta baixa do projeto" loading="lazy">
                                </div>
                            </div>
                        <? } ?>
                    </div>
                    <div class="navigation">
                        <div class="buttons">
                            <button class="prev">
                                <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M-6.21809e-07 8.33949L8.48552 16L10.6065 14.2301L5.742 9.85227L22 9.85227L22 7.00426L5.742 7.00426L10.6065 2.13778L8.48552 1.09698e-06L-6.21809e-07 8.33949Z" fill="#333333" />
                                </svg>
                            </button>
                            <button class="has-more next">
                                <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22 7.66051L13.5145 0L11.3935 1.76989L16.258 6.14773H0V8.99574H16.258L11.3935 13.8622L13.5145 16L22 7.66051Z" fill="white" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    <? } ?>

    <? if (!empty($pjAtual->videos)) { ?>
        <div class="virtual-tour">
            <div class="content">
                <h2 data-aos="fade-up">Tour virtual</h2>
                <div class="swiper custom tourVirtual" data-aos="fade-up">
                    <div class="swiper-wrapper">
                        <? foreach ($pjAtual->videos as $video) { ?>
                            <div class="swiper-slide">
                                <div class="video">
                                    <span class="badget"><?= $video->titulo ?></span>
                                    <?
                                    if ($video->video) {
                                        $url_components = parse_url($video->video);
                                        if ($url_components) {
                                            parse_str($url_components['query'], $params);
                                        }
                                    }
                                    ?>
                                    <!-- <button class="play" data-video-id="<?= $params['v'] ?>">
                                       <svg width="108" height="108" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="60" cy="60" r="60" fill="black" fill-opacity="0.7" />
                                          <path d="M79.5 57.4019C81.5 58.5566 81.5 61.4434 79.5 62.5981L52.5 78.1865C50.5 79.3412 48 77.8979 48 75.5885L48 44.4115C48 42.1021 50.5 40.6588 52.5 41.8135L79.5 57.4019Z" fill="white" />
                                       </svg>
                                    </button> -->
                                    <div class="embed">
                                        <iframe width="" height="" src="https://www.youtube.com/embed/<?= $params['v'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
    <? } ?>
                    </div>
                    <div class="navigation">
                        <div class="buttons">
                            <button class="prev">
                                <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M-6.21809e-07 8.33949L8.48552 16L10.6065 14.2301L5.742 9.85227L22 9.85227L22 7.00426L5.742 7.00426L10.6065 2.13778L8.48552 1.09698e-06L-6.21809e-07 8.33949Z" fill="#333333" />
                                </svg>
                            </button>
                            <button class="has-more next">
                                <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22 7.66051L13.5145 0L11.3935 1.76989L16.258 6.14773H0V8.99574H16.258L11.3935 13.8622L13.5145 16L22 7.66051Z" fill="white" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
<? } ?>

    <form action="<?= PATHSITE ?>finalize-pedido/" method="get">
        <div class="what-more" data-aos="fade-up">
            <div class="content">
                <div class="box">
                    <h2>O que você recebe?</h2>

                    <h3>Arquitetura</h3>
                    <ul>
                        <? $incluso = explode(";", $pjAtual->incluso);
                        foreach ($incluso as $item) {
                            ?>
                            <li><img src="<?= PATHSITE ?>assets/images/icon-check.svg" alt="icone verificado" loading="lazy"> <?= $item ?></li>
                    <? } ?>
                    </ul>
<? if (!empty($pjAtual->adicionais)) { ?>
                        <p>Além disso, caso você queira deixar o seu projeo mais completo, você pode adquirir adicionais.</p>
    <? foreach ($pjAtual->adicionais as $adicional) { ?>
                            <div class="item">
                                <label>
                                    <input type="hidden" name="projeto" value="<?= $pjAtual->identificador ?>" />
                                    <div class="checkbox">
                                        <input value="<?= $adicional->id ?>" name="adicional[]" type="checkbox" />
                                        <svg viewBox="0 0 21 18">
                                            <symbol id="tick-path" viewBox="0 0 21 18" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.22003 7.26C5.72003 7.76 7.57 9.7 8.67 11.45C12.2 6.05 15.65 3.5 19.19 1.69" fill="none" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                                            </symbol>
                                            <defs>
                                                <mask id="tick">
                                                    <use class="tick mask" href="#tick-path" />
                                                </mask>
                                            </defs>
                                            <use class="tick" href="#tick-path" stroke="currentColor" />
                                            <path fill="transparent" mask="url(#tick)" d="M18 9C18 10.4464 17.9036 11.8929 17.7589 13.1464C17.5179 15.6054 15.6054 17.5179 13.1625 17.7589C11.8929 17.9036 10.4464 18 9 18C7.55357 18 6.10714 17.9036 4.85357 17.7589C2.39464 17.5179 0.498214 15.6054 0.241071 13.1464C0.0964286 11.8929 0 10.4464 0 9C0 7.55357 0.0964286 6.10714 0.241071 4.8375C0.498214 2.39464 2.39464 0.482143 4.85357 0.241071C6.10714 0.0964286 7.55357 0 9 0C10.4464 0 11.8929 0.0964286 13.1625 0.241071C15.6054 0.482143 17.5179 2.39464 17.7589 4.8375C17.9036 6.10714 18 7.55357 18 9Z" />
                                        </svg>
                                        <svg class="lines" viewBox="0 0 11 11">
                                            <path d="M5.88086 5.89441L9.53504 4.26746" />
                                            <path d="M5.5274 8.78838L9.45391 9.55161" />
                                            <path d="M3.49371 4.22065L5.55387 0.79198" />
                                        </svg>
                                    </div>
                                </label>
                                <div>
                                    <p class="title"><?= $adicional->titulo ?></p>
                                    <a href="#" class="more j-button-open-modal" data-adicional="<?= $adicional->id ?>">+ detalhes</a>
                                </div>
                                <p>+ R$<?= number_format($adicional->valor, 2, ',', '.') ?></p>
                            </div>
                        <? } ?>
                        <button type="submit" class="btn-primary">Adicionar ao pedido</button>
                        <input type="hidden" name="projeto" value="<?= $pjAtual->identificador ?>" />
<? } ?>
                    <img src="<?= PATHSITE ?>assets/images/cover-internal-projects.jpg" alt="capa de arquitetura do projeto" class="lateral" loading="lazy">
                </div>
            </div>
        </div>
    </form>

    <div class="review-text" data-aos="fade-left">
        <div class="content">
            <p><?= $txDireitosAutorais->texto ?></p>
        </div>
    </div>

<? if ($pjRelacionados) { ?>
        <div class="recent-projects" data-aos="fade-up">
            <div class="content">
                <div class="group-title">
                    <h3>Produtos Relacionados</h3>
                </div>
                <div class="wraper">
    <?
    foreach ($pjRelacionados as $projeto) {
        echo view("templates/project-card", (array) $projeto);
    }
    ?>
                </div>
                <div class="swiper itemsScroll">
                    <div class="swiper-wrapper">
    <? foreach ($pjRelacionados as $projeto) { ?>
                            <div class="swiper-slide item">
        <?= view("templates/project-card", (array) $projeto) ?>
                            </div>
        <? } ?>
                    </div>
                </div>
            </div>
        </div>
<? } ?>
</main>

<? if (!empty($pjAtual->adicionais)) { ?>
    <? foreach ($pjAtual->adicionais as $adicional) { ?>
        <div class="modal-project" data-adicional="<?= $adicional->id ?>">
            <div class="modal-project-content">
                <div class="body">
                    <h3 class="subtitle">
                        <span>Mais detalhes do adicional</span>
                        <svg class="j-button-close" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect y="0.702084" width="21.9795" height="1.29795" rx="0.648975" transform="matrix(0.712094 0.702084 -0.712094 0.702084 2.13667 0.463068)" fill="#333333" stroke="#333333" />
                            <rect x="0.712094" y="-1.19209e-07" width="21.9795" height="1.29795" rx="0.648975" transform="matrix(0.712094 -0.702084 0.712094 0.702084 0.205016 16.6337)" fill="#333333" stroke="#333333" />
                        </svg>
                    </h3>
                    <h2 class="title"><?= $adicional->titulo ?></h2>
                    <p><?= $adicional->texto ?></p>
                    <h3 class="subtitle-2">Imagem de Exemplo</h3>
                    <img src="<?= PATHSITE ?>uploads/pj_adicional/<?= $adicional->arquivo ?>" alt="imagem exemplo do serviço adicional" class="cover" loading="lazy">
                </div>
            </div>
        </div>
    <? } ?>
<? } ?>