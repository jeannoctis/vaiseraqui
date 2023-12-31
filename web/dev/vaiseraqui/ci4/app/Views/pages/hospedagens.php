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
                    <span class="result"><?= count($produtos) ?> hospedagens encontrados</span>

                    <?= view("templates/order-filter", $get) ?>
                                                    </div>
                                        </header>
                                        <? if ($produtos) { ?>
                                            <div class="left-space" id="hospedagem">
                                                <a href="<?= PATHSITE ?><?=$segments[0]?>/<?= $produtos[0]->identificador ?>/">
                                                    <article class="card-item poster" data-aos="fade-up">

                                                        <div class="cover">
                                <? if ($produtos[0]->destaque == 1) { ?>
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
                                                    <div  class="list-articles  ">
                                                        <? foreach ($produtos as $produto) {
                                                            if($produto->coordenadas){
                                                                $coord = explode(",",$produto->coordenadas);
                                                                $lat = $coord[0];
                                                                $long = $coord[1];
                                                            } else {
                                                                $lat = 0;
                                                                $long = 0;
                                                            }
                                                            ?>
                                                            <article  class="card-item coord-<?=$produto->identificador?> " data-aos="fade-right">
                                                                <a href="<?= PATHSITE ?><?=$segments[0]?>/<?= $produto->identificador ?>/">
                                                                    <div class="cover">                                         
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
                                                <?= $pager->links("anuncios") ?>        
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
                                                     <h2>Mais destaques</h2>
          <p>Conheça mais destaques na sua região</p>
                                                </header>        
                                            </div>
                                            <div class="list">                                  
                                                <div class="swiper imoveisSwiper">
                                                    <div class="swiper-wrapper">
                                                        <? foreach($destaques as $ind=> $destaque) {
                                                            if($ind) {?>
                                                        <div class="swiper-slide">              
                                                            <article class="card-item" data-aos="fade-right">
                                                                <a href="<?=PATHSITE?><?=$segments[0]?>/<?=$destaque->identificador?>/">
                                                                    <div class="cover">
                                                                       
                                                                        <span class="button-category">
                                                                            <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M6.1567 0.0905905C5.7792 0.311263 4.25266 1.25046 2.81554 2.81734C1.37866 4.38397 0 6.61324 0 9.40149H1C1 6.91932 2.22635 4.90103 3.57201 3.43386C4.91745 1.96693 6.351 1.08615 6.6837 0.891725L6.1567 0.0905905ZM9.7629 2.98543C8.5479 1.35269 7.2233 0.365588 6.8764 0.121038L6.2775 0.875964C6.5755 1.086 7.8113 2.0043 8.9443 3.52677L9.7629 2.98543ZM9.9998 3.54673C10.3371 3.13103 10.6197 2.86664 10.748 2.75405L10.0664 2.06427C9.9037 2.20711 9.5819 2.51022 9.2055 2.97405L9.9998 3.54673ZM10.2508 2.75297C10.6999 3.14697 13 5.3622 13 9.40055H14C14 4.99831 11.4885 2.55113 10.9321 2.06294L10.2508 2.75297ZM13 9.40055V9.40149H14V9.40055H13ZM13 9.40149C13 10.1442 12.8448 10.8797 12.5433 11.5659L13.4672 11.9266C13.8189 11.1261 14 10.2681 14 9.40149H13ZM12.5433 11.5659C12.2417 12.2521 11.7998 12.8756 11.2426 13.4008L11.9497 14.0674C12.5998 13.4547 13.1154 12.7272 13.4672 11.9266L12.5433 11.5659ZM11.2426 13.4008C10.6855 13.926 10.0241 14.3426 9.2961 14.6269L9.6788 15.4978C10.5281 15.1661 11.2997 14.6801 11.9497 14.0674L11.2426 13.4008ZM9.2961 14.6269C8.5681 14.9111 7.7879 15.0574 7 15.0574V16C7.9193 16 8.8295 15.8294 9.6788 15.4978L9.2961 14.6269ZM7 15.0574C6.2121 15.0574 5.4319 14.9111 4.7039 14.6269L4.32122 15.4978C5.1705 15.8294 6.0807 16 7 16V15.0574ZM4.7039 14.6269C3.97595 14.3426 3.31451 13.926 2.75736 13.4008L2.05025 14.0674C2.70026 14.6801 3.47194 15.1661 4.32122 15.4978L4.7039 14.6269ZM2.75736 13.4008C2.20021 12.8756 1.75825 12.2521 1.45672 11.5659L0.53284 11.9266C0.88463 12.7272 1.40024 13.4547 2.05025 14.0674L2.75736 13.4008ZM1.45672 11.5659C1.15519 10.8797 1 10.1442 1 9.40149H0C0 10.2681 0.18106 11.1261 0.53284 11.9266L1.45672 11.5659ZM10.748 2.75405C10.6154 2.87049 10.3961 2.88043 10.2508 2.75297L10.9321 2.06294C10.6808 1.84248 10.305 1.85478 10.0664 2.06427L10.748 2.75405ZM8.9443 3.52677C9.2 3.87045 9.7335 3.87499 9.9998 3.54673L9.2055 2.97405C9.3456 2.80137 9.6265 2.80208 9.7629 2.98543L8.9443 3.52677ZM6.6837 0.891725C6.5526 0.968362 6.3896 0.954958 6.2775 0.875964L6.8764 0.121038C6.6706 -0.0240444 6.3873 -0.044217 6.1567 0.0905905L6.6837 0.891725Z" fill="#3B9756"></path>
                                                                                <path d="M6.61193 6.13111C6.32754 6.34757 5.43924 7.05685 4.61742 8.07211C3.80363 9.07754 3.00001 10.4509 3 11.9862H4.00005C4.00006 10.7922 4.63472 9.64242 5.39364 8.70483C6.14454 7.77708 6.96323 7.12329 7.21623 6.93071L6.61193 6.13111ZM10.999 11.8972C10.9684 10.3836 10.1657 9.03258 9.35861 8.04261C8.54372 7.04321 7.66982 6.34556 7.38803 6.13111L6.78373 6.93071C7.03423 7.12128 7.83962 7.76443 8.58472 8.67814C9.33751 9.60147 9.97541 10.7362 9.99921 11.9176L10.999 11.8972ZM9.99921 11.9176C9.99971 11.9401 10 11.9634 10 11.9859H11C11 11.956 10.9997 11.9269 10.999 11.8972L9.99921 11.9176ZM10 11.9859C10 13.6487 8.65692 14.9965 7.00003 14.9965V16C9.20911 16 11 14.2029 11 11.9859H10ZM7.00003 14.9965C5.34324 14.9965 4.00019 13.6488 4.00005 11.9862H3C3.00019 14.203 4.79103 16 7.00003 16V14.9965ZM3 11.9862C3 12.2622 3.22273 12.488 3.50003 12.488V11.4845C3.77728 11.4845 4.00005 11.7103 4.00005 11.9862H3ZM4.00005 11.9862C4.00003 11.7142 3.78122 11.4845 3.50003 11.4845V12.488C3.21886 12.488 3.00002 12.2582 3 11.9862H4.00005ZM7.21623 6.93071C7.08883 7.02775 6.91143 7.02785 6.78373 6.93071L7.38803 6.13111C7.15823 5.9562 6.84153 5.9564 6.61193 6.13111L7.21623 6.93071Z" fill="#3B9756"></path>
                                                                            </svg>
                                                                            Em Alta
                                                                        </span>
                                                                      
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
                                                        <? } } ?>                                          
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

<div class="moda-filter-container">
    <div action="#" class="presentation-form j-filter-modal-container">

        <header>
            <h2>
                <div class="wraper-icon">
                    <img src="<?= PATHSITE ?>assets/images/icon-search-box.svg" alt="icon search">
                </div>
                <?= $txMenuFiltro->titulo ?>
            </h2>
            <button class="open-modal j-open-form-modal">
                <svg width="31" height="16" viewBox="0 0 31 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 2L15.5 14L29 2" stroke="#404041" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <svg class="active" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0,0,256,256">
                    <g fill="#404041" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                        <g transform="scale(10.66667,10.66667)">
                            <path d="M4.99023,3.99023c-0.40692,0.00011 -0.77321,0.24676 -0.92633,0.62377c-0.15312,0.37701 -0.06255,0.80921 0.22907,1.09303l6.29297,6.29297l-6.29297,6.29297c-0.26124,0.25082 -0.36647,0.62327 -0.27511,0.97371c0.09136,0.35044 0.36503,0.62411 0.71547,0.71547c0.35044,0.09136 0.72289,-0.01388 0.97371,-0.27511l6.29297,-6.29297l6.29297,6.29297c0.25082,0.26124 0.62327,0.36648 0.97371,0.27512c0.35044,-0.09136 0.62411,-0.36503 0.71547,-0.71547c0.09136,-0.35044 -0.01388,-0.72289 -0.27512,-0.97371l-6.29297,-6.29297l6.29297,-6.29297c0.29576,-0.28749 0.38469,-0.72707 0.22393,-1.10691c-0.16075,-0.37985 -0.53821,-0.62204 -0.9505,-0.60988c-0.2598,0.00774 -0.50638,0.11632 -0.6875,0.30273l-6.29297,6.29297l-6.29297,-6.29297c-0.18827,-0.19353 -0.4468,-0.30272 -0.7168,-0.30273z"></path>
                        </g>
                    </g>
                </svg>
            </button>
        </header>

        <nav class="presentation-form-menu">
            <a href="#" data-form="form5">
                <svg class="isActive" width="42" height="34" viewBox="0 0 42 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 23.5C1.4 23.5 1 24.5 1 25V31.5C1 32.3 1.66667 32.5 2 32.5H3.5C4.3 32.5 4.83333 32.1667 5 32L7.5 29.5H34L36.5 32C36.9 32.4 37.6667 32.5 38 32.5H39.5C40.7 32.5 41 31.8333 41 31.5V25C41 23.8 39.6667 23.5 39 23.5H3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M3 22.5715V19.1429C3 18.2857 3.19726 17 5.95891 17C8.72057 17 27.1644 17 36.0411 17C38.0138 17 39 17.1714 39 19.5715C39 21.9715 39 22.8572 39 23" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M2.5 1V23.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M39.5 1V23.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M2.5 5H39.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M9.5 16.5V12.5C9.5 11.8333 10 10.5 12 10.5C14 10.5 17.1667 10.5 18.5 10.5C19.3333 10.5 21 10.9 21 12.5C21 14.1 21 15.8333 21 16.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M21 16.5V12.5C21 11.8333 21.5 10.5 23.5 10.5C25.5 10.5 28.6667 10.5 30 10.5C30.8333 10.5 32.5 10.9 32.5 12.5C32.5 14.1 32.5 15.8333 32.5 16.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <svg width="42" height="34" viewBox="0 0 42 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 23.5C1.4 23.5 1 24.5 1 25V31.5C1 32.3 1.66667 32.5 2 32.5H3.5C4.3 32.5 4.83333 32.1667 5 32L7.5 29.5H34L36.5 32C36.9 32.4 37.6667 32.5 38 32.5H39.5C40.7 32.5 41 31.8333 41 31.5V25C41 23.8 39.6667 23.5 39 23.5H3Z" stroke="#808080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M3 22.5715V19.1429C3 18.2857 3.19726 17 5.95891 17C8.72057 17 27.1644 17 36.0411 17C38.0138 17 39 17.1714 39 19.5715C39 21.9715 39 22.8572 39 23" stroke="#808080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M2.5 1V23.5" stroke="#808080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M39.5 1V23.5" stroke="#808080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M2.5 5H39.5" stroke="#808080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M9.5 16.5V12.5C9.5 11.8333 10 10.5 12 10.5C14 10.5 17.1667 10.5 18.5 10.5C19.3333 10.5 21 10.9 21 12.5C21 14.1 21 15.8333 21 16.5" stroke="#808080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M21 16.5V12.5C21 11.8333 21.5 10.5 23.5 10.5C25.5 10.5 28.6667 10.5 30 10.5C30.8333 10.5 32.5 10.9 32.5 12.5C32.5 14.1 32.5 15.8333 32.5 16.5" stroke="#808080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Hospedagem
            </a>
        </nav>

        <div class="presentation-form-content">
            <?= view("templates/form5", (array) $tipoAtual ) ?>
        </div>

    </div>
</div>

