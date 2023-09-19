
           <?
                  if($get['cidadeFK']) {
                      foreach($cidades as $cidade) {
                          if($cidade->id == $get['cidadeFK']) {
                              $nomeCidade = $cidade->titulo . '-' . $cidade->sigla;
                              $idCidade = $cidade->id;
                          }
                      }
                  }
                    if($get['tipoFK']) {
                       foreach($produtoCategorias as $prodCat){
                          if($prodCat->id == $get['tipoFK']) {
                              $nomeTipo = $prodCat->titulo;
                              $idTipo = $prodCat->id;
                          }
                      }
                  }
                  ?>


<form action="<?=PATHSITE?><?=$identificador?>" method="get" class="form<?=$id?> <?=$form3Visible?>">
     <input type="hidden" id="cidadeFK<?=$id?>" name="cidadeFK" value="<?=$idCidade?>" />
     <input type="hidden" id="tipoFK<?=$id?>" name="tipoFK" value="<?=$idTipo?>" />
     <input type="hidden"  name="ordem" value="<?=$get['ordem']?>" />
              <div class="box-select mb-10 j-box-select">
                <label for="cities">
                  <div>
                    <img src="<?=PATHSITE?>assets/images/icon-map-2.svg" alt="icon map">
                    Cidade
                  </div>
                  <button class="j-btn-select">
                    <img src="<?=PATHSITE?>assets/images/icon-selector.svg" alt="icon dropdown">
                  </button>
                </label>
                <div class="select">
                  <input  type="text" placeholder="Busque por cidade"value="<?=$nomeCidade?>" >
                  <div class="select-list">
                      <? if($cidades) {?>
                    <ul class="dropdown-select">
                        <? foreach($cidades as $cidade) {?>
                      <li><?=$cidade->titulo?> - <?=$cidade->sigla?></li>
                        <? } ?>
                      </ul>
                      <? } ?>
                  </div>
                </div>
              </div>  
              <div class="input-group-wraper mb-10">              
                <div class="box-select j-box-select">
                  <label for="hospedagem">
                    <div>
                      <img src="<?=PATHSITE?>assets/images/icon-loja-temp.svg" alt="icon map">
                      Tipo da Loja Temporária
                    </div>
                    <button class="j-btn-select">
                      <img src="<?=PATHSITE?>assets/images/icon-selector.svg" alt="icon dropdown">
                    </button>
                  </label>
                  <div class="select">
                    <input id='tipoFK<?=$id?>' type="text" placeholder="Selecione" value="<?=$nomeTipo?>">
                    <div class="select-list">
                          <? if($produtoCategorias){?>
                      <ul class="dropdown-select">
                          <? foreach($produtoCategorias as $prodCat){
                              if($prodCat->tipoFK == $id) {
                              ?>
                        <li onclick="$('#tipoFK<?=$id?>').val('<?=$prodCat->id?>');"><?=$prodCat->titulo?></li>
                          <? } } ?>                      </ul>
                        <? } ?>
                    </div>
                  </div>
                </div>              
                <div class="box-select j-box-select">
                  <label for="cities">
                    <div>
                      <img src="<?=PATHSITE?>assets/images/icon-area-util.svg" alt="icon map">
                      Área Útil
                    </div>
                    <button class="j-btn-select">
                      <img src="<?=PATHSITE?>assets/images/icon-selector.svg" alt="icon dropdown">
                    </button>
                  </label>
                  <div class="select">
                    <input id="areaUtil3" type="text" placeholder="Selecione" name="areaUtil" value="<?=$areaUtil?>">
                    <div class="select-list">
                      <ul class="dropdown-select">
                        <li onclick="$('#areaUtil3').val('0-60')">Até 60m²</li>
                        <li onclick="$('#areaUtil3').val('61-100')">De 61m² a 100m²</li>
                        <li onclick="$('#areaUtil3').val('101-99999999')">Acima de 100m²</li>
                      </ul>
                    </div>
                  </div>
                </div>
  
              </div>
              <div class="box-select mb-10">
                <label for="cities">
                  <div>
                    <img src="<?=PATHSITE?>assets/images/icon-keyword.svg" alt="icon keyword">
                    Palavra-chave
                  </div>
                </label>
                <input name="texto" type="text" placeholder="palavra-chave" value="<?=$get['texto']?>" >
              </div>
              <a style="display: none;" href="#" class="more-filters">
                <svg class="active" width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8107 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8107 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#C82328"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#C82328"/>
                </svg>                
                <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 12.1249C5.8125 11.8142 5.56066 11.5624 5.25 11.5624H1.5C1.18934 11.5624 0.9375 11.8142 0.9375 12.1249C0.9375 12.4355 1.18934 12.6874 1.5 12.6874H5.25C5.56066 12.6874 5.8125 12.4355 5.8125 12.1249Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1875 3.87488C12.1875 3.56422 12.4393 3.31238 12.75 3.31238H16.5C16.8106 3.31238 17.0625 3.56422 17.0625 3.87488C17.0625 4.18554 16.8106 4.43738 16.5 4.43738H12.75C12.4393 4.43738 12.1875 4.18554 12.1875 3.87488Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0625 12.1249C17.0625 11.8142 16.8106 11.5624 16.5 11.5624H9.75C9.43935 11.5624 9.1875 11.8142 9.1875 12.1249C9.1875 12.4355 9.43935 12.6874 9.75 12.6874H16.5C16.8106 12.6874 17.0625 12.4355 17.0625 12.1249Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 3.87488C0.9375 3.56422 1.18934 3.31238 1.5 3.31238H8.25C8.56065 3.31238 8.8125 3.56422 8.8125 3.87488C8.8125 4.18554 8.56065 4.43738 8.25 4.43738H1.5C1.18934 4.43738 0.9375 4.18554 0.9375 3.87488Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 10.3623C8.43195 10.3623 9.1875 11.1179 9.1875 12.0498C9.1875 12.9818 8.43195 13.7373 7.5 13.7373C6.56802 13.7373 5.8125 12.9818 5.8125 12.0498C5.8125 11.1179 6.56802 10.3623 7.5 10.3623ZM10.3125 12.0498C10.3125 10.4965 9.05332 9.2373 7.5 9.2373C5.9467 9.2373 4.6875 10.4965 4.6875 12.0498C4.6875 13.6031 5.9467 14.8623 7.5 14.8623C9.05332 14.8623 10.3125 13.6031 10.3125 12.0498Z" fill="#932327"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2.1123C9.56805 2.1123 8.8125 2.86782 8.8125 3.7998C8.8125 4.73178 9.56805 5.4873 10.5 5.4873C11.4319 5.4873 12.1875 4.73178 12.1875 3.7998C12.1875 2.86782 11.4319 2.1123 10.5 2.1123ZM7.6875 3.7998C7.6875 2.2465 8.94667 0.987305 10.5 0.987305C12.0533 0.987305 13.3125 2.2465 13.3125 3.7998C13.3125 5.35311 12.0533 6.6123 10.5 6.6123C8.94667 6.6123 7.6875 5.35311 7.6875 3.7998Z" fill="#932327"/>
                </svg>              
                Mais filtros
              </a>
              <button class="btn-primary" type="submit">Buscar</button>
            </form>