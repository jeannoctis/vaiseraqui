<style>
   .card-content2 .dropify-wrapper {
      height: 120px;
   }
</style>

<div id="wrapper">
   <div class="main-content">
      <div class="row small-spacing">
         <div class="col-lg-12 col-xs-12">
            <form method="post" enctype="multipart/form-data">
               <div class="box-content card white">
                  <h4 class="box-title">
                     <?= $title ?> - <?= $resultado->autor ?>
                  </h4>
                  <!-- /.box-title -->
                  <div class="card-content">

                     <div class='form-group col-xs-12 col-lg-4 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="titulo">Título</label>
                           <input type="text" name="titulo" class="form-control" id="titulo" value="<?= $resultado->titulo ?>" placeholder="Escreva...">
                        </div>
                     </div>

                     <div class='form-group col-xs-12 col-lg-4 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="detalhe">Detalhe (badge)</label>
                           <input type="text" name="detalhe" class="form-control" id="detalhe" value="<?= $resultado->detalhe ?>" placeholder="Escreva...">
                        </div>
                     </div>

                     <div class='form-group col-xs-12 col-lg-4 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="mensalidade">Mensalidade</label>
                           <div class="input-group">
                              <span class="input-group-addon">R$</span>
                              <input type="text" name="mensalidade" class="form-control money" id="mensalidade" value="<?= $resultado->mensalidade ?>" placeholder="Escreva...">
                              <span class="input-group-addon">/mês</span>
                           </div>
                        </div>
                     </div>

                     <div class="form-group col-xs-12 paddingZeroM">
                        <div class="col-xs-12 col-sm-12 form-group">
                           <label for="inclui">Inclui (máximo de 5 itens)</label>
                           <input type="text" name="inclui" class="form-control tags-input tag-planos-inclui" id="inclui" value="<?= $resultado->inclui ?>" placeholder="Escreva...">
                        </div>
                     </div>

                     <div class="form-group col-xs-12 paddingZeroM">
                        <div class="col-xs-12 col-sm-12 form-group">
                           <label for="naoInclui">Não inclui (máximo de 2 itens)</label>
                           <input type="text" name="naoInclui" class="form-control tags-input tag-planos-nao-inclui" id="naoInclui" value="<?= $resultado->naoInclui ?>" placeholder="Escreva...">
                        </div>
                     </div>
                     <!-- Botões -->
                     <div class="form-group col-xs-12">
                        <div class='col-xs-12'>
                           <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/<?= $tipo ?>">
                              <button type="button" class="btn btn-primary btn-rounded waves-effect mb-1">Voltar</button>
                           </a>
                           <input type="submit" name="salvar" value="Salvar e Atualizar" class="btn btn-success btn-rounded waves-effect mb-1" />
                        </div>
                     </div>

                  </div>
               </div>

            </form>
         </div>
      </div>