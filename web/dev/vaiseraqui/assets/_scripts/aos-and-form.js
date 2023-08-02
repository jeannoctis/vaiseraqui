AOS.init({
    duration: 1000,
    once: true
});

const inputsTel = document.querySelectorAll('input[type=tel]');

inputsTel.forEach(tel => {
    tel.addEventListener('keypress', e => {
        const keyCode = (e.keyCode ? e.keyCode : e.value);
        if (!(keyCode > 47 && keyCode < 58)) {
            e.preventDefault();
        }
        maskTel(tel);
    });
});

function maskTel(tel) {
    if (tel.value.length == 1) {
        tel.value = '(' + tel.value;
    } else if (tel.value.length === 3) {
        tel.value += ') ';
    } else if (tel.value.length === 5) {
        tel.value += ' ';
    } else if (tel.value.length === 6) {
        tel.value += ' ';
    } else if (tel.value.length === 11) {
        tel.value += '-';
    }
}