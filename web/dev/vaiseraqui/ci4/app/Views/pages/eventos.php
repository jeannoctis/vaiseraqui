  <main>
    <section class="s-callendar my-callendar" id="calendar">
      <div class="container-medium">
        <nav class="breadcrumbs" data-aos="fade-up">
          <span>Início</span>
          <a href="#">
            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1 13L7 7L1 0.999999" stroke="#404041" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>              
          </a>
          <a href="<?=PATHSITE?>eventos/">Eventos</a>
        </nav>
        
      
        <div class="calendar-swiper-navigation-wraper" data-aos="fade-up">        
          <div class="swiper box-days menu-abas swiper-agenda">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                <a onclick="eventosData('<?=date("Y-m-d")?>')" href="#" class="active" data-btn="<?=$dia->data?>">
                  <span class="name"><?=semana(date("Y-m-d"))?></span>
                  <span class="day"><?= date("d") ?></span>
                  <span class="month"><?=mes(date("m"))?></span>
                </a>
              </div>
                <? foreach($diasMes as $ind => $dia) {
                  $diaAtual =  explode("-",$dia->data);
                    ?> 
              <div class="swiper-slide">
                <a onclick="eventosData('<?=$dia->data?>')" href="#" class="" data-btn="<?=$dia->data?>">
                  <span class="name"><?=semana($dia->data)?></span>
                  <span class="day"><?=$diaAtual[2]?></span>
                  <span class="month"><?=mes($diaAtual[1])?></span>
                </a>
              </div>
                <? } ?>  
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>                  
          </div>
          <button class="prev">
            <svg class="active" width="14" height="27" viewBox="0 0 14 27" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2L2 13.5L12 25" stroke="#932327" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>              
            <svg width="14" height="27" viewBox="0 0 14 27" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2L2 13.5L12 25" stroke="#BBBBBB" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>              
          </button>
          <button class="next active">
            <svg class="active" width="14" height="27" viewBox="0 0 14 27" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M2 25L12 13.5L2 2" stroke="#932327" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>  
            <svg width="14" height="27" viewBox="0 0 14 27" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M2 25L12 13.5L2 2" stroke="#BBBBBB" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>                          
          </button>
        </div>
         
        <a style="display: none;" href="#" class="btn-primary d" data-aos="fade-up">
          <img src="<?=PATHSITE?>assets/images/icon-calendar.svg" alt="Icon calendar">
          visualizar calendário
        </a>
        <div id="categoria-eventos" class="menu-wraper" data-aos="fade-up">          
        </div>
      </div>
    </section>
    
      <? if($destaques) {?>
      <section class="s-featured-events" id="eventos-featured">
      <?= View('templates/eventos-destaque', $destaques)?>
    </section>
      <? } ?>
  </main>
 