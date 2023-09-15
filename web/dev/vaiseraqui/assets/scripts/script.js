

function eventosData(dia) {
    $.get(PATHSITE + "produto/eventos/", {dia: dia}, function (e) {
        dados = jQuery.parseJSON(e);
        $("#categoria-eventos").html(dados.html);
    });
}

function callRecaptcha() {
    grecaptcha.ready(function () {
        grecaptcha.execute(public_recaptcha, {action: ""}).then(function (e) {
            $(".g-recaptcha-response").val(e);
        });
    });
    $(".formsubmit").show();
}

var options = {
    type: "delay",
    time: "4000",
    scripts: ["https://www.google.com/recaptcha/api.js?render=" + public_recaptcha],
    success: function () {

        visitaPagina(PAGINA_VISITADA);

        callRecaptcha();
        setInterval(function () {
            callRecaptcha();
        }, 1e5);
        //    carregaVideo();    
    }
};

function aceitaCookie() {
    setCookie('aceitou', '1', 30);
    $("#aviso-cookies").addClass("hideCookie")
    setTimeout(() => {
        $("#aviso-cookies").hide()
    }, 400)
}

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

// function listaWhatsapp() {
//     $(".shown").length <= 0 ? ($(".whatsapp2").addClass("shown"), $(".ul-whatsapp").addClass("shown")) : ($(".whatsapp2").removeClass("shown"), $(".ul-whatsapp").removeClass("shown"));
// }

function toggleFormWpp () {
    const formWpp = document.querySelector(".form-wpp")
    formWpp.classList.toggle("active")
}
const sendWhatsApp = document.querySelector(".form-wpp button")
sendWhatsApp.addEventListener("click", startWpp)

function startWpp () {
    console.log(this)

    const formWpp = document.querySelector(".form-wpp form")

    $.post(PATHSITE + "utils/startWpp/", formWpp.serialize(), function (data) {
        const response = jQuery.parseJSON(data);
        console.log(response)
    })
}

function visitaPagina(pagina) {
    $.post(PATHSITE + "utils/visitaPagina/", {pagina: pagina}, function (e) {
    });
}

function contadorWhatsapp(whatsappFK) {
    $.post(PATHSITE + "utils/contadorWhatsapp/", {whatsappFK: whatsappFK}, function (e) { });
}

function abreWhatsapp(id) {
    $.post(PATHSITE + "produto/chamarWhats/", {produtoFK: id}, function (e) {
    });
}

function agendar(tipo, link, whats, tela) {
    var url = whats + '&text=';
    switch (tipo) {
        case 'salao-de-festa':
            var pessoas = $('#campoHospede').val();
            if (tela === 'desktop') {
                var checkin = $("#desktop-table-checkin").val();
                var checkout = $("#desktop-table-checkout").val();
            } else {
                var checkin = $("#mobile-table-checkin").val();
                var checkout = $("#mobile-table-checkout").val();
            }

            url += 'Olá, vim pelo link ' + link + ' e quero agendar o espaço para ' + pessoas + ' pessoas. Sendo o check-in, no dia ' + checkin + ' e checkout no dia' + checkout;
            break;
        case 'hospedagem':
            var pessoas = $('#campoHospede').val();
            if (tela === 'desktop') {
                var checkin = $("#desktop-table-checkin").val();
                var checkout = $("#desktop-table-checkout").val();
            } else {
                var checkin = $("#mobile-table-checkin").val();
                var checkout = $("#mobile-table-checkout").val();
            }

            url += 'Olá, vim pelo link ' + link + ' e quero agendar o espaço para ' + pessoas + ' pessoas. Sendo o check-in, no dia ' + checkin + ' e checkout no dia' + checkout;
            break;
    }

    window.location.assign(url);

}

function calcularTotal(tipo, tela) {
    switch (tipo) {
        case 'salao-de-festa':
            var checkin = '';
            var checkout = '';
            if (tela === 'desktop') {
                checkin = $("#desktop-table-checkin").val();
                checkout = $("#desktop-table-checkout").val();
            } else {
                checkin = $("#mobile-table-checkin").val();
                checkout = $("#mobile-table-checkout").val();
            }

            const date1 = new Date(FormataStringData(checkin));
            const date2 = new Date(FormataStringData(checkout));
            const diffTime = Math.abs(date2 - date1);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;

            $("#quantidadeDias1").html(diffDays);
            $("#quantidadeDias2").html(diffDays);

            var diaria = parseFloat($("#diaria").val());
            
            var totalSemDiaria = parseFloat($("#totalDiaria").val());
          
            totalSemDiaria = totalSemDiaria + diaria * diffDays;
            totalSemDiaria = totalSemDiaria.toFixed(2);
          
          totalSemDiaria = '' + totalSemDiaria;
            
              diaria = diaria * diffDays;
                diaria = diaria.toFixed(2);
              
            
            $("#totalDiarias1").html("R$" + diaria.replace('.',','));
            $("#totalDiarias2").html("R$" + diaria.replace('.',','));            
       
            
            $("#spanTotal1").html("R$" + totalSemDiaria.replace('.',',') );
            $("#spanTotal2").html("R$" + totalSemDiaria.replace('.',',')  );

            break;
    }
}

function FormataStringData(data) {
    var dia = data.split("/")[0];
    var mes = data.split("/")[1];
    var ano = data.split("/")[2];

    return ano + '-' + ("0" + mes).slice(-2) + '-' + ("0" + dia).slice(-2);
    // Utilizo o .slice(-2) para garantir o formato com 2 digitos.
}

function clicaMapa(mapa) {
    Fancybox.show([{
            src: mapa,
            width: 800,
            height: 600,
        }, ]);
}