<?
$infoPagina['nomeDaPagina'] = "Calendário";
$infoPagina['iconePagina'] = 'icon-calendar.svg';
?>
<section class="wrap">
    <? echo View("templates/barra-topo", $infoPagina); ?>

    <div class="conteudo">
        <div class="container-fluid">
            <?= view("templates/instrucao-anunciante", (array)$instrucoes) ?>

            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="formBusca1">
                <fieldset>

                    <div class="col-12">
                        <div id="calendario" class="panel-heading col-xs-12 paddingZero">
                            <div class="panel-title col-xs-12">Calendário</div>
                            <div style="margin-bottom: 2rem;" class="col-xs-12">
                                <div mes="" ano="" onclick='carregaCalendarios($(this).attr("mes"), $(this).attr("ano"), "<?= encode($anuncio->id) ?>");' id="mes-antes" class="btn btn-primary pull-left"> ← </div>
                                <div mes="" ano="" onclick='carregaCalendarios($(this).attr("mes"), $(this).attr("ano"), "<?= encode($anuncio->id) ?>");' id="mes-depois" class="btn btn-primary pull-right"> → </div>
                            </div>
                            <div id="calendarios"></div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</section>