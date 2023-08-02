<?
$tamanhoRecomendado = "1920x800";
?>


<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-lg-12 col-xs-12">
                <form method="post" enctype="multipart/form-data" >
                    <div class="box-content card white">
                        <h4 class="box-title"><?= $title ?></h4>
                        <!-- /.box-title -->
                        <? if ($qualPagina == 1) { ?>
                            <div class="card-content">

                                <div class='form-group col-xs-12 paddingZeroM'>
                                    <div class="col-xs-12 col-sm-6">
                                        <label for="nome" >Nome da empresa  </label>                               
                                        <input type="text" name="nome" class="form-control" id="nome" value="<?= $resultado->nome ?>" placeholder="Escreva...">                             
                                    </div>    
                                    <div class="col-xs-12 col-sm-6">
                                        <label for="cep" >Cep de Origem  </label>                               
                                        <input type="text" name="cep" class="form-control cep" id="cep" value="<?= $resultado->cep ?>" placeholder="Escreva...">                             
                                    </div>    
                                </div>  

                                <div class='form-group col-xs-12 paddingZeroM'>
                                    <div class="col-xs-12 col-sm-6">
                                        <label for="nome" >E-mail </label>                               
                                        <input type="text" name="email" class="form-control" id="email" value="<?= $resultado->email ?>" placeholder="Escreva...">                             
                                    </div>      
                                    <div class="col-xs-12 col-sm-6 ">
                                        <label for="parcelasjuros" >Parcelamentos s/ juros</label>                               
                                        <select name="parcelasjuros" class="form-control">
                                            <? for($i=1;$i<=12;$i++) { ?>
                                            <option <?=($resultado->parcelasjuros == $i) ? 'selected' : '' ?> value="<?=$i?>"><?=$i?> x sem juros </option>
                                          <?  }?>
                                        </select>
                                    </div>          
                                </div>
                         

                                <div class="form-group col-xs-12">
                                    <div class='col-xs-12'>
                                        <input type="submit" name="salvar" value="Salvar e atualizar" class="btn btn-success btn-rounded waves-effect mb-1">
                                    </div>
                                </div>
                                </form>
                                <!-- /.card-content -->
                            </div>
                        <? } else if ($qualPagina == 2) { ?>

                            <div class="card-content card-content2">

                                <div class='form-group col-xs-12 paddingZeroM'>
                                    <div class="col-xs-12 col-sm-6">
                                        <label for="diferencial1">Diferencial 01  </label> 
                                        <input type="text" name="diferencial1" class="form-control" id="diferencial1" value="<?= $resultado->diferencial1 ?>" placeholder="Escreva...">
                                    </div>

                                    <div class="col-xs-12 col-sm-6">
                                        <label for="diferencial1JP">Diferencial 01 (JP)</label> 
                                        <input type="text" name="diferencial1JP" class="form-control" id="diferencial1JP" value="<?= $resultado->diferencial1JP ?>" placeholder="Escreva...">
                                    </div>

                                </div>

                                <div class='form-group col-xs-12 paddingZeroM'>
                                    <div class="col-xs-12 col-sm-12">
                                        <label for="icone1"> Texto 01 </label>
                                        <textarea style='resize: none;' type="text" name="icone1" class="form-control " id="icone1" value="" placeholder="Escreva..."><?= $resultado->icone1 ?></textarea>   
                                    </div>    
                                </div>

                                <div class='form-group col-xs-12 paddingZeroM'>
                                    <div class="col-xs-12 col-sm-12">
                                        <label for="icone1JP"> Texto 01 (JP) </label>
                                        <textarea style='resize: none;' type="text" name="icone1JP" class="form-control " id="icone1JP" value="" placeholder="Escreva..."><?= $resultado->icone1JP ?></textarea>   
                                    </div>    
                                </div>

                                <div class='form-group col-xs-12 paddingZeroM'>
                                    <div class="col-xs-12 col-sm-6">
                                        <label for="diferencial2">Diferencial 02  </label> 
                                        <input type="text" name="diferencial2" class="form-control" id="diferencial2" value="<?= $resultado->diferencial2 ?>" placeholder="Escreva...">
                                    </div>

                                    <div class="col-xs-12 col-sm-6">
                                        <label for="diferencial2JP">Diferencial 02 (JP)</label> 
                                        <input type="text" name="diferencial2JP" class="form-control" id="diferencial2JP" value="<?= $resultado->diferencial2JP ?>" placeholder="Escreva...">
                                    </div>

                                </div>
                                <div class='form-group col-xs-12 paddingZeroM'>
                                    <div class="col-xs-12 col-sm-12">
                                        <label for="icone2"> Texto 02 </label>
                                        <textarea style='resize: none;' type="text" name="icone2" class="form-control " id="icone2" value="" placeholder="Escreva..."><?= $resultado->icone2 ?></textarea>   
                                    </div>                    
                                </div>

                                <div class='form-group col-xs-12 paddingZeroM'>
                                    <div class="col-xs-12 col-sm-12">
                                        <label for="icone2JP"> Texto 02 (JP) </label>
                                        <textarea style='resize: none;' type="text" name="icone2JP" class="form-control " id="icone2JP" value="" placeholder="Escreva..."><?= $resultado->icone3JP ?></textarea>   
                                    </div>    
                                </div>

                                <div class='form-group col-xs-12 paddingZeroM'>
                                    <div class="col-xs-12 col-sm-6">
                                        <label for="diferencial3">Diferencial 03 </label>
                                        <input type="text" name="diferencial3" class="form-control" id="diferencial3" value="<?= $resultado->diferencial3 ?>" placeholder="Escreva...">
                                    </div>

                                    <div class="col-xs-12 col-sm-6">
                                        <label for="diferencial3JP">Diferencial 03 (JP)</label> 
                                        <input type="text" name="diferencial3JP" class="form-control" id="diferencial3JP" value="<?= $resultado->diferencial3JP ?>" placeholder="Escreva...">
                                    </div>


                                </div>

                                <div class='form-group col-xs-12 paddingZeroM'>
                                    <div class="col-xs-12 col-sm-12">
                                        <label for="icone3"> Texto 03 </label>
                                        <textarea style='resize: none;' type="text" name="icone3" class="form-control " id="icone3" value="" placeholder="Escreva..."><?= $resultado->icone3 ?></textarea>   
                                    </div>   
                                </div>

                                <div class='form-group col-xs-12 paddingZeroM'>
                                    <div class="col-xs-12 col-sm-12">
                                        <label for="icone3JP"> Texto 03 (JP) </label>
                                        <textarea style='resize: none;' type="text" name="icone3JP" class="form-control " id="icone3JP" value="" placeholder="Escreva..."><?= $resultado->icone3JP ?></textarea>   
                                    </div>    
                                </div>

                                <div class='form-group col-xs-12 paddingZeroM'>
                                    <div class="col-xs-12 col-sm-6">
                                        <label for="diferencial4">Diferencial 04 </label>
                                        <input type="text" name="diferencial4" class="form-control" id="diferencial4" value="<?= $resultado->diferencial4 ?>" placeholder="Escreva...">
                                    </div>

                                    <div class="col-xs-12 col-sm-6">
                                        <label for="diferencial4JP">Diferencial 04 (JP)</label> 
                                        <input type="text" name="diferencial4JP" class="form-control" id="diferencial4JP" value="<?= $resultado->diferencial4JP ?>" placeholder="Escreva...">
                                    </div>

                                </div>


                                <div class='form-group col-xs-12 paddingZeroM'>
                                    <div class="col-xs-12 col-sm-12">
                                        <label for="icone4"> Texto 04 </label>
                                        <textarea style='resize: none;' type="text" name="icone4" class="form-control " id="icone4" value="" placeholder="Escreva..."><?= $resultado->icone4 ?></textarea>   
                                    </div>   
                                </div>

                                <div class='form-group col-xs-12 paddingZeroM'>
                                    <div class="col-xs-12 col-sm-12">
                                        <label for="icone4JP"> Texto 04 (JP) </label>
                                        <textarea style='resize: none;' type="text" name="icone43JP" class="form-control " id="icone4JP" value="" placeholder="Escreva..."><?= $resultado->icone43JP ?></textarea>   
                                    </div>    
                                </div>

                                <div class="form-group col-xs-12">
                                    <div class="col-xs-12 col-sm-12">
                                        <input type="submit" name="salvar" value="Salvar e atualizar" class="btn btn-success btn-rounded waves-effect mb-1">
                                    </div>
                                </div>
                            <? } ?>

                            <!-- /.box-content -->
                        </div>