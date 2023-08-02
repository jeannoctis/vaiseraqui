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
                     <?= $title ?>
                  </h4>
                  <!-- /.box-title -->
                  <div class="card-content">

                     <div class='form-group col-xs-12 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="titulo">Título</label>
                           <input type="text" name="titulo" class="form-control" id="titulo" value="<?= $resultado->titulo ?>" placeholder="Escreva...">
                        </div>
                     </div>

                     <div class='form-group col-xs-12 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="descricao">Descrição</label>
                           <input type="text" name="descricao" class="form-control" id="descricao" value="<?= $resultado->descricao ?>" placeholder="Escreva...">
                        </div>
                     </div>

                     <div class='form-group col-xs-12 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="botao">Botão</label>
                           <input type="text" name="botao" class="form-control" id="botao" value="<?= $resultado->botao ?>" placeholder="Escreva...">
                        </div>
                     </div>

                     <div id='imagem' class="form-group col-xs-12 col-lg-6 paddingZeroM mt-5">
                        <div class='col-xs-12'>
                           <label for="arquivo">Banner Mobile <b><?= ($resultado->tamanho) ? '(Tamanho recomendado: ' . $resultado->tamanho . ')' : '' ?></b> </label>
                           <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo ?>' type="file" name='arquivo' id="arquivo" class="dropify" >
                           <div class="col-sm-12 col-lg-6 switch danger" style="display: flex;">
                              <input style="height: 30px; margin-bottom: 10px; width: 30px; float: left;" id="apagar-arquivo" type="checkbox" name="apagararquivo" class="cb">
                              <label style="float: left; margin-top: 6px; margin-left: -12px;" for="apagar-arquivo" id="lbCheck">Apagar imagem</label>
                           </div>
                        </div>
                     </div>

                     <div id='imagem' class="form-group col-xs-12 col-lg-6 paddingZeroM mt-5">
                        <div class='col-xs-12'>
                           <label for="arquivo2">Banner Desktop <b><?= ($resultado->tamanho) ? '(Tamanho recomendado: ' . $resultado->tamanho . ')' : '' ?></b> </label>
                           <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo2 ?>' type="file" name='arquivo2' id="arquivo2" class="dropify" >
                           <div class="col-sm-12 col-lg-6 switch danger" style="display: flex;">
                              <input style="height: 30px; margin-bottom: 10px; width: 30px; float: left;" id="apagar-arquivo2" type="checkbox" name="apagararquivo2" class="cb">
                              <label style="float: left; margin-top: 6px; margin-left: -12px;" for="apagar-arquivo2" id="lbCheck">Apagar imagem</label>
                           </div>
                        </div>
                     </div>

                     <div class="form-group col-lg-6 paddingZeroM">
                        <div class="col-xs-12 col-sm-12">
                           <label for="icone1">Ícone 1 <b>(Tamanho Recomendado: )</b> </label>
                           <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->icone1 ?>' type="file" name='icone1' id="icone1" class="dropify">
                           <div class="col-sm-12 col-lg-6 switch danger" style="display: flex;">
                              <input style="height: 30px; margin-bottom: 10px; width: 30px; float: left;" id="apagar-icone1" type="checkbox" name="apagaricone1" class="cb">
                              <label style="float: left; margin-top: 6px; margin-left: -12px;" for="apagar-icone1" id="lbCheck">Apagar Ícone</label>
                           </div>
                        </div>
                     </div>

                     <div class="form-group col-lg-6 col-lg-6 paddingZeroM">
                        <div class="col-xs-12 col-sm-12">
                           <label for="icone2">Ícone 2 <b>(Tamanho Recomendado: )</b></label>
                           <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->icone2 ?>' type="file" name='icone2' id="icone2" class="dropify">
                           <div class="col-sm-12 col-lg-6 switch danger" style="display: flex;">
                              <input style="height: 30px; margin-bottom: 10px; width: 30px; float: left;" id="apagar-icone2" type="checkbox" name="apagaricone2" class="cb">
                              <label style="float: left; margin-top: 6px; margin-left: -12px;" for="apagar-icone2" id="lbCheck">Apagar Ícone</label>
                           </div>
                        </div>
                     </div>
                     
                     <!-- Botões -->
                     <div class="form-group col-xs-12">
                        <div class='col-xs-12'>
                           <a class='hidden' href="<?= PATHSITE ?>admin/<?= $tabela ?>/<?= $tipo ?>">
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