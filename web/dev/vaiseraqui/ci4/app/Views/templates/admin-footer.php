<footer class="footer">
  <ul class="list-inline">
    <li><?= date("Y") ?> © Uaau Digital.</li>
  </ul>

  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</footer>
</div>
<!-- /.main-content -->
</div><!--/#wrapper -->
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
<!-- 
	================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script>
  var PATHSITE = '<?= PATHSITE ?>';
</script>

<script src="<?= PATHSITE ?>admins/assets/scripts/jquery.min.js"></script>
<!-- <script src="http://www.veredasagronegocio.web2142.uni5.net/site/js/jquery-ui/jquery-ui.js"></script> -->
<script src="<?= PATHSITE ?>admins/assets/scripts/modernizr.min.js"></script>
<script src="<?= PATHSITE ?>admins/assets/plugin/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= PATHSITE ?>admins/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?= PATHSITE ?>admins/assets/plugin/nprogress/nprogress.js"></script>
<script src="<?= PATHSITE ?>admins/assets/plugin/sweet-alert/sweetalert.min.js"></script>
<script src="<?= PATHSITE ?>admins/assets/plugin/waves/waves.min.js"></script>
<!-- Full Screen Plugin -->
<script src="<?= PATHSITE ?>admins/assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

<script src="<?= PATHSITE ?>admins/assets/plugin/dropify/js/dropify.min.js"></script>
<script src="<?= PATHSITE ?>admins/assets/scripts/fileUpload.demo.min.js"></script>

<script src="<?= PATHSITE ?>admins/assets/scripts/main.min.js"></script>
<script src="<?= PATHSITE ?>admins/assets/color-switcher/color-switcher.min.js"></script>

<script src="<?= PATHSITE ?>admins/assets/plugin/toastr/toastr.min.js"></script>


<!-- Colorpicker -->
<script src="<?= PATHSITE ?>admins/assets/plugin/colorpicker/js/bootstrap-colorpicker.min.js"></script>

<script src="<?= PATHSITE ?>admins/assets/color-switcher/color-switcher.min.js"></script>

<script src="<?= PATHSITE ?>admins/assets/plugin/maxlength/bootstrap-maxlength.min.js"></script>

<!-- moment -->
<script src="<?= PATHSITE ?>admins/assets/plugin/moment/moment.js"></script>

<!-- daterangepicker -->
<script src="<?= PATHSITE ?>admins/assets/plugin/daterangepicker/daterangepicker.js"></script>

<!-- Demo Scripts -->
<script src="<?= PATHSITE ?>admins/assets/scripts/form.demo.min.js"></script>

<!-- Tinymce !-->
<script src="https://cdn.tiny.cloud/1/1r8cx3i7ili64dicaol4mmsetzsypxpd2bjkpthxjsu6mbfu/tinymce/5/tinymce.min.js" referrerpolicy="origin" />
</script>

<script src="<?= PATHSITE ?>admins/assets/scripts/jquery.dataTables.js"></script>

<script src="<?= PATHSITE ?>admins/assets/scripts/maskedinput.min.js"></script>

<script src="<?= PATHSITE ?>admins/assets/scripts/mask.min.js"></script>

<script src="<?= PATHSITE ?>admins/assets/scripts/maskmoney.js"></script>

<script src="<?= PATHSITE ?>admins/assets/editors/editors.js"></script>

<!-- script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> -->

<script src="<?= PATHSITE ?>admins/assets/scripts/jquery-ui.js"></script>


<!-- <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script> -->

<!-- <script src="<?= PATHSITE ?>admin/assets/scripts/Sortable.min.js"></script> -->


<script src="<?= PATHSITE ?>admins/assets/scripts/jquery.ui.touch-punch.min.js"></script>

<!-- Flex Datalist -->
<script src="<?= PATHSITE ?>admins/assets/plugin/flexdatalist/jquery.flexdatalist.min.js"></script>

<!-- Tagit -->
<script src="<?= PATHSITE ?>admins/assets/plugin/tagit/tag-it.min.js"></script>

<!-- Datepicker -->
<script src="<?= PATHSITE ?>admins/assets/plugin/datepicker/js/bootstrap-datepicker.min.js"></script>

<script src="<?= PATHSITE ?>admins/assets/plugin/select2/js/select2.min.js"></script>





<script type="text/javascript">
  $(function() {
    $(".sortable").sortable({
      items: ".sort",
      opacity: 0.5,
      update: function(event, ui) {
        var lista = [];
        $('.sortable .sort').each(function(cont, element) {
          lista.push($(element).attr("rel"));
        });
        ordena(lista, "<?= $tabela ?>", "<?= $nomeModel ?>");
      }
    });
    $(".sortable").disableSelection();
  });

  function ordena(lista, tabela, nomeModel) {
    $.post('<?= PATHSITE ?>utils/ordena/', {
      lista: lista,
      tabela: tabela,
      nomeModel: nomeModel
    }, function(retorno) {

    });
  }

  $('#widget').draggable();

  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  });
</script>


<script>
  $(document).ready(function() {
    $(".mySingleFieldTags").tagit({
      allowSpaces: true
    });
  });

  $("#principaiscomodidades").tagit({    
    beforeTagRemoved: function(event, ui) {
      let label = ui.tagLabel
      const item = document.querySelector(`.sugestoes li[data-id='${label}'][data-target="principaiscomodidades"]`);

      if(item) {
        item.style.display = "inline-block"
      }
    }
  });
</script>


<script>
  // Set the options that I want
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "rtl": false,
    "positionClass": "toast-bottom-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": 300,
    "hideDuration": 1000,
    "timeOut": 2000,
    "extendedTimeOut": 1000,
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }


  $(document).ready(function onDocumentReady() {
      <? if ($excluiu) { ?>
        toastr.success("Excluido com sucesso!");
      <? } ?>
      <? if ($salvou) { ?>
        toastr.success("Salvo com sucesso!");
      <? } ?>
      <? if ($naoExc) { ?>
        toastr.warning("<?= $naoExc ?>!");
      <? } ?>
      <? if ($erros) {
        foreach ($erros as $erro) { ?>
          toastr.error("<?= $erro ?>");
      <?  }
      } ?>

    } // 2000 is 2 seconds  
  );

  $('#check-excluir').change(function() {
    if (this.checked) {
      $(".sortable").addClass("exclusao");
    } else {
      $(".sortable").removeClass("exclusao");
    }

  });
</script>

</body>

</html>