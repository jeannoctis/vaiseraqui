<main>
    <section class="s-with-maps">      
        <div class="column" data-aos="fade-right">
            <header class="s-with-maps-header">
                <div class="left-space">
                    <nav class="box-breadcrumbs">
                        <span>Início</span>
                        <img src="<?= PATHSITE ?>assets/images/icon-bread-crumbs.svg" alt="">
                            <a href="#">Hospedagem</a>
                    </nav>
                    <span class="result"><?=count($produtos)?> hospedagens encontrados</span>
                    <form class="form-order">
                        <a href="#" class="btn-primary">
                            <img src="<?= PATHSITE ?>assets/images/icon-button-filter.svg" alt="icon filter">
                                Filtros
                        </a>
                        <div class="input-order j-input-order-select">
                            <label for="order">
                                <img src="<?= PATHSITE ?>assets/images/icon-order.svg" alt="">
                                    <img class="active" src="<?= PATHSITE ?>assets/images/icon-order-active.svg" alt="">
                                        Ordenar por:
                                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 1L5 5L9 1" stroke="#404041" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>                    
                                        <svg class="active" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 1L5 5L9 1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>                    
                                        </label>
                                        <div class="modal-order">
                                            <input type="text" readonly="" value="Menor preço - Maior preço">                
                                                <div class="modal-order-select">
                                                    <div class="wraper-scroll">
                                                        <nav class="content">
                                                            <a data-select-value="Maior preço - Menor preço" href="#maior-menor">Maior preço - Menor preço</a>
                                                            <a data-select-value="Menor preço - Maior preço" href="#menor-maior" class="active">Menor preço - Maior preço</a>
                                                            <a data-select-value="Entre R$800,00 e R$1.200,00" href="#entre-800-1200">Entre R$800,00 e R$1.200,00</a>
                                                            <a data-select-value="Entre R$1.200,00 e R$1.600,00" href="#entre-1200-1600">Entre R$1.200,00 e R$1.600,00</a>
                                                            <a data-select-value="Acima de R$1.600,00" href="#acima-1600">Acima de R$1.600,00</a>
                                                            <a data-select-value="Mais visto" href="#mais-visto">Mais visto</a>
                                                            <a data-select-value="Mais perto" href="#mais perto">Mais perto</a>
                                                        </nav>
                                                    </div>
                                                </div>
                                        </div>
                                        </div>
                                        </form>
                                        </div>
                                        </header>
                                        <? if ($produtos) { ?>
                                            <div class="left-space" id="hospedagem">
                                                <a href="<?= PATHSITE ?>hospedagem/<?= $produtos[0]->identificador ?>/">
                                                    <article class="card-item poster" data-aos="fade-up">

                                                        <div class="cover">
                                                             <? if($produtos[0]->destaque == 1) {?>
                                                            <span class="button-category">
                                                                <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M6.1567 0.0905905C5.7792 0.311263 4.25266 1.25046 2.81554 2.81734C1.37866 4.38397 0 6.61324 0 9.40149H1C1 6.91932 2.22635 4.90103 3.57201 3.43386C4.91745 1.96693 6.351 1.08615 6.6837 0.891725L6.1567 0.0905905ZM9.7629 2.98543C8.5479 1.35269 7.2233 0.365588 6.8764 0.121038L6.2775 0.875964C6.5755 1.086 7.8113 2.0043 8.9443 3.52677L9.7629 2.98543ZM9.9998 3.54673C10.3371 3.13103 10.6197 2.86664 10.748 2.75405L10.0664 2.06427C9.9037 2.20711 9.5819 2.51022 9.2055 2.97405L9.9998 3.54673ZM10.2508 2.75297C10.6999 3.14697 13 5.3622 13 9.40055H14C14 4.99831 11.4885 2.55113 10.9321 2.06294L10.2508 2.75297ZM13 9.40055V9.40149H14V9.40055H13ZM13 9.40149C13 10.1442 12.8448 10.8797 12.5433 11.5659L13.4672 11.9266C13.8189 11.1261 14 10.2681 14 9.40149H13ZM12.5433 11.5659C12.2417 12.2521 11.7998 12.8756 11.2426 13.4008L11.9497 14.0674C12.5998 13.4547 13.1154 12.7272 13.4672 11.9266L12.5433 11.5659ZM11.2426 13.4008C10.6855 13.926 10.0241 14.3426 9.2961 14.6269L9.6788 15.4978C10.5281 15.1661 11.2997 14.6801 11.9497 14.0674L11.2426 13.4008ZM9.2961 14.6269C8.5681 14.9111 7.7879 15.0574 7 15.0574V16C7.9193 16 8.8295 15.8294 9.6788 15.4978L9.2961 14.6269ZM7 15.0574C6.2121 15.0574 5.4319 14.9111 4.7039 14.6269L4.32122 15.4978C5.1705 15.8294 6.0807 16 7 16V15.0574ZM4.7039 14.6269C3.97595 14.3426 3.31451 13.926 2.75736 13.4008L2.05025 14.0674C2.70026 14.6801 3.47194 15.1661 4.32122 15.4978L4.7039 14.6269ZM2.75736 13.4008C2.20021 12.8756 1.75825 12.2521 1.45672 11.5659L0.53284 11.9266C0.88463 12.7272 1.40024 13.4547 2.05025 14.0674L2.75736 13.4008ZM1.45672 11.5659C1.15519 10.8797 1 10.1442 1 9.40149H0C0 10.2681 0.18106 11.1261 0.53284 11.9266L1.45672 11.5659ZM10.748 2.75405C10.6154 2.87049 10.3961 2.88043 10.2508 2.75297L10.9321 2.06294C10.6808 1.84248 10.305 1.85478 10.0664 2.06427L10.748 2.75405ZM8.9443 3.52677C9.2 3.87045 9.7335 3.87499 9.9998 3.54673L9.2055 2.97405C9.3456 2.80137 9.6265 2.80208 9.7629 2.98543L8.9443 3.52677ZM6.6837 0.891725C6.5526 0.968362 6.3896 0.954958 6.2775 0.875964L6.8764 0.121038C6.6706 -0.0240444 6.3873 -0.044217 6.1567 0.0905905L6.6837 0.891725Z" fill="#3B9756"></path>
                                                                    <path d="M6.61193 6.13111C6.32754 6.34757 5.43924 7.05685 4.61742 8.07211C3.80363 9.07754 3.00001 10.4509 3 11.9862H4.00005C4.00006 10.7922 4.63472 9.64242 5.39364 8.70483C6.14454 7.77708 6.96323 7.12329 7.21623 6.93071L6.61193 6.13111ZM10.999 11.8972C10.9684 10.3836 10.1657 9.03258 9.35861 8.04261C8.54372 7.04321 7.66982 6.34556 7.38803 6.13111L6.78373 6.93071C7.03423 7.12128 7.83962 7.76443 8.58472 8.67814C9.33751 9.60147 9.97541 10.7362 9.99921 11.9176L10.999 11.8972ZM9.99921 11.9176C9.99971 11.9401 10 11.9634 10 11.9859H11C11 11.956 10.9997 11.9269 10.999 11.8972L9.99921 11.9176ZM10 11.9859C10 13.6487 8.65692 14.9965 7.00003 14.9965V16C9.20911 16 11 14.2029 11 11.9859H10ZM7.00003 14.9965C5.34324 14.9965 4.00019 13.6488 4.00005 11.9862H3C3.00019 14.203 4.79103 16 7.00003 16V14.9965ZM3 11.9862C3 12.2622 3.22273 12.488 3.50003 12.488V11.4845C3.77728 11.4845 4.00005 11.7103 4.00005 11.9862H3ZM4.00005 11.9862C4.00003 11.7142 3.78122 11.4845 3.50003 11.4845V12.488C3.21886 12.488 3.00002 12.2582 3 11.9862H4.00005ZM7.21623 6.93071C7.08883 7.02775 6.91143 7.02785 6.78373 6.93071L7.38803 6.13111C7.15823 5.9562 6.84153 5.9564 6.61193 6.13111L7.21623 6.93071Z" fill="#3B9756"></path>
                                                                </svg>
                                                                Em Alta
                                                            </span>
                                                             <? } ?>
                                                            <? if ($produtos[0]->fotos) { ?>
                                                                <div class="swiper swiper-card">
                                                                    <div class="swiper-wrapper">
                                                                        <? foreach ($produtos[0]->fotos as $foto) { ?>
                                                                            <div class="swiper-slide">   
                                                                                <img src="<?= PATHSITE ?>uploads/produto/<?= $foto->produtoFK ?>/<?= $foto->arquivo ?>" alt="">                          
                                                                            </div>
                                                                        <? } ?>

                                                                    </div>
                                                                    <div class="swiper-pagination"></div>
                                                                    <div class="swiper-button-prev"></div>
                                                                    <div class="swiper-button-next"></div>                  
                                                                </div>
                                                            <? } ?>
                                                        </div>

                                                        <?
                                                        $comodidades = explode(";", $produtos[0]->principaiscomodidades);
                                                        $arrayComodidades = array_slice($comodidades, 0, 3);
                                                        ?>

                                                        <div class="info">

                                                            <div>
                                                                <span class="type"><?= $produtos[0]->categoria ?></span>
                                                                <span class="zona"><?= $produtos[0]->titulo ?></span>
                                                                <strong class="city"><?= $produtos[0]->cidade ?>-<?= $produtos[0]->estado ?></strong>
                                                                <? if ($arrayComodidades) { ?>
                                                                    <ul>
                                                                        <? foreach ($arrayComodidades as $comod) { ?>
                                                                            <li><?= $comod ?></li>
                                                                        <? } ?>
                                                                    </ul>
                                                                <? } ?>
                                                            </div>

                                                            <?
                                                            ?>

                                                            <div>
                                                                <p class="price">
                                                                    <span class="value">R$ <?= number_format($produtos[0]->preco, 2, ',', '.') ?></span> 
                                                                    <span class="recurrency">/diária</span>
                                                                </p>

                                    <span onclick="favoritar(<?= $produtos[0]->id ?>)" class="icon-heart <?= (in_array($produtos[0]->id, $todosFavoritos)) ? 'active' : '' ?>" data-id-heart="<?= $produtos[0]->id ?>">
                                                                    <svg class="heart-main" viewBox="0 0 512 512" width="100" title="heart">
                                                                        <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" />
                                                                    </svg>
                                                                    <svg class="heart-background" viewBox="0 0 512 512" width="100" title="heart">
                                                                        <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" />
                                                                    </svg>
                                                                </span>

                                                            </div>

                                                        </div>
                                                    </article>
                                                </a>
                                                <? if (count($produtos) > 1) { ?>
                                                    <div class="list-articles">
                                                        <? foreach ($produtos as $produto) { ?>
                                                            <article class="card-item" data-aos="fade-right">
                                                                <a href="<?= PATHSITE ?>hospedagem/<?= $produto->identificador ?>/">
                                                                    <div class="cover">
                                                                        <? if($produto->destaque == 1) {?>
                                                                        <span class="button-category">
                                                                            <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M6.1567 0.0905905C5.7792 0.311263 4.25266 1.25046 2.81554 2.81734C1.37866 4.38397 0 6.61324 0 9.40149H1C1 6.91932 2.22635 4.90103 3.57201 3.43386C4.91745 1.96693 6.351 1.08615 6.6837 0.891725L6.1567 0.0905905ZM9.7629 2.98543C8.5479 1.35269 7.2233 0.365588 6.8764 0.121038L6.2775 0.875964C6.5755 1.086 7.8113 2.0043 8.9443 3.52677L9.7629 2.98543ZM9.9998 3.54673C10.3371 3.13103 10.6197 2.86664 10.748 2.75405L10.0664 2.06427C9.9037 2.20711 9.5819 2.51022 9.2055 2.97405L9.9998 3.54673ZM10.2508 2.75297C10.6999 3.14697 13 5.3622 13 9.40055H14C14 4.99831 11.4885 2.55113 10.9321 2.06294L10.2508 2.75297ZM13 9.40055V9.40149H14V9.40055H13ZM13 9.40149C13 10.1442 12.8448 10.8797 12.5433 11.5659L13.4672 11.9266C13.8189 11.1261 14 10.2681 14 9.40149H13ZM12.5433 11.5659C12.2417 12.2521 11.7998 12.8756 11.2426 13.4008L11.9497 14.0674C12.5998 13.4547 13.1154 12.7272 13.4672 11.9266L12.5433 11.5659ZM11.2426 13.4008C10.6855 13.926 10.0241 14.3426 9.2961 14.6269L9.6788 15.4978C10.5281 15.1661 11.2997 14.6801 11.9497 14.0674L11.2426 13.4008ZM9.2961 14.6269C8.5681 14.9111 7.7879 15.0574 7 15.0574V16C7.9193 16 8.8295 15.8294 9.6788 15.4978L9.2961 14.6269ZM7 15.0574C6.2121 15.0574 5.4319 14.9111 4.7039 14.6269L4.32122 15.4978C5.1705 15.8294 6.0807 16 7 16V15.0574ZM4.7039 14.6269C3.97595 14.3426 3.31451 13.926 2.75736 13.4008L2.05025 14.0674C2.70026 14.6801 3.47194 15.1661 4.32122 15.4978L4.7039 14.6269ZM2.75736 13.4008C2.20021 12.8756 1.75825 12.2521 1.45672 11.5659L0.53284 11.9266C0.88463 12.7272 1.40024 13.4547 2.05025 14.0674L2.75736 13.4008ZM1.45672 11.5659C1.15519 10.8797 1 10.1442 1 9.40149H0C0 10.2681 0.18106 11.1261 0.53284 11.9266L1.45672 11.5659ZM10.748 2.75405C10.6154 2.87049 10.3961 2.88043 10.2508 2.75297L10.9321 2.06294C10.6808 1.84248 10.305 1.85478 10.0664 2.06427L10.748 2.75405ZM8.9443 3.52677C9.2 3.87045 9.7335 3.87499 9.9998 3.54673L9.2055 2.97405C9.3456 2.80137 9.6265 2.80208 9.7629 2.98543L8.9443 3.52677ZM6.6837 0.891725C6.5526 0.968362 6.3896 0.954958 6.2775 0.875964L6.8764 0.121038C6.6706 -0.0240444 6.3873 -0.044217 6.1567 0.0905905L6.6837 0.891725Z" fill="#3B9756"></path>
                                                                                <path d="M6.61193 6.13111C6.32754 6.34757 5.43924 7.05685 4.61742 8.07211C3.80363 9.07754 3.00001 10.4509 3 11.9862H4.00005C4.00006 10.7922 4.63472 9.64242 5.39364 8.70483C6.14454 7.77708 6.96323 7.12329 7.21623 6.93071L6.61193 6.13111ZM10.999 11.8972C10.9684 10.3836 10.1657 9.03258 9.35861 8.04261C8.54372 7.04321 7.66982 6.34556 7.38803 6.13111L6.78373 6.93071C7.03423 7.12128 7.83962 7.76443 8.58472 8.67814C9.33751 9.60147 9.97541 10.7362 9.99921 11.9176L10.999 11.8972ZM9.99921 11.9176C9.99971 11.9401 10 11.9634 10 11.9859H11C11 11.956 10.9997 11.9269 10.999 11.8972L9.99921 11.9176ZM10 11.9859C10 13.6487 8.65692 14.9965 7.00003 14.9965V16C9.20911 16 11 14.2029 11 11.9859H10ZM7.00003 14.9965C5.34324 14.9965 4.00019 13.6488 4.00005 11.9862H3C3.00019 14.203 4.79103 16 7.00003 16V14.9965ZM3 11.9862C3 12.2622 3.22273 12.488 3.50003 12.488V11.4845C3.77728 11.4845 4.00005 11.7103 4.00005 11.9862H3ZM4.00005 11.9862C4.00003 11.7142 3.78122 11.4845 3.50003 11.4845V12.488C3.21886 12.488 3.00002 12.2582 3 11.9862H4.00005ZM7.21623 6.93071C7.08883 7.02775 6.91143 7.02785 6.78373 6.93071L7.38803 6.13111C7.15823 5.9562 6.84153 5.9564 6.61193 6.13111L7.21623 6.93071Z" fill="#3B9756"></path>
                                                                            </svg>
                                                                            Em Alta
                                                                        </span>
                                                                        <? } ?>
                                                                        <? if ($produto->fotos) {
                                                                            ?>
                                                                            <div class="swiper swiper-card">
                                                                                <div class="swiper-wrapper">                      
                                                                                    <? foreach ($produto->fotos as $foto) { ?>
                                                                                        <div class="swiper-slide">   
                                                                                            <div class='foto-menor'>
                                                                                                <img src="<?= PATHSITE ?>uploads/produto/<?= $foto->produtoFK ?>/<?= $foto->arquivo ?>" alt="">                          
                                                                                            </div>
                                                                                        </div>
                                                                                    <? } ?>
                                                                                </div>
                                                                                <div class="swiper-pagination"></div>

                                                                                <div class="swiper-button-prev"></div>
                                                                                <div class="swiper-button-next"></div>                  
                                                                            </div>
                                                                        <? } ?>
                                                                    </div>

                                                                    <?
                                                                    $comodidades = explode(";", $produtos[0]->principaiscomodidades);
                                                                    $arrayComodidades = array_slice($comodidades, 0, 3);
                                                                    ?>

                                                                    <div class="info">
                                                                        <span class="type"><?= $produto->categoria ?></span>
                                                                        <span class="zona"><?= $produto->titulo ?></span>
                                                                        <strong class="city"><?= $produto->cidade ?>-<?= $produto->estado ?></strong>
                                                                        <? if ($arrayComodidades) { ?>
                                                                            <ul>
                                                                                <? foreach ($arrayComodidades as $comod) { ?>
                                                                                    <li><?= $comod ?></li>
                                                                                <? } ?>
                                                                            </ul>
                                                                        <? } ?>

                                                                        <p class="price">
                                                                            <span class="value">R$ <?= number_format($produto->preco, 2, ',', '.') ?></span> 
                                                                            <span class="recurrency">/diária</span>
                                                                        </p>

                                            <span onclick="favoritar(<?= $produto->id ?>)" class="icon-heart <?= (in_array($produto->id, $todosFavoritos)) ? 'active' : '' ?>" data-id-heart="<?= $produto->id ?>">
                                                                            <svg class="heart-main" viewBox="0 0 512 512" width="100" title="heart">
                                                                                <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" />
                                                                            </svg>
                                                                            <svg class="heart-background" viewBox="0 0 512 512" width="100" title="heart">
                                                                                <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" />
                                                                            </svg>
                                                                        </span>
                                                                    </div>
                                                                </a>
                                                            </article>
                                                        <? } ?>                           
                                                    </div>
                                                <? } ?>
                                                <nav class="navigation" data-aos="fade-up">
                                                    <a href="#" class="prev">
                                                        <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M7 1L1 6.5L7 12" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>                
                                                    </a>
                                                    <a href="#" class="active">1</a>
                                                    <a href="#">2</a>
                                                    <a href="#" class="next">
                                                        <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 12L7 6.5L1 1" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>                
                                                    </a>
                                                </nav>          
                                            </div>
                                        <? } ?>
                                        </div>
                                        <div class="column">
                                            <div class="embed-map">
                                                <div class="mapa fixme" id="map"></div>
                                            </div>
                                        </div>
                                        </section>
    <? if($destaques) {?>
                                        <section class="s-title-and-list-cards" id="servicos">
                                            <div class="container-medium">
                                                <header data-aos="fade-up">
                                                    <h2>Hospedagens em destaque</h2>
                                                    <p>Outras hospedagens semelhantes na sua região</p>
                                                </header>        
                                            </div>
                                            <div class="list">                                  
                                                <div class="swiper imoveisSwiper">
                                                    <div class="swiper-wrapper">
                                                        <? foreach($destaques as $destaque) {?>
                                                        <div class="swiper-slide">              
                                                            <article class="card-item" data-aos="fade-right">
                                                                <a href="<?=PATHSITE?>hospedagens/<?=$destaque->identificador?>/">
                                                                    <div class="cover">
                                                                         <? if($destaque->destaque == 1) {?>
                                                                        <span class="button-category">
                                                                            <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M6.1567 0.0905905C5.7792 0.311263 4.25266 1.25046 2.81554 2.81734C1.37866 4.38397 0 6.61324 0 9.40149H1C1 6.91932 2.22635 4.90103 3.57201 3.43386C4.91745 1.96693 6.351 1.08615 6.6837 0.891725L6.1567 0.0905905ZM9.7629 2.98543C8.5479 1.35269 7.2233 0.365588 6.8764 0.121038L6.2775 0.875964C6.5755 1.086 7.8113 2.0043 8.9443 3.52677L9.7629 2.98543ZM9.9998 3.54673C10.3371 3.13103 10.6197 2.86664 10.748 2.75405L10.0664 2.06427C9.9037 2.20711 9.5819 2.51022 9.2055 2.97405L9.9998 3.54673ZM10.2508 2.75297C10.6999 3.14697 13 5.3622 13 9.40055H14C14 4.99831 11.4885 2.55113 10.9321 2.06294L10.2508 2.75297ZM13 9.40055V9.40149H14V9.40055H13ZM13 9.40149C13 10.1442 12.8448 10.8797 12.5433 11.5659L13.4672 11.9266C13.8189 11.1261 14 10.2681 14 9.40149H13ZM12.5433 11.5659C12.2417 12.2521 11.7998 12.8756 11.2426 13.4008L11.9497 14.0674C12.5998 13.4547 13.1154 12.7272 13.4672 11.9266L12.5433 11.5659ZM11.2426 13.4008C10.6855 13.926 10.0241 14.3426 9.2961 14.6269L9.6788 15.4978C10.5281 15.1661 11.2997 14.6801 11.9497 14.0674L11.2426 13.4008ZM9.2961 14.6269C8.5681 14.9111 7.7879 15.0574 7 15.0574V16C7.9193 16 8.8295 15.8294 9.6788 15.4978L9.2961 14.6269ZM7 15.0574C6.2121 15.0574 5.4319 14.9111 4.7039 14.6269L4.32122 15.4978C5.1705 15.8294 6.0807 16 7 16V15.0574ZM4.7039 14.6269C3.97595 14.3426 3.31451 13.926 2.75736 13.4008L2.05025 14.0674C2.70026 14.6801 3.47194 15.1661 4.32122 15.4978L4.7039 14.6269ZM2.75736 13.4008C2.20021 12.8756 1.75825 12.2521 1.45672 11.5659L0.53284 11.9266C0.88463 12.7272 1.40024 13.4547 2.05025 14.0674L2.75736 13.4008ZM1.45672 11.5659C1.15519 10.8797 1 10.1442 1 9.40149H0C0 10.2681 0.18106 11.1261 0.53284 11.9266L1.45672 11.5659ZM10.748 2.75405C10.6154 2.87049 10.3961 2.88043 10.2508 2.75297L10.9321 2.06294C10.6808 1.84248 10.305 1.85478 10.0664 2.06427L10.748 2.75405ZM8.9443 3.52677C9.2 3.87045 9.7335 3.87499 9.9998 3.54673L9.2055 2.97405C9.3456 2.80137 9.6265 2.80208 9.7629 2.98543L8.9443 3.52677ZM6.6837 0.891725C6.5526 0.968362 6.3896 0.954958 6.2775 0.875964L6.8764 0.121038C6.6706 -0.0240444 6.3873 -0.044217 6.1567 0.0905905L6.6837 0.891725Z" fill="#3B9756"></path>
                                                                                <path d="M6.61193 6.13111C6.32754 6.34757 5.43924 7.05685 4.61742 8.07211C3.80363 9.07754 3.00001 10.4509 3 11.9862H4.00005C4.00006 10.7922 4.63472 9.64242 5.39364 8.70483C6.14454 7.77708 6.96323 7.12329 7.21623 6.93071L6.61193 6.13111ZM10.999 11.8972C10.9684 10.3836 10.1657 9.03258 9.35861 8.04261C8.54372 7.04321 7.66982 6.34556 7.38803 6.13111L6.78373 6.93071C7.03423 7.12128 7.83962 7.76443 8.58472 8.67814C9.33751 9.60147 9.97541 10.7362 9.99921 11.9176L10.999 11.8972ZM9.99921 11.9176C9.99971 11.9401 10 11.9634 10 11.9859H11C11 11.956 10.9997 11.9269 10.999 11.8972L9.99921 11.9176ZM10 11.9859C10 13.6487 8.65692 14.9965 7.00003 14.9965V16C9.20911 16 11 14.2029 11 11.9859H10ZM7.00003 14.9965C5.34324 14.9965 4.00019 13.6488 4.00005 11.9862H3C3.00019 14.203 4.79103 16 7.00003 16V14.9965ZM3 11.9862C3 12.2622 3.22273 12.488 3.50003 12.488V11.4845C3.77728 11.4845 4.00005 11.7103 4.00005 11.9862H3ZM4.00005 11.9862C4.00003 11.7142 3.78122 11.4845 3.50003 11.4845V12.488C3.21886 12.488 3.00002 12.2582 3 11.9862H4.00005ZM7.21623 6.93071C7.08883 7.02775 6.91143 7.02785 6.78373 6.93071L7.38803 6.13111C7.15823 5.9562 6.84153 5.9564 6.61193 6.13111L7.21623 6.93071Z" fill="#3B9756"></path>
                                                                            </svg>
                                                                            Em Alta
                                                                        </span>
                                                                         <? } ?>
                                                                        <div class="swiper swiper-card">
                                                                            <div class="swiper-wrapper">
                                                                               <? foreach ($destaque->fotos as $foto) { ?>
                                                                            <div class="swiper-slide">   
                                                                                <div class="foto-menor">
                                                                                <img src="<?= PATHSITE ?>uploads/produto/<?= $foto->produtoFK ?>/<?= $foto->arquivo ?>" alt="">                          
                                                                            </div>
                                                                            </div>
                                                                        <? } ?>                                                                         
                                                                            </div>
                                                                            <div class="swiper-pagination"></div>

                                                                            <div class="swiper-button-prev"></div>
                                                                            <div class="swiper-button-next"></div>                  
                                                                        </div>
                                                                    </div>
                                                                    <div class="info">
                                                                        <span class="type"><?=$destaque->categoria?></span>
                                                                        <span class="zona"><?=$destaque->titulo?></span>
                                                                        <strong class="city"><?=$destaque->cidade?>-<?=$destaque->estado?></strong>
                                                                            <?
                                                        $comodidades = explode(";", $produtos[0]->principaiscomodidades);
                                                        $arrayComodidades = array_slice($comodidades, 0, 3);
                                                        ?>
                                                                        <? if ($arrayComodidades) { ?>
                                                                    <ul>
                                                                        <? foreach ($arrayComodidades as $comod) { ?>
                                                                            <li><?= $comod ?></li>
                                                                        <? } ?>
                                                                    </ul>
                                                                <? } ?>
                                                                         <p class="price">
                                                                    <span class="value">R$ <?= number_format($destaque->preco, 2, ',', '.') ?></span> 
                                                                    <span class="recurrency">/diária</span>
                                                                </p>

                                            <span onclick="favoritar(<?= $destaque->id ?>)" class="icon-heart <?= (in_array($destaque->id, $todosFavoritos)) ? 'active' : '' ?>" data-id-heart="<?= $destaque->id ?>">
                                                                            <svg class="heart-main" viewBox="0 0 512 512" width="100" title="heart">
                                                                                <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" />
                                                                            </svg>
                                                                            <svg class="heart-background" viewBox="0 0 512 512" width="100" title="heart">
                                                                                <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" />
                                                                            </svg>
                                                                        </span>
                                                                    </div>
                                                                </a>
                                                            </article>
                                                        </div>              
                                                        <? } ?>                                          
                                                    </div>
                                                    <div class="swiper-pagination"></div>
                                                </div>
                                                <div class="navigation-swiper-blog only-mobile">
                                                    <button class="prev">
                                                        <svg class="active" width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M7 1L1 6.5L7 12" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>              
                                                        <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M7 1L1 6.5L7 12" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>              
                                                    </button>
                                                    <button class="next active">
                                                        <svg class="active" width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 12L7 6.5L1 1" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>              
                                                        <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 12L7 6.5L1 1" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>              
                                                    </button>
                                                </div>
                                            </div>
                                        </section>
    <? } ?>
                                        </main>
                                        <a 
                                            href="https://www.google.com/maps/@51.5039653,-0.1246493,14.12z"
                                            data-fancybox
                                            class="btn-maps-mobile"
                                            >
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 5.34737C1 4.15952 1 3.5656 1.30539 3.21919C1.41381 3.0962 1.54559 2.99776 1.69245 2.93005C2.1061 2.73932 2.64974 2.92714 3.73701 3.30276C4.56709 3.58954 4.98214 3.73293 5.40152 3.71808C5.55555 3.71263 5.70867 3.69138 5.85866 3.65463C6.26704 3.55459 6.63103 3.30307 7.35911 2.80003L8.43423 2.05712C9.36687 1.41275 9.83314 1.09057 10.3684 1.01628C10.9037 0.941984 11.4353 1.12566 12.4986 1.49301L13.4045 1.80598C14.1745 2.07201 14.5595 2.20502 14.7798 2.52169C15 2.83836 15 3.25898 15 4.10023V10.6527C15 11.8405 15 12.4344 14.6946 12.7808C14.5862 12.9039 14.4544 13.0023 14.3075 13.07C13.8939 13.2607 13.3503 13.0729 12.263 12.6972C11.4329 12.4105 11.0179 12.2671 10.5985 12.2819C10.4445 12.2874 10.2913 12.3086 10.1414 12.3454C9.73297 12.4454 9.36897 12.6969 8.64089 13.2L7.56577 13.9429C6.63313 14.5873 6.16686 14.9095 5.63161 14.9837C5.09635 15.058 4.5647 14.8743 3.5014 14.507L2.59547 14.194C1.82545 13.928 1.44043 13.795 1.22022 13.4783C1 13.1616 1 12.741 1 11.8997V5.34737Z" stroke="white" stroke-width="1.5"/>
                                                <path d="M5.6665 4.11133V15.0002" stroke="white" stroke-width="1.5"/>
                                                <path d="M10.3335 1V11.8889" stroke="white" stroke-width="1.5"/>
                                            </svg>      
                                            Mapa
                                        </a>


                                        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>



                                        <script type="module">
                                                            // Controla modal de mapa
                                                            const btnMaps = document.querySelector('.btn-maps-mobile')
                                                            btnMaps.addEventListener('click', (e) => {
                                                                e.preventDefault()
                                                                Fancybox.show([
                                                                    {
                                                                        src: "https://www.google.com/maps/@51.5039653,-0.1246493,14.12z",
                                                                        width: 800,
                                                                        height: 600,
                                                                    },
                                                                ]);
                                                            })

                                                            // AOS
                                                            AOS.init({
                                                                once: true,
                                                                duration: 1000
                                                            });

                                                            import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.mjs'

                                                                    const swiperImoveis = new Swiper('.imoveisSwiper', {
                                                                        slidesPerView: 1.1,
                                                                        spaceBetween: 12,
                                                                        cssMode: true,
                                                                        navigation: {
                                                                            nextEl: '.swiper-button-next',
                                                                            prevEl: '.swiper-button-prev',
                                                                        },
                                                                        pagination: {
                                                                            el: '.swiper-pagination',
                                                                        },
                                                                        breakpoints: {
                                                                            650: {
                                                                                slidesPerView: 1.4,
                                                                            },
                                                                            930: {
                                                                                slidesPerView: 2.4,
                                                                            },
                                                                            1120: {
                                                                                slidesPerView: 4,
                                                                            }
                                                                        }
                                                                    })

                                                            // Controller swiper callendar
                                                            const buttonNext = document.querySelector('.navigation-swiper-blog > .next')
                                                            const buttonPrev = document.querySelector('.navigation-swiper-blog > .prev')

                                                            buttonNext.addEventListener('click', function (e) {
                                                                e.preventDefault()
                                                                console.log('next')
                                                                swiperImoveis.slideNext()
                                                            })

                                                            buttonPrev.addEventListener('click', function (e) {
                                                                e.preventDefault()
                                                                console.log('prev')
                                                                swiperImoveis.slidePrev()
                                                            })

                                                            swiperImoveis.on('reachBeginning', function () {
                                                                buttonNext.classList.add('active')
                                                                buttonPrev.classList.remove('active')
                                                            });
                                                            swiperImoveis.on('reachEnd', function () {
                                                                buttonNext.classList.remove('active')
                                                                buttonPrev.classList.add('active')
                                                            });

                                                            // Form Select
                                                            const boxes = document.querySelectorAll('.j-box-select')
                                                            boxes.forEach((box, key) => {
                                                                new Selector(box)
                                                            })
                                        </script>