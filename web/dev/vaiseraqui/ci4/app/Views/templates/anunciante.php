 <? 
 if ($anunciante) { ?>
            <div class="box-anunciante">
              <img src="<?= PATHSITE ?>uploads/anunciante/<?= $anunciante->arquivo ?>" alt="">
              <div>
                <span class="type">Responsável pelo anúncio</span>
                <span class="title"><?= $anunciante->titulo ?></span>
                <ul>
                  <? if ($anunciante->telefone) { ?>
                    <li>
                      <a onclick="abreWhatsapp('<?=encode($metatag->id)?>');" target="_blank" href="<?= $anunciante->whatsapp ?>">
                        <img src="<?= PATHSITE ?>assets/images/icon-whatsapp-black.svg" alt="">
                        <span><?= $anunciante->telefone ?></span>
                      </a>
                    </li>
                  <? } ?>
                  <? if ($anunciante->telefone2) { ?>
                    <li>
                      <a onclick="abreWhatsapp('<?=encode($metatag->id)?>');" target="_blank" href="<?= $anunciante->whatsapp2 ?>">
                        <img src="<?= PATHSITE ?>assets/images/icon-whatsapp-black.svg" alt="">
                        <span><?= $anunciante->telefone2 ?></span>
                      </a>
                    </li>
                  <? } ?>
                  <? if ($anunciante->telefone3) { ?>
                    <li>
                      <a onclick="abreWhatsapp('<?=encode($metatag->id)?>');" target="_blank" href="<?= $anunciante->whatsapp3 ?>">
                        <img src="<?= PATHSITE ?>assets/images/icon-whatsapp-black.svg" alt="">
                        <span><?= $anunciante->telefone3 ?></span>
                      </a>
                    </li>
                  <? } ?>
                </ul>
              </div>
            </div>
          <? } ?>