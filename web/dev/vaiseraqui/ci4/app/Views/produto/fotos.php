<div id="wrapper">
   <div class="main-content">
      <div class="row small-spacing">
         <div class="col-xs-12">
            <div class="box-content">
               <div class='col-xs-12 col-md-6'>
                  <h4 class="box-title"><?= $produtoFK->titulo ?> - <?= $title ?></h4>
               </div>
               <div class='col-xs-12 col-md-6 text-right form-group'>
                  <a style="float: right; margin-left: 15px; margin-top: 13px;" href="#" class="switch danger">
                     <input style="width:20px; margin-top: 0; margin-bottom:0; height: 20px; float: left; margin-right: 5px;" type="checkbox" id="check-excluir" />
                     <label style="float: left; color: gray" for="check-excluir">Modo Exclusão </label>
                  </a>

                  <a href="<?= PATHSITE ?>admin/<?= $tabelaFK ?>/<?= $tabelaFKF ?>/<?= encode($idFK) ?>?tipo=<?= $get['tipo'] ?>">
                     <button type="button" class="btn btn-violet btn-rounded waves-effect waves-light">Adicionar</button>
                  </a>
                  <button onclick='$("#form").submit()' type="button" class="btn btn-danger btn-rounded waves-effect waves-light">Excluir</button>
               </div>

               <form id='form' method="post">
                  <div class="sortable col-xs-12">
                     <? if ($fotos) { ?>
                        <? foreach ($fotos as $ind => $elemento) { ?>
                           <div class="ui-state-default sort col-md-4 base" rel="<?= $elemento->id ?>">

                              <div style="background-image:url('<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $elemento->arquivo ?>'); filter: <?= $produtoFK->fotoFK == $elemento->id ? "brightness(1)" : "" ?>;" class="base-bg"></div>

                              <div class="hover">

                                 <input class="excluir" type="checkbox" name="excluir[]" value="<?= $elemento->id ?>" />

                                 <div class="icones">
                                    <a href="<?= PATHSITE ?>admin/<?= $tabelaFK ?>/<?= $tabelaFKF ?>/<?= encode($idFK) ?>/<?= encode($elemento->id) ?>?tipo=<?= $get['tipo'] ?>">
                                       <i class="bi bi-pencil-square"></i> Editar
                                    </a>
                                    <a href="#" onclick="fotoDestaque('<?= encode($elemento->id) ?>', '<?= $elemento->id ?>')" id="princBtn<?= $elemento->id ?>">
                                       <i class="bi bi-star-fill <?= $produtoFK->fotoFK == $elemento->id ? 'yellow' : '' ?>"></i> <span><?= $produtoFK->fotoFK == $elemento->id ? 'Foto Principal' : 'Tornar Principal' ?> </span>
                                    </a>
                                 </div>
                              </div>
                              
                           </div>
                        <? } ?>
                     <? } ?>
                  </div>

                  <div class="form-group col-xs-12 paddingZeroM mt-1">
                     <a href="<?= PATHSITE ?>admin/produto?tipo=<?= $get['tipo'] ?>">
                        <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">Voltar</button>
                     </a>
                  </div>
               </form>

            </div>
         </div>
      </div>
   </div>
</div>

<style>
   .base {
      position: relative;
      padding: 0;
      border-radius: 10px;
      border: solid 1px #000;
      cursor: pointer;
   }

   .base-bg {
      height: 467px;
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
      border-radius: 10px;
      filter: brightness(0.5);
   }

   .exclusao .hover {
      display: block !important;
      border: solid 20px #ffffffd6;
      border-radius: 10px;
   }

   .exclusao .hover:has(input[type=checkbox]:checked) {
      border-color: #f07f75;
   }

   .excluir {
      display: none;
      position: absolute;
      left: -17px;
      top: -19px;
      height: 15px;
      width: 15px;
   }

   .exclusao .hover .excluir {
      display: block;
   }

   .base .hover {
      display: none;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.3);
      position: absolute;
      left: 0;
      top: 0;
   }

   .base:hover .hover {
      display: block;
   }

   .base .isPrincipal {
      position: absolute;
   }

   .icones {
      left: 50%;
      top: 50%;
      position: absolute;
      transform: translate(-50%, -50%);
      display: flex;
      flex-direction: column;
      gap: 1rem;
   }

   .icones a {
      color: #FFF !important;
      text-align: center;
   }

   .icones a:nth-child(2) i.yellow {
      color: yellow;
   }

   .botao {
      float: left;
      padding: 15px 25px;
      border-radius: 6px;
      margin-right: 10px;
      background-color: #FFF;
      color: #000;
      border: solid 1px #428bca;
      text-decoration: none !important;
   }

   .botao.ativo,
   .botao:hover {
      color: #FFF;
      background-color: #428bca;
   }
</style>

<script>
   function fotoDestaque(id, idFoto) {
      $.post(PATHSITE + 'produto/fotoDestaque/', {
         id
      }, function(data) {
         const retorno = jQuery.parseJSON(data);

         if(retorno.ok) {
            const icones = document.querySelectorAll(".hover .icones i")
            const textos = document.querySelectorAll(".hover .icones span")
            const bgs = document.querySelectorAll(".base-bg")

            icones.forEach(i => i.classList.remove("yellow"))
            textos.forEach(t => t.textContent = "Tornar principal")
            bgs.forEach(bg => bg.style.filter = 'brightness(0.5)')

            const icone = document.querySelector(`#princBtn${idFoto} i`)
            const texto = document.querySelector(`#princBtn${idFoto} span`)
            const bg = icone.closest(".hover").previousElementSibling

            icone.classList.add("yellow")
            texto.textContent = "Foto principal"
            bg.style.filter = 'brightness(1)';
         }
      });
   }
</script>