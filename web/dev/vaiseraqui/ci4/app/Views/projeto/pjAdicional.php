<div id="wrapper">
   <div class="main-content">
      <div class="row small-spacing">
         <div class="col-lg-12 col-xs-12">
            <form method="post" enctype="multipart/form-data">
               <div class="box-content card white">
                  <h4 class="box-title"><?= $projetoAtual->titulo ?> - <?= $title ?> - <?= $adicional->titulo ?></h4>
                  <!-- /.box-title -->
                  <div class="card-content">

                     <div class='form-group col-xs-12 col-lg-6 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="titulo">Título </label>
                           <input type="text" name="titulo" class="form-control" id="titulo" value="<?= $adicional->titulo ?>" placeholder="Escreva...">
                        </div>
                     </div>

                     <div class='form-group col-xs-12 col-lg-6 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="valor">Valor</label>
                           <div class="input-group">
                              <span class="input-group-addon">R$</span>
                              <input type="text" name="valor" class="form-control money" id="valor" value="<?= $adicional->valor ?>" placeholder="Escreva...">
                           </div>
                        </div>
                     </div>                     

                     <div class='form-group col-xs-12 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="texto">Descrição</label>
                           <textarea name='texto' class="tinymce_full" id="texto"><?= $adicional->texto ?></textarea>
                        </div>
                     </div>

                     <div id='imagem' class="form-group col-xs-12 col-lg-6 paddingZeroM mt-5">
                        <div class='col-xs-12'>
                           <label for="arquivo">Imagem demonstrativa <b>(tamanho recomendado: )</b> </label>
                           <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $adicional->arquivo ?>' type="file" name='arquivo' id="arquivo" class="dropify">
                           <div class="col-sm-12 col-lg-6 switch danger" style="display: flex;">
                              <input style="height: 30px; margin-bottom: 10px; width: 30px; float: left;" id="apagar-arquivo" type="checkbox" name="apagararquivo" class="cb">
                              <label style="float: left; margin-top: 6px; margin-left: -12px;" for="apagar-arquivo" id="lbCheck">Apagar imagem</label>
                           </div>
                        </div>
                     </div>

                     <div id='imagem' class="form-group col-xs-12 col-lg-6 paddingZeroM mt-5">
                        <div class='col-xs-12'>
                           <label for="pdf">Arquivo para download deste projeto adicional <b>(recomendado: .ZIP, .PDF, imagens)</b> </label>
                           <input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $adicional->pdf ?>' type="file" name='pdf' id="pdf" class="dropify">
                           <div class="col-sm-12 col-lg-6 switch danger" style="display: flex;">
                              <input style="height: 30px; margin-bottom: 10px; width: 30px; float: left;" id="apagar-pdf" type="checkbox" name="apagararquivo" class="cb">
                              <label style="float: left; margin-top: 6px; margin-left: -12px;" for="apagar-pdf" id="lbCheck">Apagar arquivo</label>
                           </div>
                        </div>
                     </div>

                     <div class='form-group col-sm-12 col-lg-6 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="impressao">Preço da impressão</label>
                           <div class="input-group">
                              <span class="input-group-addon">R$</span>
                              <input type="text" name="impressao" class="form-control money" id="impressao" value="<?= $adicional->impressao ?>" placeholder="Escreva..." required>
                           </div>
                        </div>
                     </div>

                     <div class='form-group col-sm-12 col-lg-6 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="peso">Peso (em gm)</label>
                           <div class="input-group">
                              <input type="number" name="peso" class="form-control" min="0" id="peso" value="<?= $adicional->peso ?>" placeholder="Escreva..." required>
                              <span class="input-group-addon">gramas</span>
                           </div>
                        </div>
                     </div>

                     <div class='form-group col-sm-12 col-lg-4 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="comprimento">Comprimento (em cm)</label>
                           <div class="input-group">
                              <input type="number" name="comprimento" class="form-control" min="0" id="comprimento" value="<?= $adicional->comprimento ?>" placeholder="Escreva..." required>
                              <span class="input-group-addon">centímetros</span>
                           </div>
                        </div>
                     </div>

                     <div class='form-group col-sm-12 col-lg-4 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="altura">Altura (em cm)</label>
                           <div class="input-group">
                              <input type="number" name="altura" class="form-control" min="0" id="altura" value="<?= $adicional->altura ?>" placeholder="Escreva..." required>
                              <span class="input-group-addon">centímetros</span>
                           </div>
                        </div>
                     </div>

                     <div class='form-group col-sm-12 col-lg-4 paddingZeroM'>
                        <div class="col-xs-12 col-sm-12">
                           <label for="largura">Largura (em cm)</label>
                           <div class="input-group">
                              <input type="number" name="largura" class="form-control" min="0" id="largura" value="<?= $adicional->largura ?>" placeholder="Escreva..." required>
                              <span class="input-group-addon">centímetros</span>
                           </div>
                        </div>
                     </div>                     

                     <!-- Botões -->
                     <div class="form-group col-xs-12">
                        <div class='col-xs-12'>
                           <a href="<?= PATHSITE ?>admin/<?= $tabelaFK ?>/<?= $tabelaFK2 ?>/<?= encode($idProjeto) ?><?=$get['form'] ? '/?form=true' : ''?>">
                              <button type="button" class="btn btn-primary btn-rounded waves-effect mb-1">Voltar</button>
                           </a>
                           <input type="submit" name="salvar" value="Salvar e Atualizar" class="btn btn-success btn-rounded waves-effect mb-1" />
                        </div>
                     </div>

                  </div>
               </div>

            </form>
            <!-- /.card-content -->
         </div>
         <!-- /.box-content -->
      </div>