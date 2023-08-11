<?
 $infoPagina['nomeDaPagina'] = "Fotos";
          $infoPagina['iconePagina'] = 'icone_fotos.png';
?>
<section class="wrap">
        <? echo View("templates/barra-topo",$infoPagina); ?>

        <div class="conteudo">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 ">
                        <div class="row">
                    <div class="col-12 col-md-12">
                       <?=$textoExplicativo->texto?>
                    </div>
                </div>
             
                    </div>
                
                </div>
                <hr class="linhaform">
              
               <form class="form-horizontal" method="post" enctype='multipart/form-data'  id="formBusca">
                    <fieldset>
                       <div class="row">
                            <div class="col-12">
                              <label class='mb-3'><h2>Adicionar Fotos </h2></label> <br/>
                                <input class='form-control' multiple type="file" name='arquivo[]' value="upload" /><br/>
                               <input class="btn btn-primary mt-3" type="submit" name="salvar" value="Salvar" />
                            </div>
                      </div>
                 </fieldset>
              </form>
              
                <hr class="linhaform">
              
                <form class="form-horizontal" method="post" enctype="multipart/form-data" id="formBusca1">
                    <fieldset>
                        <div class="row">
                  <div class="col-12"> 
                        <div class="panel-options">
                        <a style="text-decoration: none !important; float: left; margin-top:0; margin-right: 15px;" href="#">
                        <input style="width:20px; margin-top: 0; margin-bottom:2rem; height: 20px; float: left; margin-right: 5px;" type="checkbox" id="check-excluir" />
                         <label style="float: left; " for="check-excluir">Modo Exclusão </label>
                        </a>
                        </div>
                     </div>
                    <div class="col-12">
                    <form method="post">
                    <div id="sortable" class='row'>
                        <?  if ($fotos) {
                              foreach ($fotos as $elemento) {
                                  ?>
                                  <div style="padding: 0; cursor: pointer; border: solid 1px #000;" class="ui-state-default base sort col-4 col-md-4 col-lg-3" rel="<?= $elemento->id ?>">
                                   <div class='fundoFoto' style="background-size: cover; background-position: center center; background-image:url(<?= PATHSITE ?>uploads/produto/<?=$elemento->produtoFK?>/<?= $elemento->arquivo ?>);  background-repeat: no-repeat"></div>
                                   <div class="hover">
                                   <input class="excluir" type="checkbox" name="excluir[]" value="<?= $elemento->id ?>" />
                                   <div class="icones">       
                                   <div style="color: #FFF; margin-bottom: 15px;">
                                   <?=$elemento->nome?>
                                   </div>                                            
                                    <div style="margin-top: 5px;">
                                     <a onclick="excluirFotos('<?=encode($elemento->id)?>');" >
                                    <i class="glyphicon glyphicon-trash"></i> Excluir
                                    </a>
                                    </div>
                                   </div>
                                   </div>
                                  </div>
                                  <?
                              }
                        }?>
                    </div>
                    
                        <div style="float: left; margin-top: 4rem; width: 100%;" class="row ">
                        <div class="col-12">
                        <input class="btn btn-primary" type="submit" name="apagar" value="Excluir" />
                        </div>
                        </div>
                        </form>
                    </div>
         
 
                      </div>
                    </fieldset>
                </form>                
            </div>
        </div>
    </section>

<style>
.base{
    position: relative;
}

.exclusao .hover{
        border: solid 20px #FFF;
        display: block !important;
}

.excluir{
    display: none;
       position: absolute;
    left: -17px;
    top: -19px;
    height: 15px;
    width: 15px;
}

.exclusao .hover .excluir{
 display: block;
}

.base .hover{
    display: none;
     width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    position: absolute;
    left: 0;
    top: 0;
}
.base:hover .hover{
    display: block;
}
.icones{
    left: 50%;
    top: 50%;
    position: absolute;
    transform: translate(-50%);
}
.icones a{
    color: #FFF !important;
}

.botao{
    float: left;
    padding: 15px 25px;
    border-radius: 6px;
    margin-right: 10px;
    background-color: #FFF;
    color: #000;
    border: solid 1px #428bca;
       text-decoration: none !important;
}

.botao.ativo,.botao:hover{
    color: #FFF;
      background-color: #428bca;
}
</style>