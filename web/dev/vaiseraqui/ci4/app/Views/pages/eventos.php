
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
          <a href="#">Eventos</a>
        </nav>
        
          <? if($diasMes){?>
        <div class="calendar-swiper-navigation-wraper" data-aos="fade-up">        
          <div class="swiper box-days menu-abas swiper-agenda">
            <div class="swiper-wrapper">
                <? foreach($diasMes as $ind => $dia) {
                  $diaAtual =  explode("-",$dia->data);
                    ?> 
              <div class="swiper-slide">
                <a onclick="eventosData('<?=$dia->data?>')" href="#" class="<?=($ind) ? '' : 'active'?>" data-btn="<?=$dia->data?>">
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
          <? } ?>
        <a style="display: none;" href="#" class="btn-primary d" data-aos="fade-up">
          <img src="<?=PATHSITE?>assets/images/icon-calendar.svg" alt="Icon calendar">
          visualizar calendário
        </a>
        <div class="menu-wraper" data-aos="fade-up">
          <div class="item show" data-modal="06/10/2023">
            <div class="events-with-data j-calendar-columns">
              <div class="column">
                <h3>Festas</h3>
                <div class="scroll-h">
                  <div class="wraper">
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-1.png);">
                      <h4>Open Winter Festival</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Represa Sendeski <br>
                          Maringá - PR
                        </span>
                      </div>
                      <a href="#">Mais detalhes <img src="<?=PATHSITE?>assets/images/icon-arrow-right.svg" alt=""></a>
                    </div>
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-2.png);">
                      <h4>JOIA 2023</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Vila Olímpica <br>
                          Maringá - PR
                        </span>
                      </div>            
                    </div>
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-3.png);">
                      <h4>Festa das Nações</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Praça da prefeitura <br>
                          Maringá - PR
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Shows</h3>
                <div class="wraper">
                  <div class="empty">
                    <img src="<?=PATHSITE?>assets/images/icon-calendar-not-available.svg" alt="">
                    <span>
                      Nenhum evento cadastrado <br>
                      nesta sessão para o dia de hoje.
                    </span>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Cultura</h3>
                <div class="wraper">
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-cultura-1.png);">
                    <h4>Nativos</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Teatro Calil Haddad <br>
                        Maringá - PR
                      </span>
                    </div>
                  </div>
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-cultura-2.png);">
                    <h4>TEDx Maringá</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Unicesumar <br>
                        Maringá - PR
                      </span>
                    </div>            
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Gastronomia</h3>
                <div class="wraper">
                  <div class="empty">
                    <img src="<?=PATHSITE?>assets/images/icon-calendar-not-available.svg" alt="">
                    <span>
                      Nenhum evento cadastrado <br>
                      nesta sessão para o dia de hoje.
                    </span>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Esporte</h3>
                <div class="wraper">
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-esporte-1.png);">
                    <h4>Maringá FC x <br> Patrocinense</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Estádio Willie Davids <br>
                        Maringá - PR
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item" data-modal="07/10/2023">
            <div class="events-with-data j-calendar-columns">
              <div class="column">
                <h3>Festas</h3>
                <div class="scroll-h">
                  <div class="wraper">
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-1.png);">
                      <h4>Open Winter Festival</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Represa Sendeski <br>
                          Maringá - PR
                        </span>
                      </div>
                      <a href="#">Mais detalhes <img src="<?=PATHSITE?>assets/images/icon-arrow-right.svg" alt=""></a>
                    </div>
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-2.png);">
                      <h4>JOIA 2023</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Vila Olímpica <br>
                          Maringá - PR
                        </span>
                      </div>            
                    </div>
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-3.png);">
                      <h4>Festa das Nações</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Praça da prefeitura <br>
                          Maringá - PR
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Shows</h3>
                <div class="wraper">
                  <div class="empty">
                    <img src="<?=PATHSITE?>assets/images/icon-calendar-not-available.svg" alt="">
                    <span>
                      Nenhum evento cadastrado <br>
                      nesta sessão para o dia de hoje.
                    </span>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Cultura</h3>
                <div class="wraper">
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-cultura-1.png);">
                    <h4>Nativos</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Teatro Calil Haddad <br>
                        Maringá - PR
                      </span>
                    </div>
                  </div>
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-cultura-2.png);">
                    <h4>TEDx Maringá</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Unicesumar <br>
                        Maringá - PR
                      </span>
                    </div>            
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Gastronomia</h3>
                <div class="wraper">
                  <div class="empty">
                    <img src="<?=PATHSITE?>assets/images/icon-calendar-not-available.svg" alt="">
                    <span>
                      Nenhum evento cadastrado <br>
                      nesta sessão para o dia de hoje.
                    </span>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Esporte</h3>
                <div class="wraper">
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-esporte-1.png);">
                    <h4>Maringá FC x <br> Patrocinense</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Estádio Willie Davids <br>
                        Maringá - PR
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item" data-modal="08/10/2023">
            <div class="events-with-data j-calendar-columns">
              <div class="column">
                <h3>Festas</h3>
                <div class="scroll-h">
                  <div class="wraper">
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-1.png);">
                      <h4>Open Winter Festival</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Represa Sendeski <br>
                          Maringá - PR
                        </span>
                      </div>
                      <a href="#">Mais detalhes <img src="<?=PATHSITE?>assets/images/icon-arrow-right.svg" alt=""></a>
                    </div>
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-2.png);">
                      <h4>JOIA 2023</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Vila Olímpica <br>
                          Maringá - PR
                        </span>
                      </div>            
                    </div>
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-3.png);">
                      <h4>Festa das Nações</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Praça da prefeitura <br>
                          Maringá - PR
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Shows</h3>
                <div class="wraper">
                  <div class="empty">
                    <img src="<?=PATHSITE?>assets/images/icon-calendar-not-available.svg" alt="">
                    <span>
                      Nenhum evento cadastrado <br>
                      nesta sessão para o dia de hoje.
                    </span>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Cultura</h3>
                <div class="wraper">
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-cultura-1.png);">
                    <h4>Nativos</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Teatro Calil Haddad <br>
                        Maringá - PR
                      </span>
                    </div>
                  </div>
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-cultura-2.png);">
                    <h4>TEDx Maringá</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Unicesumar <br>
                        Maringá - PR
                      </span>
                    </div>            
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Gastronomia</h3>
                <div class="wraper">
                  <div class="empty">
                    <img src="<?=PATHSITE?>assets/images/icon-calendar-not-available.svg" alt="">
                    <span>
                      Nenhum evento cadastrado <br>
                      nesta sessão para o dia de hoje.
                    </span>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Esporte</h3>
                <div class="wraper">
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-esporte-1.png);">
                    <h4>Maringá FC x <br> Patrocinense</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Estádio Willie Davids <br>
                        Maringá - PR
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item" data-modal="09/10/2023">
            <div class="events-with-data j-calendar-columns">
              <div class="column">
                <h3>Festas</h3>
                <div class="scroll-h">
                  <div class="wraper">
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-1.png);">
                      <h4>Open Winter Festival</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Represa Sendeski <br>
                          Maringá - PR
                        </span>
                      </div>
                      <a href="#">Mais detalhes <img src="<?=PATHSITE?>assets/images/icon-arrow-right.svg" alt=""></a>
                    </div>
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-2.png);">
                      <h4>JOIA 2023</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Vila Olímpica <br>
                          Maringá - PR
                        </span>
                      </div>            
                    </div>
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-3.png);">
                      <h4>Festa das Nações</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Praça da prefeitura <br>
                          Maringá - PR
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Shows</h3>
                <div class="wraper">
                  <div class="empty">
                    <img src="<?=PATHSITE?>assets/images/icon-calendar-not-available.svg" alt="">
                    <span>
                      Nenhum evento cadastrado <br>
                      nesta sessão para o dia de hoje.
                    </span>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Cultura</h3>
                <div class="wraper">
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-cultura-1.png);">
                    <h4>Nativos</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Teatro Calil Haddad <br>
                        Maringá - PR
                      </span>
                    </div>
                  </div>
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-cultura-2.png);">
                    <h4>TEDx Maringá</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Unicesumar <br>
                        Maringá - PR
                      </span>
                    </div>            
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Gastronomia</h3>
                <div class="wraper">
                  <div class="empty">
                    <img src="<?=PATHSITE?>assets/images/icon-calendar-not-available.svg" alt="">
                    <span>
                      Nenhum evento cadastrado <br>
                      nesta sessão para o dia de hoje.
                    </span>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Esporte</h3>
                <div class="wraper">
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-esporte-1.png);">
                    <h4>Maringá FC x <br> Patrocinense</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Estádio Willie Davids <br>
                        Maringá - PR
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item" data-modal="10/10/2023">
            <div class="events-with-data j-calendar-columns">
              <div class="column">
                <h3>Festas</h3>
                <div class="scroll-h">
                  <div class="wraper">
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-1.png);">
                      <h4>Open Winter Festival</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Represa Sendeski <br>
                          Maringá - PR
                        </span>
                      </div>
                      <a href="#">Mais detalhes <img src="<?=PATHSITE?>assets/images/icon-arrow-right.svg" alt=""></a>
                    </div>
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-2.png);">
                      <h4>JOIA 2023</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Vila Olímpica <br>
                          Maringá - PR
                        </span>
                      </div>            
                    </div>
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-3.png);">
                      <h4>Festa das Nações</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Praça da prefeitura <br>
                          Maringá - PR
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Shows</h3>
                <div class="wraper">
                  <div class="empty">
                    <img src="<?=PATHSITE?>assets/images/icon-calendar-not-available.svg" alt="">
                    <span>
                      Nenhum evento cadastrado <br>
                      nesta sessão para o dia de hoje.
                    </span>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Cultura</h3>
                <div class="wraper">
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-cultura-1.png);">
                    <h4>Nativos</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Teatro Calil Haddad <br>
                        Maringá - PR
                      </span>
                    </div>
                  </div>
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-cultura-2.png);">
                    <h4>TEDx Maringá</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Unicesumar <br>
                        Maringá - PR
                      </span>
                    </div>            
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Gastronomia</h3>
                <div class="wraper">
                  <div class="empty">
                    <img src="<?=PATHSITE?>assets/images/icon-calendar-not-available.svg" alt="">
                    <span>
                      Nenhum evento cadastrado <br>
                      nesta sessão para o dia de hoje.
                    </span>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Esporte</h3>
                <div class="wraper">
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-esporte-1.png);">
                    <h4>Maringá FC x <br> Patrocinense</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Estádio Willie Davids <br>
                        Maringá - PR
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item" data-modal="11/10/2023">
            <div class="events-with-data j-calendar-columns">
              <div class="column">
                <h3>Festas</h3>
                <div class="scroll-h">
                  <div class="wraper">
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-1.png);">
                      <h4>Open Winter Festival</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Represa Sendeski <br>
                          Maringá - PR
                        </span>
                      </div>
                      <a href="#">Mais detalhes <img src="<?=PATHSITE?>assets/images/icon-arrow-right.svg" alt=""></a>
                    </div>
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-2.png);">
                      <h4>JOIA 2023</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Vila Olímpica <br>
                          Maringá - PR
                        </span>
                      </div>            
                    </div>
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-3.png);">
                      <h4>Festa das Nações</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Praça da prefeitura <br>
                          Maringá - PR
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Shows</h3>
                <div class="wraper">
                  <div class="empty">
                    <img src="<?=PATHSITE?>assets/images/icon-calendar-not-available.svg" alt="">
                    <span>
                      Nenhum evento cadastrado <br>
                      nesta sessão para o dia de hoje.
                    </span>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Cultura</h3>
                <div class="wraper">
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-cultura-1.png);">
                    <h4>Nativos</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Teatro Calil Haddad <br>
                        Maringá - PR
                      </span>
                    </div>
                  </div>
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-cultura-2.png);">
                    <h4>TEDx Maringá</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Unicesumar <br>
                        Maringá - PR
                      </span>
                    </div>            
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Gastronomia</h3>
                <div class="wraper">
                  <div class="empty">
                    <img src="<?=PATHSITE?>assets/images/icon-calendar-not-available.svg" alt="">
                    <span>
                      Nenhum evento cadastrado <br>
                      nesta sessão para o dia de hoje.
                    </span>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Esporte</h3>
                <div class="wraper">
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-esporte-1.png);">
                    <h4>Maringá FC x <br> Patrocinense</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Estádio Willie Davids <br>
                        Maringá - PR
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item" data-modal="12/10/2023">
            <div class="events-with-data j-calendar-columns">
              <div class="column">
                <h3>Festas</h3>
                <div class="scroll-h">
                  <div class="wraper">
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-1.png);">
                      <h4>Open Winter Festival</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Represa Sendeski <br>
                          Maringá - PR
                        </span>
                      </div>
                      <a href="#">Mais detalhes <img src="<?=PATHSITE?>assets/images/icon-arrow-right.svg" alt=""></a>
                    </div>
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-2.png);">
                      <h4>JOIA 2023</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Vila Olímpica <br>
                          Maringá - PR
                        </span>
                      </div>            
                    </div>
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-3.png);">
                      <h4>Festa das Nações</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Praça da prefeitura <br>
                          Maringá - PR
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Shows</h3>
                <div class="wraper">
                  <div class="empty">
                    <img src="<?=PATHSITE?>assets/images/icon-calendar-not-available.svg" alt="">
                    <span>
                      Nenhum evento cadastrado <br>
                      nesta sessão para o dia de hoje.
                    </span>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Cultura</h3>
                <div class="wraper">
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-cultura-1.png);">
                    <h4>Nativos</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Teatro Calil Haddad <br>
                        Maringá - PR
                      </span>
                    </div>
                  </div>
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-cultura-2.png);">
                    <h4>TEDx Maringá</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Unicesumar <br>
                        Maringá - PR
                      </span>
                    </div>            
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Gastronomia</h3>
                <div class="wraper">
                  <div class="empty">
                    <img src="<?=PATHSITE?>assets/images/icon-calendar-not-available.svg" alt="">
                    <span>
                      Nenhum evento cadastrado <br>
                      nesta sessão para o dia de hoje.
                    </span>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Esporte</h3>
                <div class="wraper">
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-esporte-1.png);">
                    <h4>Maringá FC x <br> Patrocinense</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Estádio Willie Davids <br>
                        Maringá - PR
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item" data-modal="13/10/2023">
            <div class="events-with-data j-calendar-columns">
              <div class="column">
                <h3>Festas</h3>
                <div class="scroll-h">
                  <div class="wraper">
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-1.png);">
                      <h4>Open Winter Festival</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Represa Sendeski <br>
                          Maringá - PR
                        </span>
                      </div>
                      <a href="#">Mais detalhes <img src="<?=PATHSITE?>assets/images/icon-arrow-right.svg" alt=""></a>
                    </div>
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-2.png);">
                      <h4>JOIA 2023</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Vila Olímpica <br>
                          Maringá - PR
                        </span>
                      </div>            
                    </div>
                    <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-festa-3.png);">
                      <h4>Festa das Nações</h4>
                      <div class="box-address">
                        <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                        <span>
                          Praça da prefeitura <br>
                          Maringá - PR
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Shows</h3>
                <div class="wraper">
                  <div class="empty">
                    <img src="<?=PATHSITE?>assets/images/icon-calendar-not-available.svg" alt="">
                    <span>
                      Nenhum evento cadastrado <br>
                      nesta sessão para o dia de hoje.
                    </span>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Cultura</h3>
                <div class="wraper">
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-cultura-1.png);">
                    <h4>Nativos</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Teatro Calil Haddad <br>
                        Maringá - PR
                      </span>
                    </div>
                  </div>
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-cultura-2.png);">
                    <h4>TEDx Maringá</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Unicesumar <br>
                        Maringá - PR
                      </span>
                    </div>            
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Gastronomia</h3>
                <div class="wraper">
                  <div class="empty">
                    <img src="<?=PATHSITE?>assets/images/icon-calendar-not-available.svg" alt="">
                    <span>
                      Nenhum evento cadastrado <br>
                      nesta sessão para o dia de hoje.
                    </span>
                  </div>
                </div>
              </div>
              <div class="column">
                <h3>Esporte</h3>
                <div class="wraper">
                  <div class="item" style="background-image: url(<?=PATHSITE?>assets/images/bg-esporte-1.png);">
                    <h4>Maringá FC x <br> Patrocinense</h4>
                    <div class="box-address">
                      <img src="<?=PATHSITE?>assets/images/icon-map.svg" alt="">
                      <span>
                        Estádio Willie Davids <br>
                        Maringá - PR
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>        
        </div>
      </div>
    </section>
    
      <? if($destaques) {?>
      <section class="s-featured-events" id="eventos-featured">
      <?= View('templates/eventos-destaque', $destaques)?>
    </section>
      <? } ?>
  </main>
 

  <script type="module" src="<?=PATHSITE?>assets/scripts/controller-page-internal-3.js"></script>
