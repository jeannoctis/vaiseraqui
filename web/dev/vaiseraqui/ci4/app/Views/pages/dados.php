<?
$infoPagina['nomeDaPagina'] = "Dados do anúncio";
$infoPagina['iconePagina'] = 'icon-write.svg';
?>
<section class="wrap">
    <? echo View("templates/barra-topo", $infoPagina); ?>

    <form class="conteudo" action="">

        <fieldset >
            <legend>Dados Gerais</legend>

            <div class="form-group">
                <label for="">
                    Nome (que você quer que apareça em destaque)
                    <input type="text">
                </label>

                <label for="">
                    Tipo do Imóvel
                    <input type="text">
                </label>
            </div>

        </fieldset>
        

        <fieldset>

            <legend>Endereço</legend>

            <div class="form-group">

                <label for="">
                    Rua e Número
                    <input type="text">
                </label>

                <label for="">
                    Bairro
                    <input type="text">
                </label>

                <label for="">
                    Cidade
                    <input type="text">
                </label>

                <label for="">
                Localização (Iframe do mapa)
                    <input type="text">
                </label>

                <label for="">
                    Coordenadas  (Iframe do mapa)
                    <input type="text">
                </label>
                
            </div>
        </fieldset>

        <fieldset>

            <legend>Descrição</legend>

            <p>Breve Descrição de Apresentação</p>

            <textarea name="" id="" cols="30" rows="10">

            </textarea>
            
            
            <p>Descrição Completa</p>

            <textarea name="" id="" cols="30" rows="10">
                
            </textarea>
            
        </fieldset>

        <fieldset>

            <legend>Valores</legend>
            
            
        </fieldset>

    </form>

    <div class="conteudo">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <?= $textoExplicativo->texto ?>
                </div>
            </div>
            <hr class="linhaform">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="formBusca">
                <fieldset>
                    <div class="row">
                        <div class="col-12">
                            <label>Nome</label>
                            <input type="text" name="titulo" class="form-control" Value="<?= $anuncio->titulo ?>">
                        </div>
                        <div class="col-12">
                            <label>Descrição da Apresentação</label>
                            <textarea rows="3" type="text" name="descricao" class="form-control"><?= $anuncio->descricao ?></textarea>
                        </div>
                        <div class="col-12">
                            <label>Endereço</label>
                            <input <?= ($anuncio->endereco) ? "disabled" : "" ?> type="text" name="endereco" class="form-control" Value="<?= $anuncio->endereco ?>">
                        </div>


                        <? /*
                          <div id='bannerArquivo' class="col-12">
                          <label class='mb-3'><h2>Banner: Tamanho Recomendado(470x370)</h2></label> <br/>
                          <input class='form-control'  type="file" name='arquivo' value="upload" /><br/>

                          <? if($anuncio->arquivo){?>
                          <label for="" class=" control-label">Foto atual</label>
                          <div style="background-size:contain; width: 100%; background-position: center center; background-image:url(<?= PATHSITE ?>uploads/produto/<?=$anuncio->id?>/<?= $anuncio->arquivo ?>); height: 120px; background-repeat: no-repeat"></div>
                          <? } ?>
                          </div> */ ?>
                        <? if ($categorias) { ?>
                            <div class="col-12">
                                <label>Categoria</label>
                                <select <?= ($anuncio->categoriaFK) ? "disabled" : "" ?> required type="text" name="categoriaFK" class="form-control" Value="">
                                    <option value=''>Selecione...</option>
                                    <? foreach ($categorias as $cat) { ?>
                                        <option <?= ($anuncio->categoriaFK == $cat->id) ? "selected" : "" ?> value="<?= $cat->id ?>"><?= $cat->titulo ?></option>
                                    <? } ?>

                                </select>
                            </div>
                        <? } ?>

                        <? if ($capacidades) { ?>
                            <div class="col-12">
                                <label>Capacidade (Espaço) </label>
                                <select required type="text" name="capacidadeFK" class="form-control" Value="">
                                    <option value=''>Selecione...</option>
                                    <? foreach ($capacidades as $cat) { ?>
                                        <option <?= ($anuncio->capacidadeFK == $cat->id) ? "selected" : "" ?> value="<?= $cat->id ?>">Até <?= $cat->quantidade ?> pessoas</option>
                                    <? } ?>

                                </select>
                            </div>
                        <? } ?>

                        <div class="col-12">
                            <label>Capacidade (Hospedes) </label>
                            <select required type="text" name="hospedes" class="form-control" Value="">
                                <option value=''>Selecione...</option>
                                <option <?= ($anuncio->hospedes == 0) ? "selected" : "" ?> value='0'>Não se aplica</option>
                                <? for ($i = 1; $i <= 30; $i++) { ?>
                                    <option <?= ($anuncio->hospedes == $i) ? "selected" : "" ?> value="<?= $i ?>">Até <?= $i ?> pessoas</option>
                                <? } ?>

                            </select>
                        </div>

                        <? if ($cidades) { ?>
                            <div class="col-12">
                                <label>Cidade</label>
                                <select <?= ($anuncio->cidadeFK) ? "disabled" : "" ?> required type="text" name="cidadeFK" class="form-control" Value="">
                                    <option value=''>Selecione...</option>
                                    <? foreach ($cidades as $cat) { ?>
                                        <option <?= ($anuncio->cidadeFK == $cat->id) ? "selected" : "" ?> value="<?= $cat->id ?>"><?= $cat->titulo ?>/<?= $cat->sigla ?></option>
                                    <? } ?>

                                </select>
                            </div>
                        <? } ?>


                        <div class="col-12">
                            <label>Iframe do mapa</label>
                            <textarea name="mapa" class="form-control"><?= $anuncio->mapa ?></textarea>
                        </div>

                        <div class="col-12">
                            <label>Coordenadas </label>
                            <input type="text" name="coordenadas" class="form-control " Value="<?= ($anuncio->latitude && $anuncio->longitude) ? $anuncio->latitude . "," . $anuncio->longitude : "" ?>">
                        </div>

                        <div class='col-12'>
                            <label>Itens disponíveis</label>
                            <input id="itensdisponiveis" data-role="tagsinput" type="text" name="itensdisponiveis" class="form-control tags-input mySingleFieldTags " value="<?= $anuncio->itensdisponiveis ?>" placeholder="Itens">
                        </div>

                        <div class='col-12'>
                            <label>Condomínio</label>
                            <input id="condominio" data-role="tagsinput" type="text" name="condominio" class="form-control tags-input mySingleFieldTags " value="<?= $anuncio->condominio ?>" placeholder="Itens">
                        </div>

                        <div class="col-12 mb-3">
                            <label>Descrição sobre o imóvel</label>
                            <textarea name="texto" id="inputTexto" class="form-control tinymce_full"><?= $anuncio->texto ?></textarea>
                        </div>

                        <div class="col-12 col-md-6">
                            <label>Área útil (m²)</label>
                            <input type="number" min="0" name="areautil" class="form-control" id="areautil" value="<?= $anuncio->areautil ?>" placeholder="Escreva...">
                        </div>
                        <div class="col-12 col-md-6">
                            <label>Quartos</label>
                            <input type="number" min="0" name="quartos" class="form-control" id="quartos" value="<?= $anuncio->quartos ?>" placeholder="Escreva...">
                        </div>
                        <div class="col-12 col-md-6">
                            <label>Banheiros</label>
                            <input type="number" min="0" name="banheiros" class="form-control" id="quartos" value="<?= $anuncio->banheiros ?>" placeholder="Escreva...">
                        </div>
                        <div class="col-12 col-md-6">
                            <label>Vagas</label>
                            <input type="number" min="0" name="vagas" class="form-control" id="quartos" value="<?= $anuncio->vagas ?>" placeholder="Escreva...">
                        </div>
                        <div class="col-12 col-md-6">
                            <label>Andares</label>
                            <input type="andar" min="0" name="andar" class="form-control" id="andar" value="<?= $anuncio->andar ?>" placeholder="Escreva...">
                        </div>
                        <div class="col-12 col-md-6">
                            <label>Animais de estimação?</label>
                            <select name="animais" required class="form-control" id="animais">
                                <option <?= $anuncio->animais == "N" ? 'selected' : '' ?> value="N">Não</option>
                                <option <?= $anuncio->animais == "S" ? 'selected' : '' ?> value="S">Sim</option>
                            </select>
                        </div>

                        <div class="col-12 col-md-6">
                            <label>Mobilidado?</label>
                            <select name="mobilia" required class="form-control" id="mobilia">
                                <option <?= $anuncio->mobilia == "N" ? 'selected' : '' ?> value="N">Não</option>
                                <option <?= $anuncio->mobilia == "S" ? 'selected' : '' ?> value="S">Sim</option>
                            </select>
                        </div>

                        <div class="col-12 col-md-6">
                            <label>Transporte público</label>
                            <input type="text" name="transporte" class="form-control" id="transporte" value="<?= $anuncio->transporte ?>" placeholder="Escreva...">
                        </div>

                        <div class="col-12">
                            <label>Observações</label>
                            <textarea type="text" name="observacoes" class="form-control tinymce_full"><?= $anuncio->observacoes ?></textarea>
                        </div>

                        <div class="col-12">
                            <label>Regras de Check-in e Check-out</label>
                            <textarea type="text" name="regrascheck" class="form-control tinymce_full"><?= $anuncio->regrascheck ?></textarea>
                        </div>

                        <div class="col-12">
                            <label>O que é permitido</label>
                            <textarea type="text" name="pode" class="form-control tinymce_full"><?= $anuncio->pode ?></textarea>
                        </div>

                        <div class="col-12">
                            <label>O que é permitido</label>
                            <textarea type="text" name="naopode" class="form-control tinymce_full"><?= $anuncio->naopode ?></textarea>
                        </div>

                        <div class="col-12">
                            <label>Description (SEO)</label>
                            <textarea name="description" class="form-control"><?= $anuncio->description ?></textarea>
                        </div>

                        <div class="col-12 ">
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


<script>
    function mudaCalendario() {
        var calendario = $("#calendario").val();

        if (calendario == 'S') {
            $("#bannerArquivo").hide();
        } else {
            $("#bannerArquivo").show();
        }

    }
</script>