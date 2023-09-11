function favoritar(id){
  $("#modal-logar").modal('show');  
    $.post(PATHSITE + "cliente/favoritar/", { produtoFK: id }, function (e) {   
        });  
}

function eventosData(dia) {
    $.get(PATHSITE + "produto/eventos/", { dia: dia }, function (e) {   
         dados = jQuery.parseJSON(e);
        $("#categoria-eventos").html(dados.html);
        });   
}