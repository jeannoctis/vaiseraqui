<main>
    <aside class="aside-filter">
        <div class="container-medium">
            <nav class="box-breadcrumbs">
                <span>Início</span>
                <img src="<?= PATHSITE ?>assets/images/icon-bread-crumbs.svg" alt="">
                    <a href="#">Eventos</a>
            </nav>
            <p class="result"><?= count($eventos) ?> eventos encontrados</p>
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
                                </aside>
                                <? if ($emAlta) { ?>
                                    <section class="events-list-poster">
                                        <div class="container-medium">
                                            <div class="wraper">
                                                <? foreach ($emAlta as $alta) { ?>
                                                    <article class="card-events poster" data-aos="fade-up">
                                                           <a href="<?=PATHSITE?>evento/<?=$alta->identificador?>/">
                                                        <div class="cover">
                                                            <span class="button-category">
                                                                <svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M4.83741 0.0736048C4.5408 0.252902 3.34138 1.016 2.21221 2.28909C1.08323 3.56197 0 5.37326 0 7.63871H0.785714C0.785714 5.62195 1.74927 3.98208 2.80658 2.79001C3.86371 1.59813 4.99007 0.882493 5.25148 0.724527L4.83741 0.0736048ZM7.67085 2.42566C6.71621 1.09906 5.67545 0.29704 5.40289 0.0983433L4.93232 0.711721C5.16646 0.882378 6.13745 1.62849 7.02766 2.8655L7.67085 2.42566ZM7.85699 2.88172C8.12201 2.54396 8.34405 2.32914 8.44486 2.23767L7.90931 1.67722C7.78148 1.79328 7.52864 2.03955 7.23289 2.41642L7.85699 2.88172ZM8.0542 2.23679C8.40706 2.55692 10.2143 4.35678 10.2143 7.63795H11C11 4.06112 9.02668 2.07279 8.58951 1.67614L8.0542 2.23679ZM10.2143 7.63795V7.63871H11V7.63795H10.2143ZM10.2143 7.63871C10.2143 8.24216 10.0923 8.83979 9.85545 9.39729L10.5814 9.6904C10.8577 9.03992 11 8.3428 11 7.63871H10.2143ZM9.85545 9.39729C9.61848 9.95487 9.27127 10.4614 8.83347 10.8882L9.38905 11.4298C9.89984 10.9319 10.305 10.3409 10.5814 9.6904L9.85545 9.39729ZM8.83347 10.8882C8.39575 11.3149 7.87608 11.6534 7.30408 11.8843L7.60477 12.5919C8.27208 12.3225 8.87833 11.9276 9.38905 11.4298L8.83347 10.8882ZM7.30408 11.8843C6.73208 12.1152 6.11906 12.2341 5.5 12.2341V13C6.22231 13 6.93746 12.8614 7.60477 12.5919L7.30408 11.8843ZM5.5 12.2341C4.88094 12.2341 4.26792 12.1152 3.69592 11.8843L3.39524 12.5919C4.06254 12.8614 4.77769 13 5.5 13V12.2341ZM3.69592 11.8843C3.12396 11.6534 2.60426 11.3149 2.1665 10.8882L1.61091 11.4298C2.12163 11.9276 2.72795 12.3225 3.39524 12.5919L3.69592 11.8843ZM2.1665 10.8882C1.72874 10.4614 1.38148 9.95487 1.14457 9.39729L0.41866 9.6904C0.695066 10.3409 1.10019 10.9319 1.61091 11.4298L2.1665 10.8882ZM1.14457 9.39729C0.907649 8.83979 0.785714 8.24216 0.785714 7.63871H0C0 8.3428 0.142261 9.03992 0.41866 9.6904L1.14457 9.39729ZM8.44486 2.23767C8.34067 2.33227 8.16836 2.34035 8.0542 2.23679L8.58951 1.67614C8.39206 1.49701 8.09679 1.50701 7.90931 1.67722L8.44486 2.23767ZM7.02766 2.8655C7.22857 3.14474 7.64775 3.14843 7.85699 2.88172L7.23289 2.41642C7.34297 2.27611 7.56368 2.27669 7.67085 2.42566L7.02766 2.8655ZM5.25148 0.724527C5.14847 0.786794 5.0204 0.775903 4.93232 0.711721L5.40289 0.0983433C5.24119 -0.0195361 5.01859 -0.0359263 4.83741 0.0736048L5.25148 0.724527Z" fill="#3B9756"/>
                                                                    <path d="M5.16044 5.10489C4.91159 5.27805 4.13434 5.84548 3.41524 6.65769C2.70318 7.46203 2.00001 8.56068 2 9.78899H2.87505C2.87505 8.8338 3.43038 7.91393 4.09444 7.16386C4.75147 6.42166 5.46783 5.89863 5.6892 5.74457L5.16044 5.10489ZM8.99913 9.71778C8.97235 8.50689 8.26999 7.42606 7.56379 6.63409C6.85075 5.83456 6.0861 5.27645 5.83952 5.10489L5.31077 5.74457C5.52995 5.89702 6.23467 6.41155 6.88663 7.14251C7.54532 7.88118 8.10348 8.78892 8.12431 9.73407L8.99913 9.71778ZM8.12431 9.73407C8.12474 9.75206 8.12501 9.77068 8.12501 9.78874H9C9 9.76482 8.99974 9.74154 8.99913 9.71778L8.12431 9.73407ZM8.12501 9.78874C8.12501 11.1189 6.9498 12.1972 5.50003 12.1972V13C7.43297 13 9 11.5623 9 9.78874H8.12501ZM5.50003 12.1972C4.05034 12.1972 2.87517 11.119 2.87505 9.78899H2C2.00017 11.5624 3.56715 13 5.50003 13V12.1972ZM2 9.78899C2 10.0098 2.19489 10.1904 2.43752 10.1904V9.38758C2.68012 9.38758 2.87505 9.56821 2.87505 9.78899H2ZM2.87505 9.78899C2.87503 9.57134 2.68357 9.38758 2.43752 9.38758V10.1904C2.1915 10.1904 2.00002 10.0065 2 9.78899H2.87505ZM5.6892 5.74457C5.57773 5.8222 5.4225 5.82228 5.31077 5.74457L5.83952 5.10489C5.63845 4.96496 5.36134 4.96512 5.16044 5.10489L5.6892 5.74457Z" fill="#3B9756"/>
                                                                </svg>                
                                                                Em Alta
                                                            </span>
                                                            <div class="swiper swiper-card">
                                                                <div class="swiper-wrapper">
                                                                    <? foreach ($alta->fotos as $foto) { ?>
                                                                        <div class="swiper-slide">
                                                                            <img src="<?= PATHSITE ?>uploads/produto/<?= $foto->produtoFK ?>/<?= $foto->arquivo ?>" alt="">
                                                                        </div>
                                                                    <? } ?>                                                                    
                                                                </div>
                                                                <div class="swiper-pagination"></div>

                                                                <div class="swiper-button-prev"></div>
                                                                <div class="swiper-button-next"></div>                  
                                                            </div>
                                                        </div>
                                                     
                                                            <div class="info">
                                                                <span class="tagline"><?= $alta->categoria ?></span>
                                                                <strong class="title"><?= $alta->titulo ?></strong>
                                                                <span class="location-1"><?= $alta->local ?></span>
                                                                <span class="location-2"><?= $alta->cidade ?>-<?= $alta->estado ?></span>
                                                                <span class="date">
                                                                    <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.04839 1.2973H8.16129V0.486486C8.16129 0.357464 8.10523 0.233721 8.00537 0.142489C7.90559 0.0512562 7.77019 0 7.62903 0C7.48788 0 7.35247 0.0512562 7.25269 0.142489C7.15284 0.233721 7.09677 0.357464 7.09677 0.486486V1.2973H3.90323V0.486486C3.90323 0.357464 3.84715 0.233721 3.74733 0.142489C3.64751 0.0512562 3.51213 0 3.37097 0C3.22981 0 3.09442 0.0512562 2.9946 0.142489C2.89479 0.233721 2.83871 0.357464 2.83871 0.486486V1.2973H1.95161C1.43401 1.2973 0.937612 1.48523 0.571617 1.81976C0.205615 2.15428 0 2.60799 0 3.08108V10.2162C0 10.6893 0.205615 11.143 0.571617 11.4775C0.937612 11.8121 1.43401 12 1.95161 12H9.04839C9.56595 12 10.0624 11.8121 10.4284 11.4775C10.7944 11.143 11 10.6893 11 10.2162V3.08108C11 2.60799 10.7944 2.15428 10.4284 1.81976C10.0624 1.48523 9.56595 1.2973 9.04839 1.2973ZM1.95161 2.27027H2.83871V3.08108C2.83871 3.2101 2.89479 3.33385 2.9946 3.42508C3.09442 3.51631 3.22981 3.56757 3.37097 3.56757C3.51213 3.56757 3.64751 3.51631 3.74733 3.42508C3.84715 3.33385 3.90323 3.2101 3.90323 3.08108V2.27027H7.09677V3.08108C7.09677 3.2101 7.15284 3.33385 7.25269 3.42508C7.35247 3.51631 7.48788 3.56757 7.62903 3.56757C7.77019 3.56757 7.90559 3.51631 8.00537 3.42508C8.10523 3.33385 8.16129 3.2101 8.16129 3.08108V2.27027H9.04839C9.28364 2.27027 9.50932 2.3557 9.67567 2.50775C9.84202 2.65981 9.93548 2.86604 9.93548 3.08108V4.86486H1.06452V3.08108C1.06452 2.86604 1.15798 2.65981 1.32434 2.50775C1.49071 2.3557 1.71634 2.27027 1.95161 2.27027ZM9.04839 11.027H1.95161C1.71634 11.027 1.49071 10.9416 1.32434 10.7896C1.15798 10.6375 1.06452 10.4312 1.06452 10.2162V5.83784H9.93548V10.2162C9.93548 10.4312 9.84202 10.6375 9.67567 10.7896C9.50932 10.9416 9.28364 11.027 9.04839 11.027Z" fill="#404041"/>
                                                                    </svg>                
                                                                    <?
                                                                    if ($alta->datas) {
                                                                        if (count($alta->datas) == 1) {
                                                                            echo formataData($alta->datas[0]->data);
                                                                        } else {
                                                                            echo "Datas diversas";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </span>
                                                                <div class="desc">
                                                                    <p><?=$alta->descricao?></p>
                                                                </div>

                                                                <span onclick="favoritar(<?=$alta->id?>)" href="#" class="icon-heart">
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
                                        </div>
                                    </section>
                                <? } ?>
                                <? if ($eventos) { ?>
                                    <section class="events-list-card">
                                        <div class="container-medium">
                                            <div class="wraper">
                                                <?
                                                foreach ($eventos as $evento) {
                                                    echo View('templates/evento-card', (array) $evento);
                                                }
                                                ?>        
                                            </div>
                                            <nav class="navigation" data-aos="fade-up">
                                                <a href="#" class="prev">
                                                    <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7 1L1 6.5L7 12" stroke="#BBBBBB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>                
                                                </a>
                                                <a href="#" class="active">1</a>
                                                <a href="#">2</a>
                                                <a href="#" class="next">
                                                    <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 12L7 6.5L1 1" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>                
                                                </a>
                                            </nav>
                                        </div>          
                                    </section>
                                <? } ?>
                                <? if ($destaques) { ?>
                                    <section class="s-featured-events" id="eventos-destaque">
                                        <?= View('templates/eventos-destaque', $destaques) ?>
                                    </section>
                                <? } ?>
                                </main>