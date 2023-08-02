<aside class="filter" data-aos="fade-up">
   <div class="content">
      <h2><img src="<?= PATHSITE ?>assets/images/icon-filter-circle.svg" alt="ícone filtro">Filtros</h2>
      <hr>
      <form action="<?= PATHSITE ?>projetos/" method="get">
         <div class="wraper">
            <div class="item">
               <h3>Pavimento</h3>
               <ul>
                  <? sort($filtros['pavimentos']);
                  foreach ($filtros['pavimentos'] as $pavimento) { ?>
                     <li>
                        <label>
                           <div class="checkbox">
                              <input type="checkbox" name="pavimento[]" value="<?= $pavimento ?>" <? if ($get['pavimento']) echo in_array($pavimento, $get['pavimento']) ? 'checked' : '' ?> />
                              <svg viewBox="0 0 21 18">
                                 <symbol id="tick-path" viewBox="0 0 21 18" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.22003 7.26C5.72003 7.76 7.57 9.7 8.67 11.45C12.2 6.05 15.65 3.5 19.19 1.69" fill="none" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                                 </symbol>
                                 <defs>
                                    <mask id="tick">
                                       <use class="tick mask" href="#tick-path" />
                                    </mask>
                                 </defs>
                                 <use class="tick" href="#tick-path" stroke="currentColor" />
                                 <path fill="transparent" mask="url(#tick)" d="M18 9C18 10.4464 17.9036 11.8929 17.7589 13.1464C17.5179 15.6054 15.6054 17.5179 13.1625 17.7589C11.8929 17.9036 10.4464 18 9 18C7.55357 18 6.10714 17.9036 4.85357 17.7589C2.39464 17.5179 0.498214 15.6054 0.241071 13.1464C0.0964286 11.8929 0 10.4464 0 9C0 7.55357 0.0964286 6.10714 0.241071 4.8375C0.498214 2.39464 2.39464 0.482143 4.85357 0.241071C6.10714 0.0964286 7.55357 0 9 0C10.4464 0 11.8929 0.0964286 13.1625 0.241071C15.6054 0.482143 17.5179 2.39464 17.7589 4.8375C17.9036 6.10714 18 7.55357 18 9Z" />
                              </svg>
                              <svg class="lines" viewBox="0 0 11 11">
                                 <path d="M5.88086 5.89441L9.53504 4.26746" />
                                 <path d="M5.5274 8.78838L9.45391 9.55161" />
                                 <path d="M3.49371 4.22065L5.55387 0.79198" />
                              </svg>
                           </div>
                           <?= ucfirst($pavimento) ?>
                        </label>
                     </li>
                  <? } ?>
               </ul>
            </div>
            <div class="item">
               <h3>Terrenos</h3>
               <ul class="hStack">
                  <div class="line">
                     <? sort($filtros['loteminimo']);
                     foreach ($filtros['loteminimo'] as $lote) { ?>
                        <li>
                           <label>
                              <div class="checkbox">
                                 <input type="checkbox" name="loteminimo[]" value="<?= $lote ?>" <? if ($get['loteminimo']) echo in_array($lote, $get['loteminimo']) ? 'checked' : '' ?> />
                                 <svg viewBox="0 0 21 18">
                                    <symbol id="tick-path" viewBox="0 0 21 18" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M5.22003 7.26C5.72003 7.76 7.57 9.7 8.67 11.45C12.2 6.05 15.65 3.5 19.19 1.69" fill="none" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                                    </symbol>
                                    <defs>
                                       <mask id="tick">
                                          <use class="tick mask" href="#tick-path" />
                                       </mask>
                                    </defs>
                                    <use class="tick" href="#tick-path" stroke="currentColor" />
                                    <path fill="transparent" mask="url(#tick)" d="M18 9C18 10.4464 17.9036 11.8929 17.7589 13.1464C17.5179 15.6054 15.6054 17.5179 13.1625 17.7589C11.8929 17.9036 10.4464 18 9 18C7.55357 18 6.10714 17.9036 4.85357 17.7589C2.39464 17.5179 0.498214 15.6054 0.241071 13.1464C0.0964286 11.8929 0 10.4464 0 9C0 7.55357 0.0964286 6.10714 0.241071 4.8375C0.498214 2.39464 2.39464 0.482143 4.85357 0.241071C6.10714 0.0964286 7.55357 0 9 0C10.4464 0 11.8929 0.0964286 13.1625 0.241071C15.6054 0.482143 17.5179 2.39464 17.7589 4.8375C17.9036 6.10714 18 7.55357 18 9Z" />
                                 </svg>
                                 <svg class="lines" viewBox="0 0 11 11">
                                    <path d="M5.88086 5.89441L9.53504 4.26746" />
                                    <path d="M5.5274 8.78838L9.45391 9.55161" />
                                    <path d="M3.49371 4.22065L5.55387 0.79198" />
                                 </svg>
                              </div>
                              <?= $lote ?>
                           </label>
                        </li>
                     <? } ?>
                  </div>
               </ul>
            </div>
            <div class="item">
               <h3>Quartos</h3>
               <ul class="hStack">
                  <div class="line">
                     <? sort($filtros['dormitorios']);
                     foreach ($filtros['dormitorios'] as $dormitorio) { ?>
                        <li>
                           <label>
                              <div class="checkbox">
                                 <input type="checkbox" name="dormitorios[]" value="<?= $dormitorio ?>" <? if ($get['dormitorios']) echo in_array($dormitorio, $get['dormitorios']) ? 'checked' : '' ?> />
                                 <svg viewBox="0 0 21 18">
                                    <symbol id="tick-path" viewBox="0 0 21 18" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M5.22003 7.26C5.72003 7.76 7.57 9.7 8.67 11.45C12.2 6.05 15.65 3.5 19.19 1.69" fill="none" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                                    </symbol>
                                    <defs>
                                       <mask id="tick">
                                          <use class="tick mask" href="#tick-path" />
                                       </mask>
                                    </defs>
                                    <use class="tick" href="#tick-path" stroke="currentColor" />
                                    <path fill="transparent" mask="url(#tick)" d="M18 9C18 10.4464 17.9036 11.8929 17.7589 13.1464C17.5179 15.6054 15.6054 17.5179 13.1625 17.7589C11.8929 17.9036 10.4464 18 9 18C7.55357 18 6.10714 17.9036 4.85357 17.7589C2.39464 17.5179 0.498214 15.6054 0.241071 13.1464C0.0964286 11.8929 0 10.4464 0 9C0 7.55357 0.0964286 6.10714 0.241071 4.8375C0.498214 2.39464 2.39464 0.482143 4.85357 0.241071C6.10714 0.0964286 7.55357 0 9 0C10.4464 0 11.8929 0.0964286 13.1625 0.241071C15.6054 0.482143 17.5179 2.39464 17.7589 4.8375C17.9036 6.10714 18 7.55357 18 9Z" />
                                 </svg>
                                 <svg class="lines" viewBox="0 0 11 11">
                                    <path d="M5.88086 5.89441L9.53504 4.26746" />
                                    <path d="M5.5274 8.78838L9.45391 9.55161" />
                                    <path d="M3.49371 4.22065L5.55387 0.79198" />
                                 </svg>
                              </div>
                              <?= $dormitorio ?> Quarto(s)
                           </label>
                        </li>
                     <? } ?>
                  </div>
               </ul>
            </div>
            <div class="item hStack">
               <h3>Banheiros</h3>
               <ul class="hStack">
                  <div class="line">
                     <? sort($filtros['banheiros']);
                     foreach ($filtros['banheiros'] as $banheiro) { ?>
                        <li>
                           <label>
                              <div class="checkbox">
                                 <input type="checkbox" name="banheiros[]" value="<?= $banheiro ?>" <? if ($get['banheiros']) echo in_array($banheiro, $get['banheiros']) ? 'checked' : '' ?> />
                                 <svg viewBox="0 0 21 18">
                                    <symbol id="tick-path" viewBox="0 0 21 18" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M5.22003 7.26C5.72003 7.76 7.57 9.7 8.67 11.45C12.2 6.05 15.65 3.5 19.19 1.69" fill="none" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                                    </symbol>
                                    <defs>
                                       <mask id="tick">
                                          <use class="tick mask" href="#tick-path" />
                                       </mask>
                                    </defs>
                                    <use class="tick" href="#tick-path" stroke="currentColor" />
                                    <path fill="transparent" mask="url(#tick)" d="M18 9C18 10.4464 17.9036 11.8929 17.7589 13.1464C17.5179 15.6054 15.6054 17.5179 13.1625 17.7589C11.8929 17.9036 10.4464 18 9 18C7.55357 18 6.10714 17.9036 4.85357 17.7589C2.39464 17.5179 0.498214 15.6054 0.241071 13.1464C0.0964286 11.8929 0 10.4464 0 9C0 7.55357 0.0964286 6.10714 0.241071 4.8375C0.498214 2.39464 2.39464 0.482143 4.85357 0.241071C6.10714 0.0964286 7.55357 0 9 0C10.4464 0 11.8929 0.0964286 13.1625 0.241071C15.6054 0.482143 17.5179 2.39464 17.7589 4.8375C17.9036 6.10714 18 7.55357 18 9Z" />
                                 </svg>
                                 <svg class="lines" viewBox="0 0 11 11">
                                    <path d="M5.88086 5.89441L9.53504 4.26746" />
                                    <path d="M5.5274 8.78838L9.45391 9.55161" />
                                    <path d="M3.49371 4.22065L5.55387 0.79198" />
                                 </svg>
                              </div>
                              <?= $banheiro ?> Banheiro(s)
                           </label>
                        </li>
                     <? } ?>
                  </div>
               </ul>
            </div>
            <div class="item hStack">
               <h3>Vagas de Garagem</h3>
               <ul class="hStack">
                  <div class="line">
                     <? sort($filtros['vagas']);
                     foreach ($filtros['vagas'] as $vaga) { ?>
                        <li>
                           <label>
                              <div class="checkbox">
                                 <input type="checkbox" name="vagas[]" value="<?= $vaga ?>" <? if ($get['vagas']) echo in_array($vaga, $get['vagas']) ? 'checked' : '' ?> />
                                 <svg viewBox="0 0 21 18">
                                    <symbol id="tick-path" viewBox="0 0 21 18" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M5.22003 7.26C5.72003 7.76 7.57 9.7 8.67 11.45C12.2 6.05 15.65 3.5 19.19 1.69" fill="none" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                                    </symbol>
                                    <defs>
                                       <mask id="tick">
                                          <use class="tick mask" href="#tick-path" />
                                       </mask>
                                    </defs>
                                    <use class="tick" href="#tick-path" stroke="currentColor" />
                                    <path fill="transparent" mask="url(#tick)" d="M18 9C18 10.4464 17.9036 11.8929 17.7589 13.1464C17.5179 15.6054 15.6054 17.5179 13.1625 17.7589C11.8929 17.9036 10.4464 18 9 18C7.55357 18 6.10714 17.9036 4.85357 17.7589C2.39464 17.5179 0.498214 15.6054 0.241071 13.1464C0.0964286 11.8929 0 10.4464 0 9C0 7.55357 0.0964286 6.10714 0.241071 4.8375C0.498214 2.39464 2.39464 0.482143 4.85357 0.241071C6.10714 0.0964286 7.55357 0 9 0C10.4464 0 11.8929 0.0964286 13.1625 0.241071C15.6054 0.482143 17.5179 2.39464 17.7589 4.8375C17.9036 6.10714 18 7.55357 18 9Z" />
                                 </svg>
                                 <svg class="lines" viewBox="0 0 11 11">
                                    <path d="M5.88086 5.89441L9.53504 4.26746" />
                                    <path d="M5.5274 8.78838L9.45391 9.55161" />
                                    <path d="M3.49371 4.22065L5.55387 0.79198" />
                                 </svg>
                              </div>
                              <?= $vaga ?> Vaga(s)
                           </label>
                        </li>
                     <? } ?>
                  </div>
               </ul>
            </div>
            <div class="item hStack">
               <h3>Área Contruída</h3>
               <ul class="hStack">
                  <div class="line">
                     <li>
                        <label>
                           <div class="checkbox">
                              <input type="checkbox" name="areautil[]" value="<=100" <? if ($get['areautil']) echo in_array("<=100", $get['areautil']) ? 'checked' : '' ?> />
                              <svg viewBox="0 0 21 18">
                                 <symbol id="tick-path" viewBox="0 0 21 18" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.22003 7.26C5.72003 7.76 7.57 9.7 8.67 11.45C12.2 6.05 15.65 3.5 19.19 1.69" fill="none" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                                 </symbol>
                                 <defs>
                                    <mask id="tick">
                                       <use class="tick mask" href="#tick-path" />
                                    </mask>
                                 </defs>
                                 <use class="tick" href="#tick-path" stroke="currentColor" />
                                 <path fill="transparent" mask="url(#tick)" d="M18 9C18 10.4464 17.9036 11.8929 17.7589 13.1464C17.5179 15.6054 15.6054 17.5179 13.1625 17.7589C11.8929 17.9036 10.4464 18 9 18C7.55357 18 6.10714 17.9036 4.85357 17.7589C2.39464 17.5179 0.498214 15.6054 0.241071 13.1464C0.0964286 11.8929 0 10.4464 0 9C0 7.55357 0.0964286 6.10714 0.241071 4.8375C0.498214 2.39464 2.39464 0.482143 4.85357 0.241071C6.10714 0.0964286 7.55357 0 9 0C10.4464 0 11.8929 0.0964286 13.1625 0.241071C15.6054 0.482143 17.5179 2.39464 17.7589 4.8375C17.9036 6.10714 18 7.55357 18 9Z" />
                              </svg>
                              <svg class="lines" viewBox="0 0 11 11">
                                 <path d="M5.88086 5.89441L9.53504 4.26746" />
                                 <path d="M5.5274 8.78838L9.45391 9.55161" />
                                 <path d="M3.49371 4.22065L5.55387 0.79198" />
                              </svg>
                           </div>
                           Até 100m²
                        </label>
                     </li>
                     <li>
                        <label>
                           <div class="checkbox">
                              <input type="checkbox" name="areautil[]" value="BETWEEN 100 AND 200" <? if ($get['areautil']) echo in_array("BETWEEN 100 AND 200", $get['areautil']) ? 'checked' : '' ?> />
                              <svg viewBox="0 0 21 18">
                                 <symbol id="tick-path" viewBox="0 0 21 18" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.22003 7.26C5.72003 7.76 7.57 9.7 8.67 11.45C12.2 6.05 15.65 3.5 19.19 1.69" fill="none" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                                 </symbol>
                                 <defs>
                                    <mask id="tick">
                                       <use class="tick mask" href="#tick-path" />
                                    </mask>
                                 </defs>
                                 <use class="tick" href="#tick-path" stroke="currentColor" />
                                 <path fill="transparent" mask="url(#tick)" d="M18 9C18 10.4464 17.9036 11.8929 17.7589 13.1464C17.5179 15.6054 15.6054 17.5179 13.1625 17.7589C11.8929 17.9036 10.4464 18 9 18C7.55357 18 6.10714 17.9036 4.85357 17.7589C2.39464 17.5179 0.498214 15.6054 0.241071 13.1464C0.0964286 11.8929 0 10.4464 0 9C0 7.55357 0.0964286 6.10714 0.241071 4.8375C0.498214 2.39464 2.39464 0.482143 4.85357 0.241071C6.10714 0.0964286 7.55357 0 9 0C10.4464 0 11.8929 0.0964286 13.1625 0.241071C15.6054 0.482143 17.5179 2.39464 17.7589 4.8375C17.9036 6.10714 18 7.55357 18 9Z" />
                              </svg>
                              <svg class="lines" viewBox="0 0 11 11">
                                 <path d="M5.88086 5.89441L9.53504 4.26746" />
                                 <path d="M5.5274 8.78838L9.45391 9.55161" />
                                 <path d="M3.49371 4.22065L5.55387 0.79198" />
                              </svg>
                           </div>
                           De 100 a 200m²
                        </label>
                     </li>
                     <li>
                        <label>
                           <div class="checkbox">
                              <input type="checkbox" name="areautil[]" value="BETWEEN 200 AND 300" <? if ($get['areautil']) echo in_array("BETWEEN 200 AND 300", $get['areautil']) ? 'checked' : '' ?> />
                              <svg viewBox="0 0 21 18">
                                 <symbol id="tick-path" viewBox="0 0 21 18" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.22003 7.26C5.72003 7.76 7.57 9.7 8.67 11.45C12.2 6.05 15.65 3.5 19.19 1.69" fill="none" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                                 </symbol>
                                 <defs>
                                    <mask id="tick">
                                       <use class="tick mask" href="#tick-path" />
                                    </mask>
                                 </defs>
                                 <use class="tick" href="#tick-path" stroke="currentColor" />
                                 <path fill="transparent" mask="url(#tick)" d="M18 9C18 10.4464 17.9036 11.8929 17.7589 13.1464C17.5179 15.6054 15.6054 17.5179 13.1625 17.7589C11.8929 17.9036 10.4464 18 9 18C7.55357 18 6.10714 17.9036 4.85357 17.7589C2.39464 17.5179 0.498214 15.6054 0.241071 13.1464C0.0964286 11.8929 0 10.4464 0 9C0 7.55357 0.0964286 6.10714 0.241071 4.8375C0.498214 2.39464 2.39464 0.482143 4.85357 0.241071C6.10714 0.0964286 7.55357 0 9 0C10.4464 0 11.8929 0.0964286 13.1625 0.241071C15.6054 0.482143 17.5179 2.39464 17.7589 4.8375C17.9036 6.10714 18 7.55357 18 9Z" />
                              </svg>
                              <svg class="lines" viewBox="0 0 11 11">
                                 <path d="M5.88086 5.89441L9.53504 4.26746" />
                                 <path d="M5.5274 8.78838L9.45391 9.55161" />
                                 <path d="M3.49371 4.22065L5.55387 0.79198" />
                              </svg>
                           </div>
                           De 200 a 300m²
                        </label>
                     </li>
                     <li>
                        <label>
                           <div class="checkbox">
                              <input type="checkbox" name="areautil[]" value=">=300" <? if ($get['areautil']) echo in_array(">=300", $get['areautil']) ? 'checked' : '' ?> />
                              <svg viewBox="0 0 21 18">
                                 <symbol id="tick-path" viewBox="0 0 21 18" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.22003 7.26C5.72003 7.76 7.57 9.7 8.67 11.45C12.2 6.05 15.65 3.5 19.19 1.69" fill="none" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" />
                                 </symbol>
                                 <defs>
                                    <mask id="tick">
                                       <use class="tick mask" href="#tick-path" />
                                    </mask>
                                 </defs>
                                 <use class="tick" href="#tick-path" stroke="currentColor" />
                                 <path fill="transparent" mask="url(#tick)" d="M18 9C18 10.4464 17.9036 11.8929 17.7589 13.1464C17.5179 15.6054 15.6054 17.5179 13.1625 17.7589C11.8929 17.9036 10.4464 18 9 18C7.55357 18 6.10714 17.9036 4.85357 17.7589C2.39464 17.5179 0.498214 15.6054 0.241071 13.1464C0.0964286 11.8929 0 10.4464 0 9C0 7.55357 0.0964286 6.10714 0.241071 4.8375C0.498214 2.39464 2.39464 0.482143 4.85357 0.241071C6.10714 0.0964286 7.55357 0 9 0C10.4464 0 11.8929 0.0964286 13.1625 0.241071C15.6054 0.482143 17.5179 2.39464 17.7589 4.8375C17.9036 6.10714 18 7.55357 18 9Z" />
                              </svg>
                              <svg class="lines" viewBox="0 0 11 11">
                                 <path d="M5.88086 5.89441L9.53504 4.26746" />
                                 <path d="M5.5274 8.78838L9.45391 9.55161" />
                                 <path d="M3.49371 4.22065L5.55387 0.79198" />
                              </svg>
                           </div>
                           Mais de 300m²
                        </label>
                     </li>
                  </div>
               </ul>
            </div>
         </div>
         <button type="submit" class="btn-primary">Filtrar</button>
      </form>
   </div>
</aside>