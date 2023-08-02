<?php
 echo 3;

if ($bannerPrincipal) {
    foreach ($bannerPrincipal as $ind => $valor) {
        if ($valor->tipo == 'D') {
            $temDesktop = TRUE;
        }
        if ($valor->tipo == 'R') {
            $temResponsivo = TRUE;
        }
    }
}
if ($temDesktop) {
    ?>   
    <div id="inicio"></div>
    <div  class="container-fluid d-none d-sm-none d-md-none d-lg-block d-xl-block paddingZero paddingZero-M" id="bannerPrincipal"> 
        <div class="row no-gutters">   
            <div class="col-12 paddingZero paddingZero-M">  
                <div class="bxsliderBanner royalSlider heroSlider rsMinW">
                    <?
                    if ($bannerPrincipal) {
                        foreach ($bannerPrincipal as $ind => $valor) {
                            if ($valor->tipo == 'D') {
                                ?>             
                                <div class="rsContent">
                                    <? if ($valor->link) { ?>
                                        <a onclick="cliqueBanner(<?= $valor->id ?>);" target="<?= $valor->target ?>" href="<?= $valor->link ?>">      
                                        <? } ?>
                                        <div >
                                            <img title="<?= $configs->titulo ?>" alt="<?= $configs->titulo ?>"  class="img-responsive full"  src="<?= PATHSITE ?>uploads/banner/<?= $valor->arquivo ?>" title="<?= $valor->titulo ?> - <?= $configs->nome ?>" alt="<?= $valor->titulo ?> - <?= $configs->nome ?>">     
                                        </div>
                                        <? if ($valor->link) { ?>
                                        </a>
                                    <? } ?>
                                </div>
                                <?
                            }
                        }
                    }
                    ?>  
                </div>
            </div>
        </div>
    </div>
<? } ?>

<? if ($temResponsivo) { ?>
    <div class="container-fluid d-block d-xs-block d-sm-block d-md-block d-lg-none d-xl-none paddingZeroMobile" id="bannerPrincipal2"> 
        <div class="row no-gutters">   
            <div class="col-12 paddingZero">  
                <div class="bxsliderBanner royalSlider heroSlider rsMinW">
                    <?
                    if ($bannerPrincipal) {
                        foreach ($bannerPrincipal as $ind => $valor) {
                            if ($valor->tipo == 'R') {
                                ?>             
                                <div class="rsContent">
                                    <? if ($valor->link) { ?>
                                        <a  onclick="cliqueBanner(<?= $valor->id ?>);" target="<?= $valor->target ?>" href="<?= $valor->link ?>">      
                                        <? } ?>
                                        <div >
                                            <img title="<?= $configs->titulo ?>" alt="<?= $configs->titulo ?>"  class="img-responsive full"  src="<?= PATHSITE ?>uploads/banner/<?= $valor->arquivo ?>" title="<?= $valor->titulo ?> - <?= $configs->nome ?>" alt="<?= $valor->titulo ?> - <?= $configs->nome ?>">     
                                        </div>
                                        <? if ($valor->link) { ?>
                                        </a>
                                    <? } ?>
                                </div>
                                <?
                            }
                        }
                    }
                    ?>  
                </div>
            </div>
        </div>
    </div>
<? } ?>

