<div id="wrapper">
   <div class="main-content">
      <div class="row small-spacing">
         <div class="col-lg-12 col-xs-12">
            <form method="post" enctype="multipart/form-data">
               <div class="box-content card white">
                  <h4 class="box-title"><?= $title ?> - <?= $resultado->titulo ?></h4>
                  <!-- /.box-title -->
                  <div class="card-content">

                     <div class='col-lg-6 form-group'>
                        <label for="anuncioFK">Anúncio</label>
                        <select name="anuncioFK" id="anuncioFK" class="form-control" required>

                           <? if ($produtos) { ?>
                              <option>-- selecione o anúncio --</option>
                              <? foreach ($produtos as $produto) { ?>
                                 <option value="<?= $produto->id ?>" <?= $resultado->produtoFK == $produto->id ? 'selected' : '' ?>>
                                    <?= $produto->titulo ?> (<?= $produto->anuncianteFK ?>)
                                 </option>
                              <? } ?>

                           <? } ?>

                        </select>
                     </div>

                     <div class='col-lg-6 form-group'>
                        <label for="tipo">Tipo de Anúncio</label>
                        <select name="tipo" id="tipo" class="form-control" required>
                           <option value="">-- selecione o tipo --</option>
                           <option value="ASM" <?= $resultado->tipo == "ASM" ? "selected" : "" ?>>Em alta - Pequeno</option>
                           <option value="ALG" <?= $resultado->tipo == "ALG" ? "selected" : "" ?>>Em alta - Grande</option>
                           <option value="HSM" <?= $resultado->tipo == "HSM" ? "selected" : "" ?>>Home - Pequeno</option>
                           <option value="HLG" <?= $resultado->tipo == "HLG" ? "selected" : "" ?>>Home - Grande</option>
                           <option value="XL" <?= $resultado->tipo == "XL" ? "selected" : "" ?>>Home/Blog - Extra Grande</option>
                           <option value="CSM" <?= $resultado->tipo == "CSM" ? "selected" : "" ?>>Categoria - Pequeno</option>
                           <option value="CLG" <?= $resultado->tipo == "CLG" ? "selected" : "" ?>>Categoria - Grande</option>
                           <option value="BMD" <?= $resultado->tipo == "BMD" ? "selected" : "" ?>>Blog - Médio (lateral)</option>
                        </select>
                     </div>

                     <div class='col-lg-6 form-group'>
                        <label for="inicio">Início do anúncio</label>
                        <input type="date" name="inicio" class="form-control" id="inicio" value="<?= $resultado->inicio ?>" placeholder="Escreva..." required>
                     </div>

                     <div class='col-lg-6 form-group'>
                        <label for="termino">Término do anúncio</label>
                        <input type="date" name="termino" class="form-control" id="termino" value="<?= $resultado->termino ?>" placeholder="Escreva..." required>
                     </div>

                     <!-- Botões -->
                     <div class="col-xs-12 form-group">
                        <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/<?= $tipo ?>">
                           <button type="button" class="btn btn-primary btn-rounded waves-effect mb-1">Voltar</button>
                        </a>
                        <input type="submit" name="salvar" value="Salvar e atualizar" class="btn btn-success btn-rounded waves-effect mb-1">
                     </div>

                  </div>
               </div>

            </form>
            <!-- /.card-content -->
         </div>
         <!-- /.box-content -->
      </div>