<?
$infoPagina['nomeDaPagina'] = $nomePagina;
$infoPagina['iconePagina'] = $iconePagina;
?>

<? if ($tipoPagina == 'itens') {
   $meusItens = explode(";", $anuncio->itens);
} else if ($tipoPagina == 'proximidades') {
   $meusItens = explode(";", $anuncio->proximidades);
} else if ($tipoPagina == 'lazer') {
   $meusItens = explode(";", $anuncio->lazer);
} ?>

<section class="wrap">
   <? echo View("templates/barra-topo", $infoPagina); ?>
   <div class="conteudo">
      <div class="container-fluid">

         <div class="row">
            <div class="col-12 instruction">
               <?= $textoExplicativo->texto ?>
               <div class="top btn btn-link" data-toggle="collapse" data-target="#instrucao">
                  <div class="title has-icon">
                     <img src="<?= PATHSITE ?>assets/images/icon-alert.svg" alt="">
                     Instruções
                  </div>
                  <button type="button" class="chevron">
                     <img src="<?= PATHSITE ?>assets/images/icon-chevron-up.svg" alt="">
                  </button>
               </div>

               <div class="bottom collapse" id="instrucao">
                  <div class="content" >
                     Nesta seção, você deverá escolher apenas os itens que correspondam com a estrutura real de seu imóvel, que esta sendo anunciado.


                     Caso hajam itens que não correspondam com o seu anúncio, este poderá ser removido pelo administrador do site.



                     Para inserir um item basta clicar sobre ele que está destacado com o fundo vermelho. Após clicar no item, ele será carregado automaticamente para o seu anúncio, e caso queira excluir o mesmo basta clicar no "x" que fica localizado na frente do nome do item e o mesmo voltará para a lista de item podendo ser escolhido no futuro caso deseje.



                     No campo onde os itens ficam selecionados, o anunciante também poderá digitar ali o que deseja como por exemplo “50 pratos” ou somente escrever “talheres” caso não queira colocar a quantidade no item a ser publicado no site. Depois de digitado o item de interesse, basta dar "enter" para que o item digitado seja carregado no anúncio.


                     Não se preocupe com a ordem dos nomes dos itens que o anunciante inserir em seu anúncio, ao clicar no botão "Enviar" o sistema organizará em ordem alfabética todos os itens selecionados.

                     Lembramos que a escolha dos itens abaixo, são de responsabilidade do anunciante.

                     Relacionamos abaixo algumas opções de itens para ajudar o anunciante na publicação dos mesmos em seu anúncio.
                  </div>
               </div>
            </div>
         </div>

         <form class="form-horizontal" method="post" enctype="multipart/form-data" id="formBusca1">
            <fieldset>

               <h2 class="col-12 mb-5">Itens disponíveis</h2>

               <div class='col-12'>
                  <label class="mb-3">Itens disponíveis</label>
                  <input data-role="tagsinput" type="text" name="itensdisponiveis" class="form-control tags-input mySingleFieldTags " value="<?= $anuncio->itensdisponiveis ?>" placeholder="Itens">
               </div>

               <div class="col-12 border-top pt-3">
                  <button type="submit" class="form-control formsubmit">
                     Salvar e Atualizar
                  </button>
               </div>
            </fieldset>
         </form>
      </div>
   </div>
</section>