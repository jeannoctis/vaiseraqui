(function () {
    new Swiper(".videoSwiper", {
        pagination: {
            el: ".swiper-pagination",
            type: "fraction",
        },
        allowTouchMove: false,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    const swiperBtnPrev = document.querySelector('.swiper-button-prev');
    const swiperBtnNext = document.querySelector('.swiper-button-next');

    let hasPrev
    let hasNext = true;

    swiperBtnPrev.addEventListener('click', function () {
        let finish = this.classList.contains('swiper-button-disabled');

        if (finish) {
            hasPrev = false;
            hasNext = true;
        } else {
            hasNext = true;
        }
    })

    swiperBtnNext.addEventListener('click', function () {
        let finish = this.classList.contains('swiper-button-disabled');

        if (finish) {
            hasNext = false;
            hasPrev = true;
        } else {
            hasPrev = true;
        }
    })

    const lpBtnPrev = document.querySelector(".navigation .prev");
    const lpBtnNext = document.querySelector(".navigation .next");
    const lpCurrentSlide = document.querySelector(".navigation .current");
    const lpTotalSlide = document.querySelector(".navigation .lenght");
    const currentSlide = document.querySelector('.swiper-pagination-current');
    const totalSlide = document.querySelector('.swiper-pagination-total');
    const iframes = document.querySelectorAll("iframe");

    lpBtnPrev.addEventListener("click", function (e) {
        e.preventDefault();

        swiperBtnPrev.click();
        updateCurrent();
        updatePaginationBtn();
    })

    lpBtnNext.addEventListener("click", function (e) {
        e.preventDefault();

        swiperBtnNext.click();
        updateCurrent();
        updatePaginationBtn();
    })

    updateCurrent();

    function updateCurrent () {
        lpTotalSlide.innerHTML = totalSlide.innerHTML;
        lpCurrentSlide.innerHTML = currentSlide.innerHTML;
    }
    function updatePaginationBtn () {
        hasPrev ? lpBtnPrev.classList.add("active") : lpBtnPrev.classList.remove("active")
        hasNext ? lpBtnNext.classList.add("active") : lpBtnNext.classList.remove("active")
    }
})()