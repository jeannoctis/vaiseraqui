<?
$infoPagina['nomeDaPagina'] = "Fotos";
$infoPagina['iconePagina'] = 'icon-image.svg';
?>
<section class="wrap">
    <? echo View("templates/barra-topo", $infoPagina); ?>

    <div class="conteudo">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 ">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <?= $textoExplicativo->texto ?>
                        </div>
                    </div>

                </div>

            </div>
            <hr class="linhaform">

            <form class="form-horizontal" method="post" enctype='multipart/form-data'  id="formBusca">
                <fieldset>
                    <div class="row">
                        <div class="col-12">

                            <label for="arquivo" >
                                <button  for="arquivo" class="btn btn-primary mt-3" type="button" name="salvar" value="Salvar" >Adicionar Fotos</button>
                            </label>                             
                            <input id="arquivo" class='form-control' multiple type="file" name='arquivo[]' value="upload" />

                            <br/>
                            <input class="btn btn-primary mt-3" type="submit" name="salvar" value="Salvar" />
                        </div>
                    </div>
                </fieldset>
            </form>

            <hr class="linhaform">

            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="formBusca1">
                <fieldset>
                    <div class="row">
                        <div class="col-12"> 
                            <div class="panel-options">
                                <a style="text-decoration: none !important; float: left; margin-top:0; margin-right: 15px;" href="#">
                                    <label style="float: left; " for="check-excluir">Fotos do anúncio</label>
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <form method="post">
                                <table id='sortable' class="table table-responsive">
                                    <thead>
                                        <tr>                                           
                                            <th>#</th>
                                            <th>Ordenar Fotos</th>
                                            <th>Visualização da foto</th>
                                            <th>Nome do arquivo</th>
                                            <th>Tamanho do arquivo</th>
                                            <th>Foto de capa</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                    if ($fotos) {
                                        foreach ($fotos as $ind => $elemento) {
                                            ?>
                                                <tr idtd='<?=$ind?>' id="tr-<?=$elemento->id?>"  class="ui-state-default sort" rel="<?= $elemento->id ?>">
                                                    <td id="sort-<?= $ind ?>"><?= ($ind + 1) ?></td>
                                                    <td><img src="<?= PATHSITE ?>images/sort.svg" /> </td>
                                                    <td>
                                                        <img style='object-fit: cover; margin-top: 10px; margin-bottom: 10px;' height="85" width="180" src="<?= PATHSITE ?>uploads/produto/<?= $elemento->produtoFK ?>/<?= $elemento->arquivo ?>" />
                                                    </td>
                                                    <td>                                                       
                                                        <?= $elemento->arquivo ?>                                                       
                                                    </td>
                                                    <?
                                                    if( is_file(PATHHOME . 'uploads/produto/' . $elemento->produtoFK . '/' . $elemento->arquivo) ) {
                                                    $size = filesize(PATHHOME . 'uploads/produto/' . $elemento->produtoFK . '/' . $elemento->arquivo);
                                                    $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
                                                    $power = $size > 0 ? floor(log($size, 1024)) : 0;
                                                    } else {
                                                        $size = 0;
                                                    }
                                                    ?>
                                                    <td>                                                       
                                                        <?= number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power]; ?>                                                       
                                                    </td>                                                  
                                                    <td><input <?=($anuncio->fotoFK == $elemento->id) ? 'checked' : '' ?> style='width: 25px; height: 25px;' onclick='fotoDestaque("<?=encode($elemento->id)?>")' type="radio" name="capa" /></td>
                                                    <td><img src="<?=PATHSITE?>images/lixeira.svg" onclick="excluirFotos('<?= encode($elemento->id) ?>',<?=$elemento->id?>);" /> </td>
                                                </tr>
                                           
                                            <?
                                        } 
                                    }
                                    ?> 
                                                 </tbody>
                                </table>
                            </form>
                        </div>



                        </form>                
                    </div>
                    </div>
                    </section>

                    <style>
                        .base{
                            position: relative;
                        }

                        .exclusao .hover{
                            border: solid 20px #FFF;
                            display: block !important;
                        }

                        .excluir{
                            display: none;
                            position: absolute;
                            left: -17px;
                            top: -19px;
                            height: 15px;
                            width: 15px;
                        }

                        .exclusao .hover .excluir{
                            display: block;
                        }

                        .base .hover{
                            display: none;
                            width: 100%;
                            height: 100%;
                            background: rgba(0,0,0,0.5);
                            position: absolute;
                            left: 0;
                            top: 0;
                        }
                        .base:hover .hover{
                            display: block;
                        }
                        .icones{
                            left: 50%;
                            top: 50%;
                            position: absolute;
                            transform: translate(-50%);
                        }
                        .icones a{
                            color: #FFF !important;
                        }

                        .botao{
                            float: left;
                            padding: 15px 25px;
                            border-radius: 6px;
                            margin-right: 10px;
                            background-color: #FFF;
                            color: #000;
                            border: solid 1px #428bca;
                            text-decoration: none !important;
                        }

                        .botao.ativo,.botao:hover{
                            color: #FFF;
                            background-color: #428bca;
                        }
                    </style>