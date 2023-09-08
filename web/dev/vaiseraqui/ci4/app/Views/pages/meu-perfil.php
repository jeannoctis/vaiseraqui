 <link rel="stylesheet" href="<?=PATHSITE?>style.css?v=1.0.3">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



    <section class="meuPerfil mt-5">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-12 mt-5">
                    <h2 class="titulo2 mt-5 text-left">
                        Meu perfil
                    </h2>
                </div>

                <div class="col-12 col-md-6">
                    <div class="boxDados">
                        <div class="areaFoto">
                          <? if($clienteLogado->arquivo){?>
                            <img src="<?=PATHSITE?>uploads/cliente/<?=$clienteLogado->arquivo?>" class="fotoDePerfil">
                          <? } else {?>
    <img src="https://www.soufesta.com.br/site/images/soufesta.svg" class='fotoDePerfil' >  
<? } ?>
                          
                 <form  class="old-input" method="post" enctype="multipart/form-data">
               <input accept="image/*" mudartexto="label-file" class="d-none files" id="file2" type="file" value="" name="arquivo">
                </form>

                               <label for='file2'>   
                            <div class="editarFoto">
                                <div class="editarFotoFechado">
                                    <img src="<?=PATHSITE?>images/perfil_editar.svg">
                                </div>
                            </div>
                                 </label>

                        </div>
                        <h3>
                          <?=$clienteLogado->titulo?>
                        </h3>
                        <h6>
                           <?=$clienteLogado->cidade?> - <?=$clienteLogado->estado?>
                        </h6>

                        <div class="clearfix"></div>

                        <ul class="menuDados">
                            <li class="ativo" data-painel=".boxViewTab1">
                                Alterar dados cadastrais
                            </li>
                            <li data-painel=".boxViewTab2">
                                Favoritos
                            </li>
                            <li onclick="$('#avisoSair').modal('show');">
                                <img  src="<?=PATHSITE?>images/perfil_sair.svg"> Sair
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="boxView">
                        <div class="boxTabView boxViewTab1 ativo">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-12">
                                            <h3>
                                                Alterar dados cadastrais
                                            </h3>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label>Seu nome</label>
                                            <input type="text" name="titulo" class="form-control iconeName" placeholder="ex: João" value="<?=$clienteLogado->titulo?>">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label>Sobrenome</label>
                                            <input type="text" name="sobrenome" class="form-control" placeholder="ex: Da Silva" value="<?=$clienteLogado->sobrenome?>">
                                        </div>
                                      
                                        <div class="col-12 ">
                                        <label>Cidade</label>
                                        <input  type="text" name="cidade"  value="<?=$clienteLogado->cidade?>"  class="form-control" placeholder="ex: Catanduva">
                                    </div>
                                      
                                        <div class="col-12 ">
                                        <label>Estado</label>
                                          <select name='estado'  class="form-control" id="">
                                            <option  selected disabled>Selecione</option>
                                          <? if($estados){
                                          foreach($estados as $cat){                                      
                                          ?>
                                            <option <?=($clienteLogado->estado == $cat->sigla) ? "selected" : "" ?> value="<?=$cat->sigla?>"><?=$cat->titulo?></option>                                           
                                          <?  } } ?>
                                        </select>
                                    </div>
                                      
                                        <div class="col-12">
                                            <label>Telefone</label>
                                            <input type="text" name="telefone" class="form-control iconeTelefone phone_with_ddd" placeholder="ex: (00) 9 9999-9999" value="<?=$clienteLogado->telefone?>">
                                        </div>
    
                                        <div class="col-12">
                                            <label>Tenho interesse em</label>
                                        </div>
                                      
                                      <?
                                      if($clientesInteresses){
                                        foreach($clientesInteresses as $cliInt){?>
                                          <div class='col-12'>
                                            <div class='categoria'>
                                            <?=$cliInt->titulo?>
                                              <img onclick="excluirInteresse('<?=encode($cliInt->id)?>')" class='excluir' src="<?=PATHSITE?>images/excluir.png" />
                                             </div>
                                      </div>  
                                      <?  }
                                      }
                                      ?>
                                      
                                         <div class="col-12 mb-3">
                                            <label>Adicionar mais interesses:</label>
                                        </div>
        
                                        <div class="col-6">
                                            <select disabled class="form-control">
                                                <option>Espaços</option>                                                
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <select name='interesse[]'  class="form-control" id="selectEspaco">
                                            <option  selected disabled>Subcategoria de interesse</option>
                                          <? if($categorias){
                                          foreach($categorias as $cat){
                                            if($cat->tipoFK == 1){
                                          ?>
                                            <option value="<?=$cat->id?>"><?=$cat->titulo?></option>                                           
                                          <? } } } ?>
                                        </select>
                                        </div>
                                      
                                       <div class="col-6">
                                            <select disabled class="form-control">
                                                <option>Serviços</option>                                                
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <select name='interesse[]'  class="form-control" id="selectEspaco">
                                            <option  selected disabled>Subcategoria de interesse</option>
                                          <? if($categorias){
                                          foreach($categorias as $cat){
                                            if($cat->tipoFK == 2){
                                          ?>
                                            <option value="<?=$cat->id?>"><?=$cat->titulo?></option>                                           
                                          <? } } } ?>
                                        </select>
                                        </div>
                                      
                                       <div class="col-6 d-none">
                                            <select disabled class="form-control">
                                                <option>Bares e restaurantes</option>                                                
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <select name='interesse[]'  class="form-control" id="selectEspaco">
                                            <option  selected disabled>Subcategoria de interesse</option>
                                          <? if($categorias){
                                          foreach($categorias as $cat){
                                            if($cat->tipoFK == 3){
                                          ?>
                                            <option value="<?=$cat->id?>"><?=$cat->titulo?></option>                                           
                                          <? } } } ?>
                                        </select>
                                        </div>
                                      
                                       <div class="col-6 d-none">
                                            <select disabled class="form-control">
                                                <option>Eventos</option>                                                
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <select name='interesse[]'  class="form-control" id="selectEspaco">
                                            <option  selected disabled>Subcategoria de interesse</option>
                                          <? if($categorias){
                                          foreach($categorias as $cat){
                                            if($cat->tipoFK == 4){
                                          ?>
                                            <option value="<?=$cat->id?>"><?=$cat->titulo?></option>                                           
                                          <? } } } ?>
                                        </select>
                                        </div>
    
                                        <div class="col-12">
                                            <label>E-mail</label>
                                            <input type="email" name="" readonly class="form-control" placeholder="ex: joao@gmail.com" value="<?=$clienteLogado->email?>">
                                        </div>
                                        <div class="col-12 posRelative">
                                            <label>Senha</label>
                                            <input type="password" class="form-control inputSenha" name="senha" placeholder="senha com no mínimo 8 caracteres" autocomplete="on" value="">
                                            <div class="iconeSenha" toggle=".inputSenha"></div>
                                        </div>
                                        <div class="col-12 posRelative">
                                            <label>Confirme sua senha</label>
                                            <input type="password" class="form-control inputSenha" name="senha2" placeholder="digite novamente a sua senha para confirmarmos" autocomplete="on" value="">
                                            <div class="iconeSenha" toggle=".inputSenha"></div>
                                        </div>
                                        
                                        <div class="col-12 col-md-6 offset-md-3">
                                            <button type="submit" class="form-control formsubmit" name="enviar" value="Enviar">
                                                Atualizar
                                            </button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>

                        <div class="boxTabView boxViewTab2">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-12">
                                            <h3>
                                                Meus favoritos
                                            </h3>
                                        </div>
                                
                                          <? if($categorias){?>
                                        <div class="col-6">
                                            <label>Categoria</label>
                                            <select onchange='mudaCategorias(this.value)' name='categoria' class="form-control">             
                                                <option value=''>Todas</option>
                                                 <option value='1'>Espaços</option>
                                                 <option value='2'>Serviços</option>
                                             <!--    <option value='3'>Bares e Restaurantes</option> -->
                                               <!--  <option value='4'>Eventos</option> -->
                                            </select>
                                        </div>
                                    
                                        <div class="col-6">
                                            <label>Subcategoria</label>
                                            <select onchange='mudaSubcategorias(this.value)' id='subcategoria' name='subcategoria' class="form-control">
                                                    <option value=''>Todas</option>
                                                      <? foreach($categorias as $cat){?>
                                                    <option class="subcat-<?=$cat->tipoFK?>" value="<?=$cat->id?>"><?=$cat->titulo?></option>
                                              <? }?>
                                            </select>
                                        </div>
                                            <? }?>
                                    </div>
                                </fieldset>
                            </form>
                            
                            <div class="clearfix"></div>
                                     <? if($favoritos){
                            foreach($favoritos as $ind => $prod){
                          ?>
                            <div class="cardBusca categoria-<?=$prod->categoriaFK?> ">
                                <div id="carouselCard<?=$ind?>" class="carousel slide" data-ride="carousel">
                                   <ol class="carousel-indicators">
                                <? if($prod->fotos){
                              foreach($prod->fotos as $ind2 => $foto){ ?>
                                <li data-target="#carouselCard<?=$ind?>" data-slide-to="<?=$ind2?>" class="<?=($ind2) ? " " : "active" ?>"></li>
                                  <? } }?>
                            </ol>
                              <div onclick='window.location.href="<?=PATHSITE?>espaco/<?=$prod->identificador?>/"' class="carousel-inner">
                              <? if($prod->fotos){
                              foreach($prod->fotos as $ind2 => $foto){
                              ?>
                                <div class="carousel-item carousel-espaco-busca <?= ($ind2) ? "" :  "active" ?>">
                                    <img src="<?=PATHSITE?>uploads/produto/<?=$prod->id?>/<?=$foto->arquivo?>">
                                </div>
                              <? } }?>
                            </div>
                                  <? if($prod->fotos && count($prod->fotos) > 1 ){?>
                            <a class="carousel-control-prev" href="#carouselCard<?=$ind?>" role="button" data-slide="prev">
                                <img src="<?=PATHSITE?>images/seta_prev.svg">
                            </a>
                            <a class="carousel-control-next" href="#carouselCard<?=$ind?>" role="button" data-slide="next">
                                <img src="<?=PATHSITE?>images/seta_next.svg">
                            </a>
                          <? } ?>
                                </div>
        
                                <div class="cardBuscaInfo cardBuscarEspaco">
                                    <div class="favoritar">
                                        <input onclick="favoritar(<?=$prod->id?>)" <?= in_array($prod->id,$todosFavoritos) ? "checked" : "" ?> class='coracaoFavorito' id='coracaobusca<?=$ind?>' type='checkbox' checked>
                                        <label for='coracaobusca<?=$ind?>'></label>
                                    </div>
                                  <a href="<?=PATHSITE?>espaco/<?=$prod->identificador?>/" class="">
                                    <h5 >
                                       <?=$arrayCategorias[$prod->categoriaFK]?>
                                    </h5>
                                    <h3>
                                       <?=$prod->titulo?>
                                    </h3>
                                    <hr/>
                                    <h5 class='d-none'>
                                        Até 29 hóspedes  •  5 treliches  •  Quarto climatizado  •  Churrasqueira  •  Estacionamento  •  Sala de TV
                                    </h5>
                                    <div class="avaliacao d-none">
                                        <img src="<?=PATHSITE?>images/icone_estrela.svg"> 4.4 <span>(25)</span>
                                    </div>
                                    <h4 class=''>
                                     <span>A partir de</span>  <?= number_format($prod->preco, 2, ',', ' ')?> 
                                    </h4>
                                    <div class="clearfix"></div>
                                  </a>
                                    <a href="<?=PATHSITE?>espaco/<?=$prod->identificador?>/" class="cta3 ">
                                        Ver mais detalhes
                                    </a>
                                </div>
                            </div>
                          <? } } ?>
                             <? if($favoritos2){
                            foreach($favoritos2 as $ind => $prod){
                          ?>
                            <div class="cardBusca categoria-<?=$prod->categoriaFK?> ">
                                <div id="carouselCard-<?=$ind?>" class="carousel slide" data-ride="carousel">
                                   <ol class="carousel-indicators">
                                <? if($prod->fotos){
                              foreach($prod->fotos as $ind2 => $foto){ ?>
                                <li data-target="#carouselCard-<?=$ind?>" data-slide-to="<?=$ind2?>" class="<?=($ind2) ? " " : "active" ?>"></li>
                                  <? } }?>
                            </ol>
                                  <div onclick='window.location.href="<?=PATHSITE?>servico/<?=$prod->identificador?>/"' class="carousel-inner">
                              <? if($prod->fotos){
                              foreach($prod->fotos as $ind2 => $foto){
                              ?>
                                <div class="carousel-item carousel-espaco-busca <?= ($ind2) ? "" :  "active" ?>">
                                    <img src="<?=PATHSITE?>uploads/produto/<?=$prod->id?>/<?=$foto->arquivo?>">
                                </div>
                              <? } }?>
                            </div>
                                  <? if($prod->fotos && count($prod->fotos) > 1 ){?>
                            <a class="carousel-control-prev" href="#carouselCard-<?=$ind?>" role="button" data-slide="prev">
                                <img src="<?=PATHSITE?>images/seta_prev.svg">
                            </a>
                            <a class="carousel-control-next" href="#carouselCard-<?=$ind?>" role="button" data-slide="next">
                                <img src="<?=PATHSITE?>images/seta_next.svg">
                            </a>
                          <? } ?>
                                </div>
        
                                <div class="cardBuscaInfo cardBuscarEspaco">
                                    <div class="favoritar">
                                        <input onclick="favoritar(<?=$prod->id?>)" <?= in_array($prod->id,$todosFavoritos) ? "checked" : "" ?> class='coracaoFavorito' id='coracaobusca<?=$ind?>' type='checkbox' checked>
                                        <label for='coracaobusca<?=$ind?>'></label>
                                    </div>
                                   <a href="<?=PATHSITE?>servico/<?=$prod->identificador?>/" class="">
                                    <h5>
                                       <?=$arrayCategorias[$prod->categoriaFK]?>
                                    </h5>
                                    <h3>
                                       <?=$prod->titulo?>
                                    </h3>
                                    <hr/>
                                    <h5 class='d-none'>
                                        Até 29 hóspedes  •  5 treliches  •  Quarto climatizado  •  Churrasqueira  •  Estacionamento  •  Sala de TV
                                    </h5>
                                    <div class="avaliacao d-none">
                                        <img src="<?=PATHSITE?>images/icone_estrela.svg"> 4.4 <span>(25)</span>
                                    </div>
                                    <h4 class=''>
                                     <span>A partir de</span> R$ <?= number_format($prod->preco, 2, ',', ' ')?> 
                                    </h4>
                                    <div class="clearfix"></div>
                                  </a>
                                    <a href="<?=PATHSITE?>servico/<?=$prod->identificador?>/" class="cta3 ">
                                        Ver mais detalhes
                                    </a>
                                </div>
                            </div>
                          <? } } ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="margemTopo"></div>
    

<div id="avisoSair" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
        <div class="modal-content">
            <div class="modal-body modalForm">
                <!--button type="button" class="close" data-dismiss="modal">&times;</button-->

                <div class="iconeModal">
                    <img src="<?=PATHSITE?>images/perfil_atencao.svg">
                </div>

                <h4>
                    Tem certeza que deseja sair?
                </h4>
                <p>
                    Depois você poderá entrar novamente usando seus dados cadastrados!
                </p>
                <button style='cursor:pointer;' type='button' onclick="$('#avisoSair').modal('hide');" class="cta8 cta8b">
                    Cancelar
                </button>
                <a href="<?=PATHSITE?>logout/" class="cta8">
                    Sair
                </a>
                
            </div>
        </div>
    </div>
</div>

<div id="avisoAlterado" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
        <div class="modal-content">
            <div class="modal-body modalForm">
                <!--button type="button" class="close" data-dismiss="modal">&times;</button-->

                <div class="iconeModal">
                    <img src="<?=PATHSITE?>images/perfil_alterado.svg">
                </div>

                <h4>
                    Dados alterados!
                </h4>
                <p>
                    Agora os usuários da nossa plataforma já vão ver seus dados atualizados! ;)
                </p>
                <a href="" class="cta6">
                    Eba!
                </a>
                
            </div>
        </div>
    </div>
</div>