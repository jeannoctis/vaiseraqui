<footer class="footer">
    <div class="content">
        <div class="item">
            <img class="logo" src="<?= PATHSITE ?>assets/images/logo-white.svg" alt="logo Projeto Online Arq">
            <? if ($redes) { ?>
                <nav class="social">
                    <? foreach ($redes as $rede) { ?>
                        <a href="<?= $rede->link ?>" target="_blank">
                            <img src="<?= PATHSITE ?>uploads/rede_social/<?= $rede->imagem ?>" alt="ícone <?= $rede->nome ?>">
                        </a>
                    <? } ?>
                </nav>
            <? } ?>
            <a href="#" class="btn-primary">Área do Cliente</a>
        </div>
        <div class="item">
            <h3>Institucional</h3>
            <ul>
                <li><a href="<?= PATHSITE ?>sobre-nos/">Sobre nós</a></li>
                <? if ($depoimentos) { ?>
                    <li><a href="<?= PATHSITE ?>#depoimentos" class="j-button-scroll-section">Depoimentos</a></li>
                <? } ?>
                <? if ($faqs) { ?>
                    <li><a href="<?= PATHSITE ?>#faq" class="j-button-scroll-section">FAQ</a></li>
                <? } ?>
                <li><a href="<?= PATHSITE ?>contato/">Contato</a></li>
            </ul>
        </div>
        <div class="item">
            <h3>Nossos projetos</h3>
            <ul>
                <li><a href="<?= PATHSITE ?>projetos/#maisrecentes" class="j-button-scroll-section">Projetos recentes</a></li>
                <li><a href="<?= PATHSITE ?>projetos/#maisrelevantes" class="j-button-scroll-section">Mais vendidos</a></li>
            </ul>
        </div>
        <div class="item">
            <h3>Conteúdos</h3>
            <ul>
                <li><a href="<?= PATHSITE ?>blog/">Blog</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <img src="<?= PATHSITE ?>assets/images/uaau-white-footer.svg" alt="logo Uaau Digital">
    </div>

    <!-- Cookies + WhatsApp -->
    <? if (!$_COOKIE['aceitou']) { ?>
        <div id="aviso-cookies" data-aos="fade-up">
            <p>
                Este site usa cookies para personalizar anúncios e melhorar a sua experiência no site. Ao continuar
                navegando, você concorda com a nossa <a href="<?= PATHSITE ?>politica-de-privacidade/">Política de
                    Privacidade</a> e nossos <a href="<?= PATHSITE ?>termos-de-uso/">Termos de Uso</a>.
            </p>
            <input type="hidden" name="cookies" value="1">
            <button type="button" onclick='aceitaCookie()' type="submit" tabindex="0">
                <span>
                    Continuar
                </span>
            </button>
        </div>
    <? } ?>
    <? if ($whatsapps) { ?>
        <div class="ul-whatsapp">
            <div class="topo-whats">Ainda tem dúvidas? Fale conosco!</div>
            <div class="cont-wpp">
                <ul>
                    <?
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
                    $removeChars = array("-", "(", ")", " ");

                    foreach ($whatsapps as $unidade) {

                        $linkwhatsapp = "https://" . $usaApi . ".whatsapp.com/send?phone=55" . str_replace($removeChars, "", $unidade->telefone);
                        ?>
                        <li>
                            <a onclick="contadorWhatsapp(<?= $unidade->id ?>); cliqueWhatsapp();" aria-label="Whatsapp" href="<?= $linkwhatsapp ?>" title="Enviar mensagem para <?= $unidade->titulo ?>" rel="noopener nofollow" target="_blank">
                                <div class="foto">
                                    <picture>
                                        <source srcset="<?= PATHSITE ?>uploads/whatsapp/<?= $unidade->arquivo ?>.webp" type="image/webp">
                                        <img height="30" src="<?= PATHSITE ?>uploads/whatsapp/<?= $unidade->arquivo ?>" />
                                    </picture>
                                </div>
                                <div class="info-wpp">
                                    <p>
                                        <?= $unidade->categoria ?>
                                    </p>
                                    <p>
                                        <?= $unidade->titulo ?>
                                    </p>
                                </div>
                            </a>
                        </li>
                    <? } ?>
                </ul>
            </div>
        </div>
    <? } ?>
    <div onclick="listaWhatsapp();" class="whatsapp fonteBlack" data-aos="fade-down">
        <img alt="" src="<?= PATHSITE ?>assets/images/whatsapp-branco.svg" height="20">
        <span>Fale Conosco</span>
    </div>

</footer>

<div class="modal-video">
    <div class="modal-content">
        <button class="close">Fechar</button>
        <div class="embed">
            <div class="custom-loader"></div>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</div>

<div class="modal-review">
    <div class="modal-content">
        <button class="close">Fechar</button>
        <div id="reviewInfo">

        </div>
    </div>
</div>

<script>
    var public_recaptcha = "<?= $configs->public_recaptcha ?>";
    var PATHSITE = '<?= PATHSITE ?>';
    var PAGINA_VISITADA = '<?= $_SERVER['PATH_INFO'] ?>';
    var pagina = '<?= $pagina ?>';</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="<?= PATHSITE ?>assets/scripts/jquery/jquery.js"></script>
<script src="<?= PATHSITE ?>assets/scripts/lazyscript.min.js"></script>
<script src="<?= PATHSITE ?>assets/scripts/active-header-when-scroll.js"></script>
<script src="<?= PATHSITE ?>assets/scripts/menu-mobile.js"></script>
<script src="<?= PATHSITE ?>assets/scripts/mask-telefone.js"></script>
<script src="<?= PATHSITE ?>assets/scripts/custom-swiper.js"></script>
<script src="<?= PATHSITE ?>assets/scripts/scroll-smoothing.js"></script>
<script src="<?= PATHSITE ?>assets/scripts/cardLink.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>

<script>
    const cSwal = Swal.mixin({
    confirmButtonColor: "#7191A7",
            customClass: {
            popup: 'custom-swal-font',
            }
    })
</script>

<? if ($pagina == 1) { ?>
    <!-- HOME -->
    <script src="<?= PATHSITE ?>assets/scripts/modal.js"></script>
    <script src="<?= PATHSITE ?>assets/scripts/filter-mobile.js"></script>
    <script src="<?= PATHSITE ?>assets/scripts/faq.js"></script>

    <script>
    new CustomSwiper('ourProjects', 3, 14)
            new CustomSwiper('ourProjectsResponsive', 2, 14)
            new CustomSwiper('reviewsSwiper', 1, 14)
            new CustomSwiper('swiper-only-mobile', 1, 14)

            // Setup modal Review
            const modalReview = document.querySelector('.modal-review')
            const btnClose = modalReview.querySelector('.close')
            const btnsOpenModalReview = document.querySelectorAll('.j-button-review')

            btnsOpenModalReview.forEach(btn => {
            btn.addEventListener('click', (e) => {
            e.preventDefault()

                    modalReview.classList.add('open')
            })
            })

            btnClose.addEventListener('click', function() {
            modalReview.classList.remove('open')
            })

            // Mask to phone
            const inputTelefone = document.querySelector('input.phone');
    inputTelefone.addEventListener('input', function(e) {
    inputTelefone.value = telefone(e.target.value)
    })

            // Ajax Review
                    function reviewInfo(id) {
                    $.post(PATHSITE + "review/reviewInfo", {
                    id
                    },
                            function(data) {
                            retorno = jQuery.parseJSON(data);
                            if (retorno.html) {
                            $("#reviewInfo").html(retorno.html);
                            }
                            }
                    );
                    }
    </script>

<? } else if ($pagina == 2) { ?>
    <!-- SOBRE NÓS -->
    <script src="<?= PATHSITE ?>assets/scripts/custom-swiper.js"></script>

    <script>
    <? if ($txInstagram->descricao) { ?>
                window.onload = instagram();
    <? } ?>

            function instagram() {
            $.post(PATHSITE + "utils/instagram", {},
                    function(data) {
                    retorno = jQuery.parseJSON(data);
                    if (retorno.html) {
                    $("#instagramAPI").html(retorno.html);
                    }
                    }
            );
            }
    </script>

<? } else if ($pagina == 3) { ?>
    <!-- PROJETO LISTAGEM -->

    <script>
                new CustomSwiper('ourProjects', 3, 14)
                        new CustomSwiper('ourProjectsResponsive', 2, 14)

                        // Filter dropdown
                        const buttonFilter = document.querySelector('.filter-mobile .bottom > h3')
                        const iconDropdown = document.querySelector('.filter-mobile .bottom > h3 .icon-checked')

                        const boxFilter = document.querySelector('.filter-mobile .bottom .form')
                        const items = document.querySelectorAll('.filter-mobile .bottom .form .item')

                        buttonFilter.addEventListener('click', () => {
                        if (boxFilter.classList.contains('open')) {
                        boxFilter.classList.remove('open')
                                iconDropdown.classList.remove('open')
                        } else {
                        boxFilter.classList.add('open')
                                iconDropdown.classList.add('open')
                        }
                        })

                        items.forEach(item => {
                        const button = item.querySelector('button')
                                const h3 = item.querySelector('h3')
                                const ul = item.querySelector('ul')

                                h3.addEventListener('click', (e) => {
                                e.preventDefault()
                                        if (ul.classList.contains('open')) {
                                item.classList.remove('open')
                                        ul.classList.remove('open')
                                        button.classList.remove('open')
                                } else {
                                item.classList.add('open')
                                        ul.classList.add('open')
                                        button.classList.add('open')
                                }
                                })
                        })

                        // count number of inputs checked
                                function returnCheckInput() {
                                const formInputs = document.querySelectorAll('.form input[type="checkbox"]:checked');
                                const spanNumberOfChecked = document.querySelector('.numberCheckeds')
                                        const quantity = formInputs.length

                                        if (quantity > 0) {
                                spanNumberOfChecked.innerHTML = quantity
                                        spanNumberOfChecked.classList.add('checked')
                                } else {
                                spanNumberOfChecked.classList.remove('checked')
                                }
                                }

                        const inputsCheckbox = document.querySelectorAll('.form input[type="checkbox"]')
                                inputsCheckbox.forEach(input => {
                                input.addEventListener('click', () => {
                                returnCheckInput()
                                })
                                })

                                const title = document.querySelector('.title-mobile')
                                const infoWithNotFilter = document.querySelector('.title-with-not-filter')
                                const infoWithFilter = document.querySelector('.title-with-filter')
                                const formTop = document.querySelector('.filter-mobile .top')
                                const forms = document.querySelectorAll('form')
                                const loading = document.querySelector('.loading')
                                const sectionsWithNotFilter = document.querySelector('.sections-with-not-filter')
                                const sectionsWithFilter = document.querySelector('.sections-with-filter')

                                forms.forEach(form => {
                                form.addEventListener('submit', function(e) {
                                e.preventDefault()

                                        sectionsWithNotFilter.classList.add('hide')

                                        loading.classList.add('active')
                                        setTimeout(() => {
                                        loading.classList.remove('active')
                                                // buttonFilter.click()
                                                // title.classList.add('filtered')
                                                // formTop.classList.add('filtered')
                                                // if (infoWithFilter) infoWithFilter.classList.remove('hide')
                                                // if (infoWithNotFilter) infoWithNotFilter.classList.add('hide')
                                                // sectionsWithFilter.classList.remove('hide')
                                                form.submit();
                                        }, 750)
                                })
                                })

    <? if ($pjFiltrados) { ?>
                            sectionsWithNotFilter.classList.add('hide')
                                    buttonFilter.click()
                                    title.classList.add('filtered')
                                    formTop.classList.add('filtered')
                                    if (infoWithFilter) infoWithFilter.classList.remove('hide')
                                    if (infoWithNotFilter) infoWithNotFilter.classList.add('hide')
                                    sectionsWithFilter.classList.remove('hide')
    <? } ?>

    <? if (isset($pjFiltrados) && count($pjFiltrados) == 0) { ?>
                            cSwal.fire({
                            title: "Oops...",
                                    text: "Sem resultados. Tento outro filtro! =)",
                                    icon: "info",
                                    confirmButtonColor: "#7191A7",
                                    customClass: {
                                    popup: 'custom-swal-font',
                                    }
                            })
    <? } ?>
    </script>

<? } else if ($pagina == 4) { ?>
    <!-- PROJETO INTERNA -->
    <script src="<?= PATHSITE ?>assets/scripts/gallery.js"></script>
    <script src="<?= PATHSITE ?>assets/scripts/modal-project.js"></script>

    <script>
                        new CustomSwiper('blueSwiper', 1, 10)
                                new CustomSwiper('tourVirtual', 1, 10)

                                new Swiper(`.gallerySwiper`, {
                                spaceBetween: 10,
                                        slidesPerView: 4.5
                                });
                        new Swiper(`.itemsScroll`, {
                        spaceBetween: 10,
                                slidesPerView: 1.2
                        });
                        AOS.init({
                        duration: 1000,
                                once: true
                        });
                        // table list mobile
                        const titleTable = document.querySelector('.table-list .title')
                                titleTable.addEventListener('click', (e) => {
                                e.preventDefault()
                                        titleTable.parentElement.classList.toggle('open')
                                })

                                // Hide purchase button when inside rotation option
                                const boxRotate = document.querySelector('.blue-print')
                                const buttonPurchase = document.querySelector('.box-gallery .content .text a.btn-primary')

                                function isElementVisible(el) {
                                var rect = el.getBoundingClientRect();
                                var windowHeight = window.innerHeight || document.documentElement.clientHeight;
                                return (
                                        rect.top >= 0 &&
                                        rect.left >= 0 &&
                                        rect.bottom <= windowHeight
                                        );
                                }

                        function isPotrait() {
                        if (window.orientation === 0 || window.orientation === 180) {
                        return true

                        } else if (window.orientation === 90 || window.orientation === - 90) {
                        return false
                        }
                        }

                        window.addEventListener('scroll', function() {
                        if (window.innerWidth > 780) {
                        return
                        }
                        if (isElementVisible(boxRotate)) {
                        buttonPurchase.style.visibility = 'hidden'
                                if (!isPotrait()) {
                        buttonPurchase.style.visibility = 'visible'
                        } else {
                        buttonPurchase.style.visibility = 'hidden'
                        }
                        } else {
                        if (!isPotrait()) {
                        buttonPurchase.style.visibility = 'hidden'
                        } else {
                        buttonPurchase.style.visibility = 'visible'
                        }
                        }
                        })
    </script>

<? } else if ($pagina == 5) { ?>
    <!-- BLOG -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
                        $(document).ready(function() {
                        $('.js-example-basic-single').select2({
                        placeholder: 'Selecione uma categoria'
                        });
                        });
                        new Swiper(`.itemsScroll`, {
                        spaceBetween: 10,
                                slidesPerView: 1.2
                        });
                        const btnCopy = document.querySelector("#btnCopy");
                        if (btnCopy) {
                        btnCopy.addEventListener("click", (e) => {
                        e.preventDefault();
                        var link = window.location.href;
                        navigator.clipboard.writeText(link).then(cSwal.fire({
                        title: 'Link copiado!',
                                showConfirmButton: false,
                                timer: 1000,
                                toast: true,
                        }));
                        });
                        }

                        const categorySelect = document.querySelector("[data-cat-select]")

                                categorySelect.addEventListener("change", () => {
                                console.log(categorySelect.value)
                                })

                                $('#select2').on('select2:select', function(e) {
                        $('input[name=procura]').val('')
                                $('#blogFilter').submit();
                        });
                        $('#searchBtn').on('click', function() {
                        $('#select2').val('');
                        })
                                $('#searchBtn').on('keydown', function(e) {
                        if (e.key === 'Enter') {
                        $('#select2').val('');
                        }
                        })
    </script>
<? } else if ($pagina == 6) { ?>
    <!-- CONTATO -->

    <script>
                                // Mask to phone
                                const inputTelefone = document.querySelector('input.phone');
                        inputTelefone.addEventListener('input', function(e) {
                        inputTelefone.value = telefone(e.target.value)
                        })
    </script>
<? } else if ($pagina == 15) { ?>

    <script src="<?= PATHSITE ?>assets/scripts/mask-cpf.js"></script>
    <script src="<?= PATHSITE ?>assets/scripts/mask-cep.js"></script>
    <script src="<?= PATHSITE ?>assets/scripts/modal-project.js"></script>

    <script>
                        AOS.init({
                        duration: 1000,
                                once: true
                        });
                        const inputCpf = document.querySelector('input.cpf');
                        inputCpf.addEventListener('input', function(e) {
                        inputCpf.value = cpf(e.target.value)
                        })

                                const inputCep = document.querySelector('input.cep');
                        inputCep.addEventListener('input', function(e) {
                        inputCep.value = mascaraCep(e.target.value)
                        })

                                const inputTelefone = document.querySelector('input.phone');
                        inputTelefone.addEventListener('input', function(e) {
                        inputTelefone.value = telefone(e.target.value)
                        })
    </script>
<? } else if ($pagina == 17 && $payment->point_of_interaction->transaction_data->qr_code_base64) { ?>
    <script type="text/javascript" src="<?= PATHSITE ?>assets/scripts/qrcode/qrious.min.js"></script>
    <script>
                        new QRious({
                        padding: 25,
                                size: 250,
                                element: document.getElementById("qrcodepix"),
                                level: 'H',
                                value: "<?= $payment->qr_code_base64 ?>"
                        });
    </script>
<? } ?>
</body>

<script>
                    AOS.init({
                    duration: 1000,
                            once: true
                    });
<? if ($erro) { ?>
                        cSwal.fire({
                        title: "Ops,",
                                text: "<?= $erro ?>",
                                icon: "error",
                        });
<? } else if ($sucesso) { ?>
                        enviarContato();
                        cSwal.fire({
                        title: "Obrigado",
                                text: "<?= $sucesso ?>",
                                icon: "success",
                        });
<? } ?>

                    function enviarContato() {
<?
if ($analytics[4]) {
    echo $analytics[4]->codigo;
}
?>
                    }

                    function cliqueWhatsapp() {
<?
if ($analytics[3]) {
    echo $analytics[3]->codigo;
}
?>
                    }
</script>

</html>