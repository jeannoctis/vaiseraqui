<?
 $infoPagina['nomeDaPagina'] = "Dados do imóvel";
          $infoPagina['iconePagina'] = 'icone_dados.svg';
?>
<section class="wrap">
   <? echo View("templates/barra-topo",$infoPagina); ?>
        

        <div class="conteudo">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-12">
                       <?=$textoExplicativo->texto?>
                    </div>
                </div>
                   <hr class="linhaform">
                <form class="form-horizontal" method="post"  enctype="multipart/form-data"  id="formBusca">
                    <fieldset>
                        <div class="row">
                            <div class="col-12">
                                <label>Nome</label>
                                <input type="text" <?=($anuncio->titulo) ? "disabled" : "" ?> name="titulo" class="form-control" Value="<?=$anuncio->titulo?>">
                            </div>
                           <div class="col-12">
                                <label>Título da Apresentação</label>
                                <input type="text" name="apresentacao" class="form-control" Value="<?=$anuncio->apresentacao?>">
                            </div>
                            <div class="col-12">
                                <label>Endereço</label>
                                <input <?=($anuncio->endereco) ? "disabled" : "" ?> type="text" name="endereco" class="form-control" Value="<?=$anuncio->endereco?>">
                            </div>      
                          <div class="col-12">
                                <label>Pet-friendly?</label>
                                <select type="text" name="petfriendly" class="form-control" Value="<?=$anuncio->endereco?>">
                                  <option <?= ($anuncio->petfriendly === "S") ? "selected" : "" ?> value="S">Sim</option>
                                  <option <?= ($anuncio->petfriendly === "N") ? "selected" : "" ?> value="N">Não</option>
                            </select>
                          </div>
                            
                            <div class="col-12">
                                <label>Calendário ativo?</label>
                                <select id='calendario' onchange='mudaCalendario()' type="text" name="calendario" class="form-control" >
                                  <option <?= ($anuncio->calendario === "S") ? "selected" : "" ?> value="S">Sim</option>
                                  <option <?= ($anuncio->calendario === "N") ? "selected" : "" ?> value="N">Não</option>
                            </select>
                          </div>
                            
                             <div id='bannerArquivo' class="col-12">
                              <label class='mb-3'><h2>Banner: Tamanho Recomendado(470x370)</h2></label> <br/>
                                <input class='form-control'  type="file" name='arquivo' value="upload" /><br/>                               
                          
                            <? if($anuncio->arquivo){?>
                            <label for="" class=" control-label">Foto atual</label>
                  <div style="background-size:contain; width: 100%; background-position: center center; background-image:url(<?= PATHSITE ?>uploads/produto/<?=$anuncio->id?>/<?= $anuncio->arquivo ?>); height: 120px; background-repeat: no-repeat"></div> 
                            <? } ?>
                    </div>
                            <? if($categorias){?>
                              <div class="col-12">
                                <label>Categoria</label>
                                <select <?=($anuncio->categoriaFK) ? "disabled" : "" ?> required type="text" name="categoriaFK" class="form-control" Value="">
                                  <option value=''>Selecione...</option>
                                  <? foreach($categorias as $cat){?>
                                  <option <?= ($anuncio->categoriaFK == $cat->id) ? "selected" : "" ?> value="<?=$cat->id?>"><?=$cat->titulo?></option>
                                  <? } ?>
                                
                            </select>
                                  </div> 
                                <? } ?>
                            
                             <? if($capacidades){?>
                              <div class="col-12">
                                <label>Capacidade (Espaço) </label>
                                <select required type="text" name="capacidadeFK" class="form-control" Value="">
                                   <option value=''>Selecione...</option>
                                  <? foreach($capacidades as $cat){?>
                                  <option <?= ($anuncio->capacidadeFK == $cat->id) ? "selected" : "" ?> value="<?=$cat->id?>">Até <?=$cat->quantidade?> pessoas</option>
                                  <? } ?>
                                
                            </select>
                                  </div> 
                                <? } ?>
                          
                            <div class="col-12">
                                <label>Capacidade (Hospedes) </label>
                                <select required type="text" name="hospedes" class="form-control" Value="">
                                   <option value=''>Selecione...</option>
                                   <option <?= ($anuncio->hospedes == 0) ? "selected" : "" ?> value='0'>Não se aplica</option>
                                  <? for($i = 1; $i <= 30; $i++){?>
                                  <option <?= ($anuncio->hospedes == $i) ? "selected" : "" ?> value="<?=$i?>">Até <?=$i?> pessoas</option>
                                  <? } ?>
                                
                            </select>
                                  </div> 
                            
                             <? if($cidades){?>
                              <div class="col-12">
                                <label>Cidade</label>
                                <select <?=($anuncio->cidadeFK) ? "disabled" : "" ?> required type="text" name="cidadeFK" class="form-control" Value="">
                                    <option value=''>Selecione...</option>
                                  <? foreach($cidades as $cat){?>
                                  <option <?= ($anuncio->cidadeFK == $cat->id) ? "selected" : "" ?> value="<?=$cat->id?>"><?=$cat->titulo?>/<?=$cat->sigla?></option>
                                  <? } ?>
                                
                            </select>
                                  </div> 
                                <? } ?>
                            
                            <div class="col-12">
                                <label>Acomodação</label>
                                <textarea name="acomodacao" class="form-control"><?=$anuncio->acomodacao?></textarea>
                            </div>                            
                            <div class="col-12">
                                <label>Permitido</label>
                                <textarea name="permitido" class="form-control"><?=$anuncio->permitido?></textarea>
                            </div>
                            <div class="col-12">
                                <label>Proibido</label>
                                <textarea name="proibido" class="form-control"><?=$anuncio->proibido?></textarea>
                            </div>                            
                            <div class="col-12">
                                <label>Iframe do mapa</label>
                                <textarea name="mapa" class="form-control"><?=$anuncio->mapa?></textarea>
                            </div>
                          
                            <div class="col-12">
                                <label>Coordenadas </label>
                                <input type="text" name="coordenadas" class="form-control " Value="<?= ($anuncio->latitude && $anuncio->longitude) ? $anuncio->latitude . "," . $anuncio->longitude : "" ?>">
                            </div>
                          
                           <div class="col-12">
                                <label>Descrição sobre o imóvel</label>
                               <textarea name="texto" id="inputTexto" class="form-control tinymce_full"><?= $anuncio->texto ?></textarea>
                            </div>
                           <div class="col-12">
                                <label>Description (SEO)</label>
                                <textarea name="description" class="form-control"><?=$anuncio->description?></textarea>
                            </div>
                          
                             <div class="col-12 col-md-6 col-lg-4">
                                <label>Taxa de limpeza (R$)</label>
                                <input type="text" name="limpeza" class="form-control money2" Value="<?=$anuncio->limpeza?>">
                            </div>
                           
                            
                          <div class="col-12 mb-5 mt-5">
                                <label><h2>Baixa temporada</h2></label>                               
                            </div>
                           
                            <div class="col-12 col-md-6 col-lg-4">
                                <label>Diária baixa temporada Segunda - Quinta (R$)</label>
                                <input type="text" name="menorValor" class="form-control money2" Value="<?=$anuncio->menorValor?>">
                            </div>
                           <div class="col-12 col-md-6 col-lg-4">
                                <label>Diária baixa temporada Sexta - Domingo (R$)</label>
                                <input type="text" name="maiorValor" class="form-control money2" Value="<?=$anuncio->maiorValor?>">
                            </div>
                          <div class="col-12 col-md-6 col-lg-4">
                                <label>Hospedagem baixa temporada (R$)</label>
                                <input type="text" name="hospedagemBaixa" class="form-control money2" Value="<?=$anuncio->hospedagemBaixa?>">
                            </div>
                             
                           <div class="col-12 mb-5 mt-5">
                                <label><h2>Alta temporada</h2></label>                               
                            </div>
                         
                          <div class="col-12 col-md-6">
                                <label>Data Início da alta temporada </label>
                                <input type="text" name="inicioAlta" class="form-control placeholder" Value="<?=formataData($anuncio->inicioAlta)?>">
                            </div>
                          
                          <div class="col-12 col-md-6">
                                <label>Data Final da alta temporada</label>
                                <input type="text" name="fimAlta" class="form-control placeholder" Value="<?=formataData($anuncio->fimAlta)?>">
                            </div>
                           
                            <div class="col-12 col-md-6 ">
                                <label>Diária alta temporada Segunda - Quinta (R$)</label>
                                <input type="text" name="menorAlta" class="form-control money2" Value="<?=$anuncio->menorAlta?>">
                            </div>
                           <div class="col-12 col-md-6 ">
                                <label>Diária alta temporada Sexta - Domingo (R$)</label>
                                <input type="text" name="maiorAlta" class="form-control money2" Value="<?=$anuncio->maiorAlta?>">
                            </div>
                          <div class="col-12 col-md-6 ">
                                <label>Hospedagem alta temporada (R$)</label>
                                <input type="text" name="hospedagemAlta" class="form-control money2" Value="<?=$anuncio->hospedagemAlta?>">
                            </div>
                           
                          
                            <div class="col-12 ">
                                <button type="submit" class="form-control formsubmit" name="">
                                    Atualizar dados
                                </button>
                            </div>

                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

    </section>


<script>
    function mudaCalendario(){
        var calendario = $("#calendario").val();
        
        if(calendario == 'S'){        
             $("#bannerArquivo").hide();
        } else {          
            $("#bannerArquivo").show();
        }
        
    }
</script>