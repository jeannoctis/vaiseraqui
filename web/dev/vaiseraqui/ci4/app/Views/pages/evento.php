<style>
    @media screen and (max-width: 768px) {
        .internal-rent .more-about-2-column .container-medium .column:first-of-type>article .list-items {
            margin-top: 0;
            margin-bottom: 0;
        }
    }
</style>

<main>
    <section class="s-text-and-slider page-event-internal">
        <div class="info" data-aos="fade-right">
            <div>
                <span class="type"><?= $metatag->categoria ?></span>
                <h1><?= $metatag->titulo ?></h1>
                <span class="location"><?= $metatag->estado ?></span>
                <div class="desc">
                    <p><?= $metatag->descricao ?></p>
                </div>
                <? if (count($datas) > 1) { ?>
                    <div class="box-date">
                        <label>
                            <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.3387 1.83784H11.129V0.689189C11.129 0.506407 11.0526 0.331105 10.9164 0.201859C10.7804 0.072613 10.5957 0 10.4032 0C10.2107 0 10.0261 0.072613 9.89003 0.201859C9.75387 0.331105 9.67742 0.506407 9.67742 0.689189V1.83784H5.32258V0.689189C5.32258 0.506407 5.24611 0.331105 5.11 0.201859C4.97388 0.072613 4.78927 0 4.59677 0C4.40428 0 4.21966 0.072613 4.08355 0.201859C3.94744 0.331105 3.87097 0.506407 3.87097 0.689189V1.83784H2.66129C1.95547 1.83784 1.27856 2.10408 0.779477 2.57799C0.280384 3.0519 0 3.69465 0 4.36486V14.473C0 15.1431 0.280384 15.7859 0.779477 16.2598C1.27856 16.7338 1.95547 17 2.66129 17H12.3387C13.0445 17 13.7214 16.7338 14.2205 16.2598C14.7196 15.7859 15 15.1431 15 14.473V4.36486C15 3.69465 14.7196 3.0519 14.2205 2.57799C13.7214 2.10408 13.0445 1.83784 12.3387 1.83784ZM2.66129 3.21622H3.87097V4.36486C3.87097 4.54765 3.94744 4.72295 4.08355 4.8522C4.21966 4.98144 4.40428 5.05405 4.59677 5.05405C4.78927 5.05405 4.97388 4.98144 5.11 4.8522C5.24611 4.72295 5.32258 4.54765 5.32258 4.36486V3.21622H9.67742V4.36486C9.67742 4.54765 9.75387 4.72295 9.89003 4.8522C10.0261 4.98144 10.2107 5.05405 10.4032 5.05405C10.5957 5.05405 10.7804 4.98144 10.9164 4.8522C11.0526 4.72295 11.129 4.54765 11.129 4.36486V3.21622H12.3387C12.6595 3.21622 12.9673 3.33724 13.1941 3.55265C13.4209 3.76806 13.5484 4.06023 13.5484 4.36486V6.89189H1.45161V4.36486C1.45161 4.06023 1.57906 3.76806 1.80592 3.55265C2.03278 3.33724 2.34046 3.21622 2.66129 3.21622ZM12.3387 15.6216H2.66129C2.34046 15.6216 2.03278 15.5006 1.80592 15.2852C1.57906 15.0698 1.45161 14.7776 1.45161 14.473V8.27027H13.5484V14.473C13.5484 14.7776 13.4209 15.0698 13.1941 15.2852C12.9673 15.5006 12.6595 15.6216 12.3387 15.6216Z" fill="#404041" />
                            </svg>
                            Datas diversas</label>
                        <a href="#" class="j-buy-lace">ver datas</a>
                    </div>
                <?
                } else if (count($datas) == 1) {
                    $dia = explode('-', $datas[0]->data);
                ?>
                    <div class="box-individual-date">
                        <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.3387 1.83784H11.129V0.689189C11.129 0.506407 11.0526 0.331105 10.9164 0.201859C10.7804 0.072613 10.5957 0 10.4032 0C10.2107 0 10.0261 0.072613 9.89003 0.201859C9.75387 0.331105 9.67742 0.506407 9.67742 0.689189V1.83784H5.32258V0.689189C5.32258 0.506407 5.24611 0.331105 5.11 0.201859C4.97388 0.072613 4.78927 0 4.59677 0C4.40428 0 4.21966 0.072613 4.08355 0.201859C3.94744 0.331105 3.87097 0.506407 3.87097 0.689189V1.83784H2.66129C1.95547 1.83784 1.27856 2.10408 0.779477 2.57799C0.280384 3.0519 0 3.69465 0 4.36486V14.473C0 15.1431 0.280384 15.7859 0.779477 16.2598C1.27856 16.7338 1.95547 17 2.66129 17H12.3387C13.0445 17 13.7214 16.7338 14.2205 16.2598C14.7196 15.7859 15 15.1431 15 14.473V4.36486C15 3.69465 14.7196 3.0519 14.2205 2.57799C13.7214 2.10408 13.0445 1.83784 12.3387 1.83784ZM2.66129 3.21622H3.87097V4.36486C3.87097 4.54765 3.94744 4.72295 4.08355 4.8522C4.21966 4.98144 4.40428 5.05405 4.59677 5.05405C4.78927 5.05405 4.97388 4.98144 5.11 4.8522C5.24611 4.72295 5.32258 4.54765 5.32258 4.36486V3.21622H9.67742V4.36486C9.67742 4.54765 9.75387 4.72295 9.89003 4.8522C10.0261 4.98144 10.2107 5.05405 10.4032 5.05405C10.5957 5.05405 10.7804 4.98144 10.9164 4.8522C11.0526 4.72295 11.129 4.54765 11.129 4.36486V3.21622H12.3387C12.6595 3.21622 12.9673 3.33724 13.1941 3.55265C13.4209 3.76806 13.5484 4.06023 13.5484 4.36486V6.89189H1.45161V4.36486C1.45161 4.06023 1.57906 3.76806 1.80592 3.55265C2.03278 3.33724 2.34046 3.21622 2.66129 3.21622ZM12.3387 15.6216H2.66129C2.34046 15.6216 2.03278 15.5006 1.80592 15.2852C1.57906 15.0698 1.45161 14.7776 1.45161 14.473V8.27027H13.5484V14.473C13.5484 14.7776 13.4209 15.0698 13.1941 15.2852C12.9673 15.5006 12.6595 15.6216 12.3387 15.6216Z" fill="#404041" />
                        </svg>
                        <div class="right">
                            <label><?= $dia[2] ?> de <?= mes($dia[1]) ?></label>
                            <span class="day"><?= semana($datas[0]->data) ?></span>
                            <span class="interval"><?= $datas[0]->horario ?> - 21:00</span>
                        </div>
                    </div>
                <? } ?>
            </div>

            <footer>
                <div class="buttons">
                    <a href="#" class="btn-primary">
                        Comprar ingressos
                    </a>
                    <div class="box-modal-more">
                        <div class="box-modal-more-details">
                            <button class="close">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14 2L2 14" stroke="#404041" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M2 2L14 14" stroke="#404041" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                            <?
                            if ($datas) {
                                foreach ($datas as $dia) {
                                    $horaIni = explode(":", $dia->horarioInicio);
                                    $horaFim = explode(":", $dia->horarioTermino);
                                    $diaAtual = explode("-", $dia->data);
                                    ?>
                                    <div class="item">
                                        <span class="date"><?= $diaAtual[2] ?> de <?= mes($diaAtual[1]) ?></span>
                                        <span class="day"><?= semana($dia->data) ?></span>
                                        <span class="interval"><?= $horaIni[0] ?>:<?= $horaIni[0] ?> <?= ($horaFim) ? (' - ' . $horaFim[0] . ':' . $horaFim[1])   : ''  ?> </span>
                                    </div>
                            <?
                                }
                            }
                            ?>
                        </div>
                        <a href="#">Ver mais detalhes</a>
                    </div>
                </div>
            </footer>
        </div>
        <? if ($fotos) { ?>
        <div class="cover" data-aos="fade-left">
                <img src="<?= PATHSITE ?>uploads/produto/<?= $fotos[0]->produtoFK ?>/<?= $fotos[0]->arquivo ?>" alt="">
                <div class="top">
                    <a href="#" class="share">
                        <svg class="active" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_606_3393)">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9231 20.3077C15.521 20.3077 14.3847 19.1713 14.3847 17.7692C14.3847 16.3672 15.521 15.2308 16.9231 15.2308C18.3252 15.2308 19.4616 16.3672 19.4616 17.7692C19.4616 19.1713 18.3252 20.3077 16.9231 20.3077ZM5.07696 13.5385C3.67488 13.5385 2.5385 12.4021 2.5385 11C2.5385 9.59877 3.67488 8.46154 5.07696 8.46154C6.47904 8.46154 7.61542 9.59877 7.61542 11C7.61542 12.4021 6.47904 13.5385 5.07696 13.5385ZM16.9231 1.69231C18.3252 1.69231 19.4616 2.82869 19.4616 4.23077C19.4616 5.63285 18.3252 6.76923 16.9231 6.76923C15.521 6.76923 14.3847 5.63285 14.3847 4.23077C14.3847 2.82869 15.521 1.69231 16.9231 1.69231ZM16.9231 13.5385C15.4254 13.5385 14.1181 14.3212 13.3659 15.4948L8.83474 12.9056C9.12751 12.3302 9.30773 11.6888 9.30773 11C9.30773 10.5744 9.22567 10.1716 9.1089 9.78407L13.8228 7.09077C14.5953 7.92847 15.6937 8.46154 16.9231 8.46154C19.2602 8.46154 21.1539 6.56785 21.1539 4.23077C21.1539 1.89369 19.2602 0 16.9231 0C14.586 0 12.6923 1.89369 12.6923 4.23077C12.6923 4.65638 12.7744 5.05914 12.8912 5.44753L8.17727 8.14C7.40473 7.30315 6.30642 6.76923 5.07696 6.76923C2.73988 6.76923 0.846191 8.66292 0.846191 11C0.846191 13.3371 2.73988 15.2308 5.07696 15.2308C6.04158 15.2308 6.92072 14.8957 7.63234 14.3524L7.61542 14.3846L12.7389 17.3123C12.722 17.4646 12.6923 17.6118 12.6923 17.7692C12.6923 20.1063 14.586 22 16.9231 22C19.2602 22 21.1539 20.1063 21.1539 17.7692C21.1539 15.4322 19.2602 13.5385 16.9231 13.5385Z" fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_606_3393">
                                    <rect width="22" height="22" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_606_3393)">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9231 20.3077C15.521 20.3077 14.3847 19.1713 14.3847 17.7692C14.3847 16.3672 15.521 15.2308 16.9231 15.2308C18.3252 15.2308 19.4616 16.3672 19.4616 17.7692C19.4616 19.1713 18.3252 20.3077 16.9231 20.3077ZM5.07696 13.5385C3.67488 13.5385 2.5385 12.4021 2.5385 11C2.5385 9.59877 3.67488 8.46154 5.07696 8.46154C6.47904 8.46154 7.61542 9.59877 7.61542 11C7.61542 12.4021 6.47904 13.5385 5.07696 13.5385ZM16.9231 1.69231C18.3252 1.69231 19.4616 2.82869 19.4616 4.23077C19.4616 5.63285 18.3252 6.76923 16.9231 6.76923C15.521 6.76923 14.3847 5.63285 14.3847 4.23077C14.3847 2.82869 15.521 1.69231 16.9231 1.69231ZM16.9231 13.5385C15.4254 13.5385 14.1181 14.3212 13.3659 15.4948L8.83474 12.9056C9.12751 12.3302 9.30773 11.6888 9.30773 11C9.30773 10.5744 9.22567 10.1716 9.1089 9.78407L13.8228 7.09077C14.5953 7.92847 15.6937 8.46154 16.9231 8.46154C19.2602 8.46154 21.1539 6.56785 21.1539 4.23077C21.1539 1.89369 19.2602 0 16.9231 0C14.586 0 12.6923 1.89369 12.6923 4.23077C12.6923 4.65638 12.7744 5.05914 12.8912 5.44753L8.17727 8.14C7.40473 7.30315 6.30642 6.76923 5.07696 6.76923C2.73988 6.76923 0.846191 8.66292 0.846191 11C0.846191 13.3371 2.73988 15.2308 5.07696 15.2308C6.04158 15.2308 6.92072 14.8957 7.63234 14.3524L7.61542 14.3846L12.7389 17.3123C12.722 17.4646 12.6923 17.6118 12.6923 17.7692C12.6923 20.1063 14.586 22 16.9231 22C19.2602 22 21.1539 20.1063 21.1539 17.7692C21.1539 15.4322 19.2602 13.5385 16.9231 13.5385Z" fill="#404041" />
                            </g>
                            <defs>
                                <clipPath id="clip0_606_3393">
                                    <rect width="22" height="22" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                    <a href="#" class="like <?= (in_array($metatag->id, $todosFavoritos)) ? 'active' : '' ?>" onclick="favoritar(<?= $metatag->id ?>)" data-id-heart="<?= $metatag->id ?>">
                        <svg class="active" width="25" height="21" viewBox="0 0 25 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.5 21C12.2153 20.9997 11.9422 20.8925 11.741 20.7017L2.04669 11.4965C0.73481 10.2293 0 8.52575 0 6.75148C0 4.97719 0.73481 3.27361 2.04669 2.00651C3.37596 0.748145 5.17876 0.0412264 7.05855 0.0412264C8.93833 0.0412264 10.7411 0.748145 12.0704 2.00651L12.5 2.35899L12.9009 1.9794C13.5582 1.35035 14.3411 0.851383 15.204 0.511575C16.0669 0.171754 16.9926 -0.00211578 17.9271 6.69082e-05C18.8608 -0.00389175 19.7858 0.167849 20.6487 0.505312C21.5115 0.842787 22.2949 1.33923 22.9533 1.96584C24.2651 3.23294 25 4.93652 25 6.71081C25 8.48508 24.2651 10.1887 22.9533 11.4558L13.2589 20.6611C13.163 20.7629 13.0463 20.8453 12.9158 20.9036C12.7855 20.9618 12.644 20.9946 12.5 21ZM7.07287 2.02007C6.42251 2.01558 5.77766 2.13308 5.17551 2.36576C4.57337 2.59845 4.02586 2.94172 3.56457 3.37577C2.63504 4.2599 2.1132 5.45658 2.1132 6.70403C2.1132 7.95147 2.63504 9.14815 3.56457 10.0323L12.5 18.5462L21.4211 10.0595C21.8831 9.62251 22.2496 9.10368 22.4997 8.53253C22.7497 7.9615 22.8784 7.34936 22.8784 6.73115C22.8784 6.11293 22.7497 5.50079 22.4997 4.9297C22.2496 4.35862 21.8831 3.83979 21.4211 3.40289C20.9634 2.96802 20.4186 2.62409 19.8186 2.39127C19.2186 2.15847 18.5755 2.04149 17.9271 2.04718C17.2767 2.0427 16.6319 2.16019 16.0298 2.39287C15.4276 2.62557 14.88 2.96883 14.4188 3.40289L13.2589 4.50101C13.054 4.68505 12.7824 4.78765 12.5 4.78765C12.2176 4.78765 11.946 4.68505 11.741 4.50101L10.5812 3.40289C10.1222 2.96394 9.57579 2.61567 8.97354 2.37829C8.37128 2.1409 7.72523 2.01913 7.07287 2.02007Z" fill="white" />
                        </svg>
                        <svg width="25" height="21" viewBox="0 0 25 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.5 21C12.2153 20.9997 11.9422 20.8925 11.741 20.7017L2.04669 11.4965C0.73481 10.2293 0 8.52575 0 6.75148C0 4.97719 0.73481 3.27361 2.04669 2.00651C3.37596 0.748145 5.17876 0.0412264 7.05855 0.0412264C8.93833 0.0412264 10.7411 0.748145 12.0704 2.00651L12.5 2.35899L12.9009 1.9794C13.5582 1.35035 14.3411 0.851383 15.204 0.511575C16.0669 0.171754 16.9926 -0.00211578 17.9271 6.69082e-05C18.8608 -0.00389175 19.7858 0.167849 20.6487 0.505312C21.5115 0.842787 22.2949 1.33923 22.9533 1.96584C24.2651 3.23294 25 4.93652 25 6.71081C25 8.48508 24.2651 10.1887 22.9533 11.4558L13.2589 20.6611C13.163 20.7629 13.0463 20.8453 12.9158 20.9036C12.7855 20.9618 12.644 20.9946 12.5 21ZM7.07287 2.02007C6.42251 2.01558 5.77766 2.13308 5.17551 2.36576C4.57337 2.59845 4.02586 2.94172 3.56457 3.37577C2.63504 4.2599 2.1132 5.45658 2.1132 6.70403C2.1132 7.95147 2.63504 9.14815 3.56457 10.0323L12.5 18.5462L21.4211 10.0595C21.8831 9.62251 22.2496 9.10368 22.4997 8.53253C22.7497 7.9615 22.8784 7.34936 22.8784 6.73115C22.8784 6.11293 22.7497 5.50079 22.4997 4.9297C22.2496 4.35862 21.8831 3.83979 21.4211 3.40289C20.9634 2.96802 20.4186 2.62409 19.8186 2.39127C19.2186 2.15847 18.5755 2.04149 17.9271 2.04718C17.2767 2.0427 16.6319 2.16019 16.0298 2.39287C15.4276 2.62557 14.88 2.96883 14.4188 3.40289L13.2589 4.50101C13.054 4.68505 12.7824 4.78765 12.5 4.78765C12.2176 4.78765 11.946 4.68505 11.741 4.50101L10.5812 3.40289C10.1222 2.96394 9.57579 2.61567 8.97354 2.37829C8.37128 2.1409 7.72523 2.01913 7.07287 2.02007Z" fill="#404041" />
                        </svg>
                    </a>
        </div>
            </div>
        <? } ?>
    </section>
    <section class="more-about-2-column">
        <div class="container-medium">
            <div class="column">
                <nav class="navigation-breadcrumb" data-aos="fade-up">
                    <a href="#">Início</a>
                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <a href="#">Eventos</a>
                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <a href="#"><?= $metatag->cidade ?></a>
                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <a href="#"><?= $metatag->titulo ?></a>
                </nav>
                <header class="header-bg" id="sobre-eventos" data-aos="fade-up">
                    <div class="group-title">
                        <strong><?= $metatag->endereco ?></strong>
                        <span><?= $metatag->bairro ?>, <?= $metatag->cidade ?> / <?= $metatag->estado ?></span>
                    </div>
                </header>
                <div class="navigation-breadcrumb-mobile" data-aos="fade-up">
                    <a href="#">
                        <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 1L1 6L6 11" stroke="#404041" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        Mais em <?= $metatag->cidade ?> - <?= $metatag->estado ?></a>
                </div>
                <? if ($setores) { ?>
                    <aside class="info-about-item" data-aos="fade-up">
                        <h2>
                            Categorias
                        </h2>
                        <? foreach ($setores as $setor) { ?>
                            <hr>
                            <ul>
                                <h3>
                                    <?= $setor->setor ?>
                                </h3>
                                <? if ($setor->ingressos) { ?>
                                    <? foreach ($setor->ingressos as $ingresso) { ?>
                                        <li>
                                            <?= $ingresso->titulo ?>
                                            <span class="price">R$ <?= number_format($ingresso->preco, 2, ',', '.') ?></span>
                                        </li>
                                    <? } ?>
                                <? } ?>
                            </ul>
                        <? } ?>

                        <a href="#" class="btn-primary">Comprar ingressos</a>
                    </aside>
                <? } ?>
                <article>
                    <h2>
                        <?= $metatag->titulo ?>
                        <span>
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_606_3371)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.45817 7.00032C1.45817 5.53058 2.04202 4.12104 3.08129 3.08177C4.12055 2.04251 5.5301 1.45866 6.99984 1.45866C8.46958 1.45866 9.87912 2.04251 10.9184 3.08177C11.9576 4.12104 12.5415 5.53058 12.5415 7.00032C12.5415 8.47007 11.9576 9.87961 10.9184 10.9189C9.87912 11.9581 8.46958 12.542 6.99984 12.542C5.5301 12.542 4.12055 11.9581 3.08129 10.9189C2.04202 9.87961 1.45817 8.47007 1.45817 7.00032ZM6.99984 0.291992C3.29509 0.291992 0.291504 3.29558 0.291504 7.00032C0.291504 10.7051 3.29509 13.7087 6.99984 13.7087C10.7046 13.7087 13.7082 10.7051 13.7082 7.00032C13.7082 3.29558 10.7046 0.291992 6.99984 0.291992ZM6.4165 4.08366C6.4165 3.92895 6.47796 3.78058 6.58736 3.67118C6.69675 3.56178 6.84513 3.50032 6.99984 3.50033C7.15455 3.50032 7.30292 3.56178 7.41231 3.67118C7.52171 3.78058 7.58317 3.92895 7.58317 4.08366V7.00032H9.9165C10.0712 7.00032 10.2196 7.06178 10.329 7.17118C10.4384 7.28058 10.4998 7.42895 10.4998 7.58366C10.4998 7.73837 10.4384 7.88674 10.329 7.99614C10.2196 8.10553 10.0712 8.16699 9.9165 8.16699H6.99984C6.84513 8.16699 6.69675 8.10553 6.58736 7.99614C6.47796 7.88674 6.4165 7.73837 6.4165 7.58366V4.08366Z" fill="#7F7F7F" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_606_3371">
                                        <rect width="14" height="14" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <?
                            $hoje = new Datetime('');
                            $dataCriacao = new DateTime($metatag->dtCriacao);

                            $interval = $hoje->diff($dataCriacao);
                            ?>
                            Publicado há <?= $interval->days ?> dias
                        </span>
                    </h2>

                    <div>
                        <?= $metatag->texto ?>
                    </div>
                    <div class="list-items"></div>

                    <div class="faq">


                        <? if ($setores) { ?>
                            <div class="faq-item" data-aos="fade-right">
                                <div class="faq-title">
                                    <div class="icon-title">
                                        <img src="<?= PATHSITE ?>assets/images/icon-faq-7.svg" alt="">
                                    </div>
                                    <div class="group-title">
                                        <h3>Valores</h3>
                                        <span>Valores de cada categoria de ingresso</span>
                                    </div>
                                    <div class="icon-dropdown">
                                        <img src="<?= PATHSITE ?>assets/images/icon-dropdown.svg" alt="">
                                    </div>
                                </div>
                                <div class="faq-response">
                                    <div class="values">
                                        <h4>Categorias</h4>

                                        <? foreach ($setores as $setor) { ?>
                                            <ul>
                                                <h5>
                                                    <?= $setor->setor ?>
                                                </h5>
                                                <? if ($setor->ingressos) { ?>
                                                    <? foreach ($setor->ingressos as $ingresso) { ?>
                                                        <li>
                                                            <?= $ingresso->titulo ?>
                                                            <span class="price">R$ <?= number_format($ingresso->preco, 2, ',', '.') ?></span>
                                                        </li>
                                                    <? } ?>
                                                <? } ?>
                                            </ul>
                                        <? } ?>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                        <? if ($pontosVenda) { ?>
                            <div class="faq-item" data-aos="fade-right">
                                <div class="faq-title">
                                    <div class="icon-title" style="margin-top: 4px;">
                                        <img src="<?= PATHSITE ?>assets/images/icon-faq-7.svg" alt="">
                                    </div>
                                    <div class="group-title">
                                        <h3>Pontos de Venda</h3>
                                        <span>Locais/sites onde você pode estar comprando os ingressos</span>
                                    </div>
                                    <div class="icon-dropdown">
                                        <img src="<?= PATHSITE ?>assets/images/icon-dropdown.svg" alt="">
                                    </div>
                                </div>
                                <div class="faq-response">
                                    <div class="outlets">
                                        <? foreach ($pontosVenda as $pv) { ?>
                                            <div class="wraper">
                                                <h4><?= $pv->titulo ?></h4>
                                                <div class="item">
                                                    <? if ($pv->tipo == 'fisico') { ?>
                                                        <img src="<?= PATHSITE ?>assets/images/icon-ping.svg" alt="">
                                                    <? } else { ?>
                                                        <img src="<?= PATHSITE ?>assets/images/icon-www.svg" alt="">
                                                    <? } ?>
                                                    <div class="info">
                                                        <? if ($pv->tipo == 'fisico') { ?>
                                                            <strong class="title"><?= $pv->endereco ?></strong>
                                                        <? } else { ?>
                                                            <a target="_blank" href="<?= $pv->endere ?>">
                                                                <strong class="title"><?= $pv->endereco ?></strong>
                                                            </a>
                                                        <? } ?>
                                                        <span class="sac"><?= $pv->cep ?></span>
                                                        <span class="location"><?= $pv->cidade ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <? } ?>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                        <? if ($organizacoes) { ?>
                            <div class="faq-item" data-aos="fade-right">
                                <div class="faq-title">
                                    <div class="icon-title" style="margin-top: 4px;">
                                        <img src="<?= PATHSITE ?>assets/images/icon-faq-8.svg" alt="">
                                    </div>
                                    <div class="group-title">
                                        <h3>Organização</h3>
                                        <span>Empresa responsável pelo evento</span>
                                    </div>
                                    <div class="icon-dropdown">
                                        <img src="<?= PATHSITE ?>assets/images/icon-dropdown.svg" alt="">
                                    </div>
                                </div>
                                <div class="faq-response">
                                    <? foreach ($organizacoes as $organizacao) { ?>
                                        <div class="organization ">
                                            <div class="wraper">
                                                <h4><?= $organizacao->titulo ?></h4>
                                                <div class="item">
                                                    <strong class="title"><?= $organizacao->endereco ?></strong>
                                                    <span class="location"><?= $organizacao->cidade ?></span>
                                                </div>
                                            </div>
                                            <div class="wraper">
                                                <div class="item">
                                                    <strong class="title"><?= $organizacao->site ?></strong>
                                                </div>
                                            </div>
                                        </div>
                                    <? } ?>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                </article>
            </div>
            <? if ($setores) { ?>
                <div class="column">
                    <aside class="box-categories sticky">
                        <h2>Categorias</h2>

                        <? foreach ($setores as $setor) { ?>
                            <hr>
                            <h3><?= $setor->setor ?></h3>
                            <? if ($setor->ingressos) { ?>
                                <ul>
                                    <? foreach ($setor->ingressos as $ingresso) { ?>
                                        <li>
                                            <span><?= $ingresso->titulo ?></span>
                                            <span class="price">R$ <?= number_format($ingresso->preco, 2, ',', '.') ?></span>
                                        </li>
                                    <? } ?>
                                </ul>
                            <? } ?>
                        <? } ?>

                        <a href="#" class="btn-primary">Comprar ingressos</a>
                    </aside>
                </div>
            <? } ?>
        </div>
    </section>
    <? if ($destaques) { ?>
        <section class="s-featured-events" id="eventos-destaque">
            <?= View('templates/eventos-destaque', $destaques) ?>
        </section>
    <? } ?>
</main>