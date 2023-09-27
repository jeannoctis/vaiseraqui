<div id="wrapper">
   <div class="main-content">
      <div class="row small-spacing">
         <div class="col-lg-12 col-xs-12">
            <form method="post" enctype="multipart/form-data">
               <div class="box-content card white">
                  <h4 class="box-title"><?= $title ?></h4>
                  <!-- /.box-title -->
                  <div class="card-content">

                     <div class='col-xs-12 col-lg-6 form-group'>
                        <label for="nome">Nome da empresa </label>
                        <input type="text" name="nome" class="form-control" id="nome" value="<?= $resultado->nome ?>" placeholder="Escreva...">
                     </div>
         
                      <div class='col-xs-12 col-lg-6 paddingZeroM'>
                        <div class="col-xs-12 form-group">
                           <label for="cidadeFK">Cidade Principal</label>
                           <? if ($estados) { ?>
                              <select required name="cidadeFK" required class="form-control js-example-basic-single" id="cidadeFK">
                                 <option value="">-- selecione uma cidade --</option>
                                 <? foreach ($estados as $estado) { ?>
                                    <optgroup label="<?= $estado->estado_titulo ?>">
                                       <? foreach ($estado->cidades as $cidade) { ?>
                                          <option <?= $resultado->cidadeFK == $cidade->cidade_id ? 'selected' : '' ?> value="<?= $cidade->cidade_id ?>">
                                             <?= $cidade->cidade_titulo ?>
                                          </option>
                                       <? } ?>
                                    </optgroup>
                                 <? } ?>
                              </select>
                           <? } ?>
                        </div>
                     </div>

                     <div class='col-xs-12 col-lg-4 form-group'>
                        <label for="email">E-mail </label>
                        <input type="text" name="email" class="form-control" id="email" value="<?= $resultado->email ?>" placeholder="Escreva...">
                     </div>
                     
                     <div class='col-xs-12 col-lg-4 form-group'>
                        <label for="telefone">Telefone </label>
                        <input type="text" name="telefone" class="form-control telefone" id="telefone" value="<?= $resultado->telefone ?>" placeholder="Escreva...">
                     </div>

                     <div class='col-xs-12 col-lg-4 form-group'>
                        <label for="whatsapp">WhatsApp </label>
                        <input type="text" name="whatsapp" class="form-control telefone" id="whatsapp" value="<?= $resultado->whatsapp ?>" placeholder="Escreva...">
                     </div>
                      
                      

                     <div class="col-xs-12 form-group">
                        <input type="submit" name="salvar" value="Salvar e atualizar" class="btn btn-success btn-rounded waves-effect mb-1">
                     </div>

                  </div>
               </div>
            </form>
            <!-- /.card-content -->
         </div>
         <!-- /.box-content -->
      </div>
   </div>