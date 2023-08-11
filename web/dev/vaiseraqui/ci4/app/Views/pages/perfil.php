<?
 $infoPagina['nomeDaPagina'] = "Meu perfil";
          $infoPagina['iconePagina'] = '';
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


                <form class="form-horizontal" method="post" enctype="multipart/form-data" id="formBusca1">
                    <fieldset>
                
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="tituloAba1">
                                    <h5 class="mb-0">
                                        <div class="btn btn-link" >
                                            Perfil / Contatos
                                        </div>
                                    </h5>
                                </div>

                                <div id="aba1" class="collapse show" aria-labelledby="" data-parent="#">
                                    <div class="card-body">

                                        <div class="row">   
                                           <div class="col-12">
                                                <label>Nome do anunciante</label>
                                                <input type="text" name="titulo" value="<?=$anunciante->titulo?>" class="form-control ">
                                            </div>
                                          
                                           <div class="col-12">
                                                <label>Trocar foto</label>
                                                <input class='form-control' multiple type="file" name='arquivo' value="upload" /><br/>
                                            </div>
                                          
                                       
                                          
                                           <div class="col-12">
                                                <label>E-mail</label>
                                                <input readonly type="text" name="" value="<?=$anunciante->email?>" class="form-control ">
                                            </div>
                                          <div class="col-12">
                                                <label>Alterar Senha</label>
                                                <input type="password" name="senha" value="" class="form-control ">
                                            </div>
                                          <div class="col-12">
                                                <label>Confirmar Senha</label>
                                                <input type="password" name="senha2" value="" class="form-control ">
                                            </div>
                                            <div class="col-12">
                                                <label>WhatsApp 01</label>
                                                <input type="text" name="telefone1" value="<?=$anunciante->telefone1?>" class="form-control phone_with_ddd">
                                            </div>
                                            <div class="col-12">
                                                <label>Whatsapp 02</label>
                                                <input type="text" name="telefone2" value="<?=$anunciante->telefone2?>" class="form-control phone_with_ddd">
                                            </div>
                                            <div class="col-12">
                                                <label>Whatsapp 03</label>
                                                <input type="text" name="telefone3" value="<?=$anunciante->telefone3?>" class="form-control phone_with_ddd">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
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