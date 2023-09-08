function favoritar(id){
  $("#modal-logar").modal('show');  
    $.post(PATHSITE + "cliente/favoritar/", { produtoFK: id }, function (e) {   
        });  
}