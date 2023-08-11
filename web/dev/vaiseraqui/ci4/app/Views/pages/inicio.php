<?
 $infoPagina['nomeDaPagina'] = "Informações do anúncio";
          $infoPagina['iconePagina'] = 'icone_informacao.svg';

if($anuncio->tipoFK == 4){
  $infoPagina['difValidade'] = $anuncio->difInicio;
  $infoPagina['difDestaque'] = $anuncio->difDestaque;
  $infoPagina['inicioValidade'] = $anuncio->inicioValidade;
} else {
   $infoPagina['difValidade'] = $anuncio->difValidade;
  $infoPagina['difDestaque'] = $anuncio->difDestaque;
    $infoPagina['inicioValidade'] = $anuncio->validade;
}

if($difValidade >= 0 && $anuncio->ativo == '1' ) { 
$infoPagina['statusAnuncio'] = "ATIVO";
} else {
 $infoPagina['statusAnuncio'] = "INATIVO"; 
}

?>
    <section class="wrap">
           <? echo View("templates/barra-topo",$infoPagina); ?>

        <div class="conteudo">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h2>
                            Olá, <?=$anunciante->titulo?>!
                        </h2>
                        <h6>
                            Seja bem-vindo a plataforma de anunciante do Vai ser Aqui!
                        </h6>
                    </div>
                </div>

              <? if($_SESSION['anuncio']) {?>
              
                <div class="linhaConteudo">
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                Meu anúncio
                            </h4>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="boxDestaque">
                                <h6>
                                    validade do anúncio
                                </h6>
                                <h3>
                                  <?=formataData($infoPagina['inicioValidade'] )?>
                                </h3>
                                <hr>
                                <p>
                                      <? if($infoPagina['difValidade'] < 0 ){?>
                                    <span class="textoVermelho">o seu anúncio expirou há <?= ($infoPagina['difValidade'] * - 1) ?> dias </span>
                                  <? } else { ?>
                                  <span class=""><b>o seu anúncio expira em <?=$infoPagina['difValidade'] ?> dias </b></span>
<? } ?> 
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="boxDestaque">
                                <h6>
                                    visualizações do anúncio
                                </h6>
                                <h3 id='retornoVisitas'>
                                    0
                                </h3>
                                <hr>
                                <p>
                                    Acessos entre os dias <br>
                               
                                    <span id='periodoVisita1' class="textoAzul"><?=formataData($hoje30)?></span> e <span id='periodoVisita2' class="textoAzul"><?=formataData($hoje)?></span>
                                </p>
                                <button onclick="$('#caixinha-clique1').show();" type='button' class="botao1">
                                    Selecionar período
                                </button>
                              <div id='caixinha-clique1' style='display: none;' class='selecionePeriodo'>
                                <div class="row">
                                  <div class="col-12">
                                    <h3>Por favor, selecione um período</h3>
                                  </div>
                                    <div class="col-12 col-md-6">
                                      <label for='visitaAntes'>Data Inicial</label>
                                       <input type='text' id='visitaAntes' class='form-control datepicker2 fallback' value="<?=formataData($hoje30)?>" />                                 
                                  </div>
                                   <div class="col-12 col-md-6">
                                       <label for='visitaDepois'>Data Final</label>
                                          <input type='text' id='visitaDepois' class='form-control datepicker2 fallback' value="<?=formataData($hoje)?>" />                           
                                  </div>
                                   <div class='col-12'>
                                  <button onclick="$('#caixinha-clique1').show(); $('#caixinha-clique1').hide(); visitas(<?=$anuncio->id ?>); $('#periodoVisita1').html( $('#visitaAntes').val() ); $('#periodoVisita2').html( $('#visitaDepois').val() );  " type='button'  class="botao1 ">
                                   Aplicar datas
                                </button>
                                  </div>
                                
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="boxDestaque">
                                <h6>
                                    clicks no Whatsapp
                                </h6>
                                <h3 id='retornoWhats'>
                                    0
                                </h3>
                                <hr>
                                <p>
                                    Acessos entre os dias <br>
                                    <span id='periodoWhats1' class="textoAzul"><?=formataData($hoje30)?></span> e <span id='periodoWhats2' class="textoAzul"><?=formataData($hoje)?></span>
                                </p>
                                <button onclick="$('#caixinha-clique2').show();" type='button' class="botao1">
                                    Selecionar período
                                </button>
                              <div id='caixinha-clique2' style='display: none;' class='selecionePeriodo'>
                                <div class="row">
                                  <div class="col-12">
                                    <h3>Por favor, selecione um período</h3>
                                  </div>
                                    <div class="col-12 col-md-6">
                                      <label for='whatsAntes'>Data Inicial</label>
                                       <input type='text' id='whatsAntes' class='form-control datepicker2 fallback' value="<?=formataData($hoje30)?>" />                                 
                                  </div>
                                   <div class="col-12 col-md-6">
                                       <label for='whatsDepois'>Data Final</label>
                                          <input type='text' id='whatsDepois' class='form-control datepicker2 fallback' value="<?=formataData($hoje)?>" />                           
                                  </div>
                                   <div class='col-12'>
                                  <button onclick="$('#caixinha-clique2').show(); $('#caixinha-clique2').hide(); viuWhats(<?=$anuncio->id ?>); $('#periodoWhats1').html( $('#whatsAntes').val() ); $('#periodoWhats2').html( $('#whatsDepois').val() );  " type='button'  class="botao1 ">
                                   Aplicar datas
                                </button>
                                  </div>
                                
                                </div>
                              </div>
                            </div>
                        </div>
                      <div class="col-12 col-md-4">
                            <div class="boxDestaque">
                                <h6>
                                    clicks no Telefone
                                </h6>
                                <h3 id='retornoFone'>
                                    0
                                </h3>
                                <hr>
                                <p>
                                    Acessos entre os dias <br>
                                    <span id='periodoFone1' class="textoAzul"><?=formataData($hoje30)?></span> e <span id='periodoFone2' class="textoAzul"><?=formataData($hoje)?></span>
                                </p>
                                <button onclick="$('#caixinha-clique3').show();" type='button' class="botao1">
                                    Selecionar período
                                </button>
                              <div id='caixinha-clique3' style='display: none;' class='selecionePeriodo'>
                                <div class="row">
                                  <div class="col-12">
                                    <h3>Por favor, selecione um período</h3>
                                  </div>
                                    <div class="col-12 col-md-6">
                                      <label for='foneAntes'>Data Inicial</label>
                                       <input type='text' id='foneAntes' class='form-control datepicker2 fallback' value="<?=formataData($hoje30)?>" />                                 
                                  </div>
                                   <div class="col-12 col-md-6">
                                       <label for='foneDepois'>Data Final</label>
                                          <input type='text' id='foneDepois' class='form-control datepicker2 fallback' value="<?=formataData($hoje)?>" />                           
                                  </div>
                                   <div class='col-12'>
                                  <button onclick="$('#caixinha-clique3').show(); $('#caixinha-clique3').hide(); viuFone(<?=$anuncio->id ?>); $('#periodoFone1').html( $('#foneAntes').val() ); $('#periodoFone2').html( $('#foneDepois').val() );  " type='button'  class="botao1 ">
                                   Aplicar datas
                                </button>
                                  </div>
                                
                                </div>
                              </div>
                            </div>
                        </div>
                      <div class="col-12 col-md-4">
                            <div class="boxDestaque">
                                <h6>
                                    validade do destaque
                                </h6>
                                <h3>
                                    <?=formataData($anuncio->validadeDestaque)?>
                                </h3>
                                <hr>
                                <p>
                                       <? if($infoPagina['difDestaque'] < 0 ){?>
                                    <span class="textoVermelho">o seu destaque expirou há <?= ($infoPagina['difDestaque'] * - 1) ?> dias </span>
                                  <? } else { ?>
                                  <span class=""><b>o seu destaque expira em <?=$infoPagina['difDestaque'] ?> dias </b></span>
<? } ?> 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
              <? } else { ?>
  <div id="avisoSair" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
  
        <div class="modal-content">
            <div class="modal-body modalForm">
                <!--button type="button" class="close" data-dismiss="modal">&times;</button-->

                <div class="iconeModal text-center">
                    <img src="<?=PATHSITE?>images/soufesta.svg">
                </div>

                <h2 class='mt-3 mb-3'>
                   Olá <?=$anunciante->titulo?>,
                </h2>
                <h4 class='mt-3 mb-3'>
                   seja bem vindo a área do anunciante do Vai Ser Aqui. Para iniciar, selecione o tipo de anuncio que você irá cadastrar e o nome do seu anúncio:
                </h4>
              
                 <input placeholder='Qual o nome do seu anúncio?' id='titulo' class='form-control' type='text' name='titulo' value='' />
              
                <select id='tipoFK' name='tipopFK' class='form-control'>
                  <option value=''>Selecione</option>
                   <option value='1'>Espaço</option>  
                    <option value='2'>Serviço</option>  
                   <!-- <option value='3'>Bares e Restaurantes</option>  -->
                  <!--  <option value='4'>Evento</option>  -->
              </select>
              
          
              <button onclick='primeiroAnuncio()' type="button" class="form-control formsubmit" name="">
                                    Cadastrar
                                </button>
                
            </div>
        </div>
    </div>
</div>
<? } ?>
            </div>
        </div>        
    </section>

