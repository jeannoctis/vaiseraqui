<script>
  var PATHSITE = '<?= PATHSITE ?>';
</script>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?= PATHSITE ?>js2/plugins.js"></script>
<script type="text/javascript" src="<?= PATHSITE ?>js2/jquery.mask.js"></script>
<script src="https://cdn.tiny.cloud/1/1r8cx3i7ili64dicaol4mmsetzsypxpd2bjkpthxjsu6mbfu/tinymce/5/tinymce.min.js" referrerpolicy="origin" />
</script>
<script src="<?= PATHSITE ?>admins/assets/scripts/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<script src="<?= PATHSITE ?>admins/assets/plugin/tagit/tag-it.min.js"></script>
<script src="https://www.uaau.digital/dev/vaiseraqui/admins/assets/plugin/sweet-alert/sweetalert.min.js"></script>
<script type="text/javascript" src="<?= PATHSITE ?>js2/scripts.js?v=1.0.6"></script>

<script>
  function carregaCalendarios(mes, ano, id) {
    $.post("<?= PATHSITE ?>" + "produto/carregaCalendarios/", {
      "mes": mes,
      "ano": ano,
      "id": id
    }, function(retorno) {
      dados = jQuery.parseJSON(retorno);
      $("#calendarios").html(dados.calendario);
      $("#mes-antes").attr("mes", dados.mes1);
      $("#mes-antes").attr("ano", dados.ano1);
      $("#mes-depois").attr("mes", dados.mes2);
      $("#mes-depois").attr("ano", dados.ano2);
      //   $("#calendarios").html(retorno);
    });
  }
  $(document).ready(function() {
    carregaCalendarios("<?= date("m") ?>", "<?= date("Y") ?>", "<?= encode($anuncio->id) ?>");
    $('#avisoSair').modal('show');
  });

  function alteraDia(ano, mes, dia, id) {
    var seletor = $("#dia-" + ano + "-" + mes + "-" + dia);
    if (seletor.hasClass("ocupado")) {
      $.post("<?= PATHSITE ?>" + "produto/adicionaData/", {
        "mes": mes,
        "ano": ano,
        "dia": dia,
        "id": id,
        "tipo": "REM"
      }, function(retorno) {
        seletor.removeClass("ocupado");
      });
    } else {
      $.post("<?= PATHSITE ?>" + "produto/adicionaData/", {
        "mes": mes,
        "ano": ano,
        "dia": dia,
        "id": id,
        "tipo": "ADD"
      }, function(retorno) {
        seletor.addClass("ocupado");
      });
    }
  }

  $(function() {
    $("#sortable").sortable({
      items: ".sort",
      opacity: 0.5,
      update: function(event, ui) {
        var lista = [];
        $('#sortable .sort').each(function(cont, element) {
          var id = $(element).attr('idtd');
          $("#sort-" + id).html(cont + 1);
          lista.push($(element).attr("rel"));
        });
        ordena(lista, "<?= $tabela ?>", "<?= $nomeModel ?>");
      }
    });
    $("#sortable").disableSelection();
  });

  function ordena(lista, tabela, nomeModel) {
    $.post('<?= PATHSITE ?>utils/ordena/', {
      lista: lista,
      tabela: tabela,
      nomeModel: nomeModel
    }, function(retorno) {

    });
  }

  $(document).ready(function() {
    visitas(<?= $anuncio->id ?>);
    viuWhats(<?= $anuncio->id ?>);
    viuFone(<?= $anuncio->id ?>);
  });
</script>

<script>
  $('.ui-sortable-handle').draggable();
</script>

<script>
  <? if ($erroLogin) { ?>
    swal("Ops,", "<?= $erroLogin ?>", "error");
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
    window.location = window.location.href;
  <? } else if ($sucesso) { ?>
    swal("Sucesso", "<?= $sucesso ? $sucesso : "Salvo com sucesso!" ?>", "success").then((result) => {
      <? if ($_POST) { ?>
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
      }
      window.location = window.location.href;
      <? } ?>
    });
  <? } else if ($_POST) { ?>
    swal("Ops,", "<?= $erro ?>", "error");
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
    window.location = window.location.href;
  <? } ?>
</script>

</body>

</html>