//jQuery Mask
$(document).ready(function () {

    $('.time').mask('00:00:00');
    $('.time2').mask('00:00');
    $('.date_time').mask('00/00/0000 00:00:00');
    $('.dateniver').mask('00/00');
    $('.cep').mask('00000-000');
    $('.phone').mask('(00) 0000-0000');
    $('.phone_with_ddd').mask('(00) 00000-0000');
    $('.phone_us').mask('(000) 000-0000');
    $('.mixed').mask('AAA 000-S0S');
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.money').mask('000.000.000.000.000,00', {reverse: true});
    $('.money2').mask("#.##0,00", {reverse: true});
    $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
        translation: {
            'Z': {
                pattern: /[0-9]/, optional: true
            }
        }
    });
    $('.ip_address').mask('099.099.099.099');
    $('.percent').mask('##0,00%', {reverse: true});
    $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
    $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
    $('.fallback').mask("00r00r0000", {
        translation: {
            'r': {
                pattern: /[\/]/,
                fallback: '/'
            },
            placeholder: "__/__/____"
        }
    });
    $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
});

// Tabs Menu
var valorFiltroBusca;
$('.openBoxFiltro').click(function () {
    valorFiltroBusca = $(this).data('busca');
    $(".boxFiltroDesativado").removeClass('boxFiltroAberto');
    $(valorFiltroBusca).addClass('boxFiltroAberto');
});

$(document).mouseup(function (e)
{
    var container = $(".boxFiltroAberto");
    var containerCta = $(".boxFiltroAberto div.cta6");
    // Caso clique fora do container 
    if (!container.is(e.target) && container.has(e.target).length === 0)
    {
        //container.hide();
        $(".boxFiltroDesativado").removeClass('boxFiltroAberto');
    } else if (containerCta.is(e.target))
    {
        $(".boxFiltroDesativado").removeClass('boxFiltroAberto');
        $(".conteudoSelecaoBox1").html("Bares");
    }
});

$('.resetForm').click(function () {
    $('#formBusca1').trigger("reset");
    $('#formBusca2').trigger("reset");
    $('#formBusca3').trigger("reset");
});

$(function () {
    $(".datepicker2").datepicker(
            {
                numberOfMonths: [1, 1],
                maxDate: 0,
                dateFormat: "dd/mm/yy",
                dayNamesShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
                dayNamesMin: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
                monthNames: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"]
            }
    );
});

function openNav() {
    document.getElementById("menuOpen").style.width = '100%';
}
function closeNav() {
    document.getElementById("menuOpen").style.width = '0%';
}

tinymce.init({
    selector: ".tinymce_full",
    images_upload_handler: function (blobInfo, success, failure) {
        var xhr, formData;
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', PATHSITE + 'utils/upload');
        xhr.onload = function () {
            var json;

            if (xhr.status != 200) {
                failure('HTTP Error: ' + xhr.status);
                alert('HTTP Error: ' + xhr.status);
                return;
            }
            json = JSON.parse(xhr.responseText);

            if (!json || typeof json.location != 'string') {
                failure('Invalid JSON: ' + xhr.responseText);
                alert('Invalid JSON: ' + xhr.responseText);
                return;
            }
            success(json.location);
        };
        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
        xhr.send(formData);
    },
    language: 'pt_BR',
    relative_urls: false,
    remove_script_host: false,
    convert_urls: true,
    height: "300",

    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});

var MD5 = function (d) {
    var r = M(V(Y(X(d), 8 * d.length)));
    return r.toLowerCase()
};
function M(d) {
    for (var _, m = "0123456789ABCDEF", f = "", r = 0; r < d.length; r++)
        _ = d.charCodeAt(r), f += m.charAt(_ >>> 4 & 15) + m.charAt(15 & _);
    return f
}
function X(d) {
    for (var _ = Array(d.length >> 2), m = 0; m < _.length; m++)
        _[m] = 0;
    for (m = 0; m < 8 * d.length; m += 8)
        _[m >> 5] |= (255 & d.charCodeAt(m / 8)) << m % 32;
    return _
}
function V(d) {
    for (var _ = "", m = 0; m < 32 * d.length; m += 8)
        _ += String.fromCharCode(d[m >> 5] >>> m % 32 & 255);
    return _
}
function Y(d, _) {
    d[_ >> 5] |= 128 << _ % 32, d[14 + (_ + 64 >>> 9 << 4)] = _;
    for (var m = 1732584193, f = -271733879, r = -1732584194, i = 271733878, n = 0; n < d.length; n += 16) {
        var h = m, t = f, g = r, e = i;
        f = md5_ii(f = md5_ii(f = md5_ii(f = md5_ii(f = md5_hh(f = md5_hh(f = md5_hh(f = md5_hh(f = md5_gg(f = md5_gg(f = md5_gg(f = md5_gg(f = md5_ff(f = md5_ff(f = md5_ff(f = md5_ff(f, r = md5_ff(r, i = md5_ff(i, m = md5_ff(m, f, r, i, d[n + 0], 7, -680876936), f, r, d[n + 1], 12, -389564586), m, f, d[n + 2], 17, 606105819), i, m, d[n + 3], 22, -1044525330), r = md5_ff(r, i = md5_ff(i, m = md5_ff(m, f, r, i, d[n + 4], 7, -176418897), f, r, d[n + 5], 12, 1200080426), m, f, d[n + 6], 17, -1473231341), i, m, d[n + 7], 22, -45705983), r = md5_ff(r, i = md5_ff(i, m = md5_ff(m, f, r, i, d[n + 8], 7, 1770035416), f, r, d[n + 9], 12, -1958414417), m, f, d[n + 10], 17, -42063), i, m, d[n + 11], 22, -1990404162), r = md5_ff(r, i = md5_ff(i, m = md5_ff(m, f, r, i, d[n + 12], 7, 1804603682), f, r, d[n + 13], 12, -40341101), m, f, d[n + 14], 17, -1502002290), i, m, d[n + 15], 22, 1236535329), r = md5_gg(r, i = md5_gg(i, m = md5_gg(m, f, r, i, d[n + 1], 5, -165796510), f, r, d[n + 6], 9, -1069501632), m, f, d[n + 11], 14, 643717713), i, m, d[n + 0], 20, -373897302), r = md5_gg(r, i = md5_gg(i, m = md5_gg(m, f, r, i, d[n + 5], 5, -701558691), f, r, d[n + 10], 9, 38016083), m, f, d[n + 15], 14, -660478335), i, m, d[n + 4], 20, -405537848), r = md5_gg(r, i = md5_gg(i, m = md5_gg(m, f, r, i, d[n + 9], 5, 568446438), f, r, d[n + 14], 9, -1019803690), m, f, d[n + 3], 14, -187363961), i, m, d[n + 8], 20, 1163531501), r = md5_gg(r, i = md5_gg(i, m = md5_gg(m, f, r, i, d[n + 13], 5, -1444681467), f, r, d[n + 2], 9, -51403784), m, f, d[n + 7], 14, 1735328473), i, m, d[n + 12], 20, -1926607734), r = md5_hh(r, i = md5_hh(i, m = md5_hh(m, f, r, i, d[n + 5], 4, -378558), f, r, d[n + 8], 11, -2022574463), m, f, d[n + 11], 16, 1839030562), i, m, d[n + 14], 23, -35309556), r = md5_hh(r, i = md5_hh(i, m = md5_hh(m, f, r, i, d[n + 1], 4, -1530992060), f, r, d[n + 4], 11, 1272893353), m, f, d[n + 7], 16, -155497632), i, m, d[n + 10], 23, -1094730640), r = md5_hh(r, i = md5_hh(i, m = md5_hh(m, f, r, i, d[n + 13], 4, 681279174), f, r, d[n + 0], 11, -358537222), m, f, d[n + 3], 16, -722521979), i, m, d[n + 6], 23, 76029189), r = md5_hh(r, i = md5_hh(i, m = md5_hh(m, f, r, i, d[n + 9], 4, -640364487), f, r, d[n + 12], 11, -421815835), m, f, d[n + 15], 16, 530742520), i, m, d[n + 2], 23, -995338651), r = md5_ii(r, i = md5_ii(i, m = md5_ii(m, f, r, i, d[n + 0], 6, -198630844), f, r, d[n + 7], 10, 1126891415), m, f, d[n + 14], 15, -1416354905), i, m, d[n + 5], 21, -57434055), r = md5_ii(r, i = md5_ii(i, m = md5_ii(m, f, r, i, d[n + 12], 6, 1700485571), f, r, d[n + 3], 10, -1894986606), m, f, d[n + 10], 15, -1051523), i, m, d[n + 1], 21, -2054922799), r = md5_ii(r, i = md5_ii(i, m = md5_ii(m, f, r, i, d[n + 8], 6, 1873313359), f, r, d[n + 15], 10, -30611744), m, f, d[n + 6], 15, -1560198380), i, m, d[n + 13], 21, 1309151649), r = md5_ii(r, i = md5_ii(i, m = md5_ii(m, f, r, i, d[n + 4], 6, -145523070), f, r, d[n + 11], 10, -1120210379), m, f, d[n + 2], 15, 718787259), i, m, d[n + 9], 21, -343485551), m = safe_add(m, h), f = safe_add(f, t), r = safe_add(r, g), i = safe_add(i, e)
    }
    return Array(m, f, r, i)
}
function md5_cmn(d, _, m, f, r, i) {
    return safe_add(bit_rol(safe_add(safe_add(_, d), safe_add(f, i)), r), m)
}
function md5_ff(d, _, m, f, r, i, n) {
    return md5_cmn(_ & m | ~_ & f, d, _, r, i, n)
}
function md5_gg(d, _, m, f, r, i, n) {
    return md5_cmn(_ & f | m & ~f, d, _, r, i, n)
}
function md5_hh(d, _, m, f, r, i, n) {
    return md5_cmn(_ ^ m ^ f, d, _, r, i, n)
}
function md5_ii(d, _, m, f, r, i, n) {
    return md5_cmn(m ^ (_ | ~f), d, _, r, i, n)
}
function safe_add(d, _) {
    var m = (65535 & d) + (65535 & _);
    return(d >> 16) + (_ >> 16) + (m >> 16) << 16 | 65535 & m
}
function bit_rol(d, _) {
    return d << _ | d >>> 32 - _
}

function addItem(id, titulo) {
    $("#campoItens").tagit("createTag", titulo);
    //var label = titulo;
    // label = label.replace(/ /gi, "");
    $("#item-" + MD5(unescape(encodeURIComponent(titulo)))).hide();
    $(this).hide();
}

$(document).ready(function () {
    $(".mySingleFieldTags").tagit({
        allowSpaces: true
    });
});

function excluirFotos(id, id2) {

    swal({
        title: 'Confirmação de exclusão',
        text: "Tem certeza que quer excluir o item?",
        icon: 'warning',
        buttons: true,
        dangerMode: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim!',
        cancelButtonText: 'Não!'
    }).then((confirmDel) => {
        console.log(confirmDel);
        if (confirmDel) {
            $.post(PATHSITE + 'produto/excluirFoto/', {id: id}, function (retorno) {
                dados = jQuery.parseJSON(retorno);
                if (dados.excluiu) {
                    $("#tr-" + id2).hide();
                }
                //    location.reload();
            });
        }
    });
    return false;
}

function fotoDestaque(id) {
    $.post(PATHSITE + 'produto/fotoDestaque/', {id: id}, function (retorno) {
        dados = jQuery.parseJSON(retorno);
        //    location.reload();
    });
}

function novoVideo() {
    $.get(PATHSITE + 'produto/novoVideo/', {}, function (retorno) {
        dados = jQuery.parseJSON(retorno);
        $("#accordion").append(dados.html);
    });
}

function novoCardapio() {
    $.get(PATHSITE + 'produto/novoCardapio/', {contador:contador}, function (retorno) {
        dados = jQuery.parseJSON(retorno);
        contador++;
        $("#accordion").append(dados.html);
    });
}

function novaComodidade() {
    $.get(PATHSITE + 'produto/novaComodidade/', {}, function (retorno) {
        dados = jQuery.parseJSON(retorno);
        $("#accordion").append(dados.html);
    });
}

function novoPontoDeVenda(tipo) {
    $.get(PATHSITE + 'produto/novoPontoDeVenda/', {tipo: tipo}, function (retorno) {
        dados = jQuery.parseJSON(retorno);
        $("#accordion").append(dados.html);
    });
}

function novaOrganizacao() {
      $.get(PATHSITE + 'produto/novaOrganizacao/', {}, function (retorno) {
        dados = jQuery.parseJSON(retorno);
        $("#accordion").append(dados.html);
    }); 
}

function novoPreco() {
    $.get(PATHSITE + 'produto/novoPreco/', {}, function (retorno) {
        dados = jQuery.parseJSON(retorno);
        $("#accordion").append(dados.html);
    });
}

function excluirAba(index, tipo, model) {

    if (tipo == 'false') {
        $('#card' + index).remove();
    } else {


        swal({
            title: 'Confirmação de exclusão',
            text: "Tem certeza que quer excluir o item?",
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim!',
            cancelButtonText: 'Não!'
        }).then((result) => {
            if (result) {
                $.post(PATHSITE + 'produto/excluirAba/', {id: index, model: model}, function (retorno) {
                    location.reload();
                });
            }
        });
        return false;
    }
}

function excluirVideo(index, tipo, model) {

    if (tipo == 'false') {
        $('#card' + index).remove();
    } else {
        swal({
            title: 'Confirmação de exclusão',
            text: "Tem certeza que quer excluir o vídeo?",
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim!',
            cancelButtonText: 'Não!'
        }).then((result) => {
            if (result) {
                $.post(PATHSITE + 'produto/excluirVideo/', {id: index, model: model}, function (retorno) {

                    location.reload();
                });
            }
        });




    }
}

function excluir(id) {

    Swal.fire({
        title: 'Tem certeza que deseja excluir?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim!',
        cancelButtonText: 'Não!'
    }).then((result) => {
        if (result.value) {
            $.post(PATHSITE + 'produto/excluirFoto/', {id: id}, function (retorno) {
                location.reload();
            });
        }
    });

    return false;
}

function primeiroAnuncio() {
    var titulo = $("#titulo").val();
    var tipoFK = $("#tipoFK").val();

    if (titulo && tipoFK) {
        $.post(PATHSITE + 'produto/primeiroAnuncio/', {titulo, tipoFK}, function (retorno) {
            dados = jQuery.parseJSON(retorno);
            if (dados.sucesso) {
                location.reload();
            } else if (dados.erro) {
                swal.fire("Ops,", dados.erro, "error");
            }
        });
    } else {
        swal.fire("Ops,", "Selecione o nome e o tipo do anúncio", "error");
    }

}

function visitas(id) {
    var dtIni = $("#visitaAntes").val();
    var dtFim = $("#visitaDepois").val();
    $.post(PATHSITE + "produto/visitas/", {id: id, dtIni: dtIni, dtFim: dtFim}, function (retorno) {
        dados = jQuery.parseJSON(retorno);
        
        $('#retornoVisitas').html(dados.visita);
    });
}

function viuWhats(id) {
    var dtIni = $("#whatsAntes").val();
    var dtFim = $("#whatsDepois").val();
    $.post(PATHSITE + "produto/whats/", {id: id, dtIni: dtIni, dtFim: dtFim}, function (retorno) {
        dados = jQuery.parseJSON(retorno);
        $('#retornoWhats').html(dados.whats);
    });
}

function viuFone(id) {
    var dtIni = $("#foneAntes").val();
    var dtFim = $("#foneDepois").val();
    $.post(PATHSITE + "produto/fone/", {id: id, dtIni: dtIni, dtFim: dtFim}, function (retorno) {
        dados = jQuery.parseJSON(retorno);
        $('#retornoFone').html(dados.fone);
    });
}

function atualizaTipo(id, titulo) {
    $(".tipoGeral").hide();
    $(".tipo-" + id).show();
    $(".boxFiltroAberto").removeClass('boxFiltroAberto');
    $("#nomeTipo").html(titulo);
}

