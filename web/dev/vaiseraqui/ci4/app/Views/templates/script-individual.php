<? if ($pagina == 1) { ?>
    <!-- Home -->
    <script>
        // Form Select
        const boxes = document.querySelectorAll('.j-box-select')
                boxes.forEach((box, key) => {
                new Selector(box)
                })

                // My Spaces    
                const MySpaceMenuTabs = document.querySelectorAll('.my-spaces .menu-abas > a')
                const MySpaceItems = document.querySelectorAll('.my-spaces .menu-wraper > .item')

                new MenuTabs(MySpaceMenuTabs, MySpaceItems)

                // My Services    
                const MyServicesMenuTabs = document.querySelectorAll('.my-services .menu-abas > a')
                const MyServicesItems = document.querySelectorAll('.my-services .menu-wraper > .item')

                new MenuTabs(MyServicesMenuTabs, MyServicesItems)

                // My Callendar    
                const MyCallendarMenuTabs = document.querySelectorAll('.my-callendar .menu-abas .swiper-slide > a')
                const MyCallendarItems = document.querySelectorAll('.my-callendar .menu-wraper > .item')

                new MenuTabs(MyCallendarMenuTabs, MyCallendarItems)

                // Configuration click box
                const planItems = document.querySelectorAll('.card-clicked')
                planItems.forEach(item => {
                item.addEventListener('click', (e) => {
                e.preventDefault()
                        const link = item.querySelector('a')
                        if (link) {
                window.location = link.href
                }
                })
                });
        eventosData('<?= date("Y-m-d") ?>');
    </script>
    
        <?
    echo View('templates/checkin-out');
    ?>    
<? } else if ($pagina == 2) { ?>
    <!-- Sobre nós -->
    <script>
        // Form Select
        const boxes = document.querySelectorAll('.j-box-select')
                boxes.forEach((box, key) => {
                new Selector(box)
                })
    </script>
<? } else if ($pagina == 4) { ?>
    <!-- Planos -->
    <script>
                // Form Select
                const boxes = document.querySelectorAll('.j-box-select')
                boxes.forEach((box, key) => {
                new Selector(box)
                })

                // Swiper Plan
                const buttonPrev = document.querySelector('.navigation-arrows .prev')
                const buttonNext = document.querySelector('.navigation-arrows .next')

                const swiperPlan = new Swiper('.planSwiper', {
                slidesPerView: 1.1,
                        spaceBetween: 15,
                        breakpoints: {
                        769: {
                        slidesPerView: 2.1,
                        },
                                1120: {
                                slidesPerView: 3,
                                },
                        }
                })

                buttonNext.addEventListener('click', function(e) {
                e.preventDefault()
                        swiperPlan.slideNext()
                })

                buttonPrev.addEventListener('click', function(e) {
                e.preventDefault()
                        swiperPlan.slidePrev()
                })

                swiperPlan.on('reachBeginning', function() {
                buttonNext.classList.add('active')
                        buttonPrev.classList.remove('active')
                });
        swiperPlan.on('reachEnd', function() {
        buttonNext.classList.remove('active')
                buttonPrev.classList.add('active')
        });
        swiperPlan.on('slideChange', function() {
        if (!swiperPlan.isBeginning) {
        buttonPrev.classList.add('active')
        }

        if (!swiperPlan.isEnd) {
        buttonNext.classList.add('active')
        }
        });
        // Swiper Plan    
        const swiperPrice = new Swiper('.priceSwiper', {
        slidesPerView: 1.1,
                spaceBetween: 15,
                breakpoints: {
                769: {
                slidesPerView: 1.8,
                },
                        1200: {
                        slidesPerView: 2.3,
                        },
                        1300: {
                        slidesPerView: 3,
                        },
                }
        })


                // Modal Plan
                const buttonModal = document.querySelector('.box-modal-open .button')
                const modal = document.querySelector('.modal-plan-container')
                const btnClose = modal.querySelector('.close')
                const body = document.querySelector('body')

                buttonModal.addEventListener('click', function(e) {
                e.preventDefault()
                        body.classList.add('no-scroll')
                        modal.classList.add('open')
                })
                btnClose.addEventListener('click', function(e) {
                e.preventDefault()
                        body.classList.remove('no-scroll')
                        modal.classList.remove('open')
                })

                const btnInternalModalSelect = document.querySelectorAll('.group-category .j-btn-select')
                const boxesInternal = modal.querySelectorAll('.group-category')

                btnInternalModalSelect.forEach(btn => {
                btn.addEventListener('click', function(e) {
                const box = btn.parentElement.parentElement;
                turnDisabledInput()

                        box.classList.add('selected')
                        const input = box.querySelector('.j-input-order-select input')
                        if (input) {
                input.disabled = false
                }
                })
                })


                function turnDisabledInput() {
                boxesInternal.forEach(box => {
                box.classList.remove('selected')
                        const input = box.querySelector('.j-input-order-select input')
                        if (input) {
                input.disabled = true
                }
                })
                }

        function setValueInForm(type, params) {
        const formboxModalOpen = document.querySelector('.box-modal-open')
         const labelButton = formboxModalOpen.querySelector('.button')
                const labelResult = formboxModalOpen.querySelector('.label-value')
                const inputResult = formboxModalOpen.querySelector('input.modal-value-selected')

         labelButton.innerHTML = `Selecionado→`
                labelResult.innerHTML = `${type} <br /> ${params}`
                inputResult.value = `${type} ${params}`

                btnClose.click()
        }

        const form = document.querySelector('.formModal')
                form.addEventListener('submit', function(e) {
                e.preventDefault()
                        const inputSelected = form.querySelector('input[type=radio]:checked')

                        if (!inputSelected) {
                alert('Selecione a localização do anúncio')
                        return
                }

                const box = inputSelected.parentElement.parentElement.parentElement
                        const input = box.querySelector('.j-input-order-select input')

                        let isEmpty = false;
                if (input) {
                isEmpty = input.value === ''
                }

                if (isEmpty) {
                alert('Selecione a categoria')
                } else {
                const category = inputSelected.value
                        const categoryTitles = {
                        "categoria-1": "Anúncio de categoria (Grande) Home",
                                "categoria-2": "Anúncio de categoria (Pequeno) Home",
                                "categoria-3": "Anúncio de categoria (Grande) Internas",
                                "categoria-4": "Anúncio de categoria (Pequeno) Internas",
                                "categoria-5": "Anúncio banner Principal Home",
                                "categoria-6": "Anúncio banner Lateral Blog - Interna",
                        }
                let params = ''
                        if (input) {
                params = input.value
                }

                setValueInForm(categoryTitles[category], params)
                }
                })
    </script>
<? } else if ($pagina == 3) { ?>
    <!-- Eventos listagem -->
    <script>
                // Form Select
                const boxes = document.querySelectorAll('.j-box-select')
                boxes.forEach((box, key) => {
                new Selector(box)
                })

                // My Callendar    
                const MyCallendarMenuTabs = document.querySelectorAll('.my-callendar .menu-abas .swiper-slide > a')
                const MyCallendarItems = document.querySelectorAll('.my-callendar .menu-wraper > .item')

                new MenuTabs(MyCallendarMenuTabs, MyCallendarItems);
        eventosData('<?= date("Y-m-d") ?>');
    </script>
<? } else if ($segments[0] == "evento") { ?>
    <!-- Evento interna -->
    <script>
        // Form Select
        const boxes = document.querySelectorAll('.j-box-select')
                boxes.forEach((box, key) => {
                new Selector(box)
                })

                // Modal Buy Lance    
                const buyLance = document.querySelector('.j-buy-lace')
                const modalLance = document.querySelector('.box-modal-more-details')
                const closeModal = modalLance.querySelector('.close')

                buyLance.addEventListener('click', function(e) {
                e.preventDefault()
                        modalLance.classList.toggle('open')
                })

                closeModal.addEventListener('click', function(e) {
                e.preventDefault()
                        modalLance.classList.remove('open')
                })
    </script>
<? } else if ($pagina == 11) { ?>
    <!-- prestadores de servicos listagem -->
    <script>
                // Form Select
                const boxes = document.querySelectorAll('.j-box-select')
                boxes.forEach((box, key) => {
                new Selector(box)
                })
    </script>
<? } else if ($segments[0] == "prestadores-de-servicos") { ?>
    <!-- prestador de servicos interna -->
    
    <?   echo View('templates/checkin-out'); ?>
    
<? } else if ($pagina == 25) {
    ?>
    <!-- Saloes de festa e area de lazer listagem -->
      <?
    echo View('templates/checkin-out');
    ?>
    <script>


                // Form Select
                const boxes = document.querySelectorAll('.j-box-select')
                boxes.forEach((box, key) => {
                new Selector(box)
                })
    </script>
<? } else if ($tipopagina == "salao-de-festa") { ?>
    <!-- Saloes de festa e area de lazer interna -->
    
    <script>        
        // Form Select
        const boxes = document.querySelectorAll('.j-box-select')
                boxes.forEach((box, key) => {
                new Selector(box)
                })
    </script>
    
    <?echo View('templates/checkin-out');?>
    
<? } else if ($pagina == 12 && !$segments[1]) {
    ?>
    <!-- Alguel para temporada listagem -->
    <script>
                // Controla modal de mapa

                // Form Select
                const boxes = document.querySelectorAll('.j-box-select')
                boxes.forEach((box, key) => {
                new Selector(box)
                })
    </script>
    
       <?
    echo View('templates/checkin-out');
    ?>    
    
<? } else if ($pagina == 12 && $segments[1]) { ?>
    <!-- Alguel para temporada interna -->
    <script>
                // Form Select
                const boxes = document.querySelectorAll('.j-box-select')
                boxes.forEach((box, key) => {
                new Selector(box)
                })

                new Sticksy('.sticky', {
                topSpacing: 150
                });
    </script>
<? } else if ($pagina == 24 && !$segments[1]) { ?>
    <!-- Lojas temporarias listagem -->
    <script>
        // Form Select
        const boxes = document.querySelectorAll('.j-box-select')
                boxes.forEach((box, key) => {
                new Selector(box)
                })
    </script>
<? } else if ($pagina == 24 && $segments[1]) { ?>
    <!-- Lojas temporarias interna -->
    <script>
                // Date picker
                $(document).ready(function() {
        $(function() {
        $.datepicker.setDefaults($.datepicker.regional['sv']);
        const config = {
        dateFormat: 'dd/mm/yy',
                dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
                dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                nextText: 'Proximo',
                prevText: 'Anterior'
        }

        $("#desktop-table-checkin").datepicker(config);
        $("#desktop-table-checkout").datepicker(config);
        $("#mobile-table-checkin").datepicker(config);
        $("#mobile-table-checkout").datepicker(config);
        });
        })


                // Form Select
                const boxes = document.querySelectorAll('.j-box-select')
                boxes.forEach((box, key) => {
                new Selector(box)
                })


                // Slide
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

                buttonNext.addEventListener('click', function(e) {
                e.preventDefault()
                        console.log('next')
                        swiperImoveis.slideNext()
                })

                buttonPrev.addEventListener('click', function(e) {
                e.preventDefault()
                        console.log('prev')
                        swiperImoveis.slidePrev()
                })

                swiperImoveis.on('reachBeginning', function() {
                buttonNext.classList.add('active')
                        buttonPrev.classList.remove('active')
                });
        swiperImoveis.on('reachEnd', function() {
        buttonNext.classList.remove('active')
                buttonPrev.classList.add('active')
        });
    </script>
<? } else if ($pagina == 5 && !$segments[1]) { ?>
    <!-- BLOG listagem -->
    <script>
        const btnCategoryModal = document.querySelector('.more-about-modal > a')
                const categoryModal = document.querySelector('.more-about-modal > .modal-more-categories')
                const modalLinks = categoryModal.querySelectorAll('a')

                btnCategoryModal.addEventListener('click', function(e) {
                e.preventDefault()
                        categoryModal.classList.toggle('open')

                })
                modalLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                categoryModal.classList.remove('open')
                })
                })

                // Form Select
                const boxes = document.querySelectorAll('.j-box-select')
                boxes.forEach((box, key) => {
                new Selector(box)
                })
    </script>
<? } else if ($pagina == 5 && $segments[1] == "categoria") { ?>
    <!-- BLOG categoria -->
    <script>
                // Form Select
                const boxes = document.querySelectorAll('.j-box-select')
                boxes.forEach((box, key) => {
                new Selector(box)
                })
    </script>
<? } else if ($pagina == 5 && $segments[1] != "categoria") { ?>
    <!-- BLOG artigo -->
    <script>
                // Form Select
                const boxes = document.querySelectorAll('.j-box-select')
                boxes.forEach((box, key) => {
                new Selector(box)
                })
    </script>
<? } else if ($pagina == 23) { ?>
    <!-- Hospedagens - listagem -->
    <script type="module">
                // Controla modal de mapa


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

                buttonNext.addEventListener('click', function(e) {
                e.preventDefault()
                        console.log('next')
                        swiperImoveis.slideNext()
                })

                buttonPrev.addEventListener('click', function(e) {
                e.preventDefault()
                        console.log('prev')
                        swiperImoveis.slidePrev()
                })

                swiperImoveis.on('reachBeginning', function() {
                buttonNext.classList.add('active')
                        buttonPrev.classList.remove('active')
                });
        swiperImoveis.on('reachEnd', function() {
        buttonNext.classList.remove('active')
                buttonPrev.classList.add('active')
        });
        // Form Select
        const boxes = document.querySelectorAll('.j-box-select')
                boxes.forEach((box, key) => {
                new Selector(box)
                })
    </script>
    
       <?
    echo View('templates/checkin-out');
    ?>    
    
<? } else if ($segments[0] == "hospedagens") { ?>
    <!-- Hospedagem - interna -->
    
         <?
    echo View('templates/checkin-out');
    ?>
    
    <script>
     
                // Form Select
                const boxes = document.querySelectorAll('.j-box-select')
                boxes.forEach((box, key) => {
                new Selector(box)
                })

                // Guest
                const orderGuestOptions = document.querySelectorAll('.modal-order-select a')
                orderGuestOptions.forEach(option => {

                option.addEventListener('click', function(e) {
                e.preventDefault()
                        e.stopPropagation()
                })
                })
    </script>
<? } else if ($pagina == 6) { ?>
    <!-- Contato -->
    <script>
                // Form Select
                const boxes = document.querySelectorAll('.j-box-select')
                boxes.forEach((box, key) => {
                new Selector(box)
                })
    </script>
<? } else if ($pagina == 20) { ?>
    <!-- Políticas -->
    <script>
                const navigationTermsLinks = document.querySelectorAll('.navigation-terms a')

                function highlightOnScroll() {
                const headings = document.querySelectorAll('h3[data-title]');
                headings.forEach(heading => {
                const rect = heading.getBoundingClientRect();
                if (rect.top <= 100 && rect.bottom >= 0) {
                const link = document.querySelector(`.navigation-terms a[data-link=${heading.dataset.title}]`)
                        console.log('remover atives')
                        cleanAllActiveLink()
                        console.log('adicionar ativo')
                        link.classList.add('active')
                }
                });
                }

        function cleanAllActiveLink() {
        navigationTermsLinks.forEach(link => {
        link.classList.remove('active')
        })
        }

        window.addEventListener('scroll', highlightOnScroll);
        // Form Select
        const boxes = document.querySelectorAll('.j-box-select')
                boxes.forEach((box, key) => {
                new Selector(box)
                })
    </script>
<? } ?>

<? if ($videos) { ?>
    <script>
                function verVideos() {
                Fancybox.show([
    <?
    foreach ($videos as $video) {
        $url_components = parse_url($video->video);
        if ($url_components) {
            parse_str($url_components['query'], $params);
        }
        ?>
                    {
                    src: "https://www.youtube.com/watch?v=<?= $params['v'] ?>",
                            thumb: "http://i3.ytimg.com/vi/<?= $params['v'] ?>/hqdefault.jpg",
                    }, <? } ?>
                ]);
                }
<? } ?>
</script>