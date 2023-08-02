<aside class="filter-mobile" data-aos="fade-up">
   <div class="top">
      <div class="title-with-not-filter">
         <h2>Procurando alguma coisa específica?</h2>
         <p><?= $txFiltro->extra1 ?></p>
      </div>
      <div class="title-with-filter hide">
         <h2>Projetos baseados na sua filtragem</h2>
         <p>Exibindo somente os projetos com base nos filtros selecionados.</p>
      </div>
   </div>
   <div class="bottom">
      <h3>
         <img class="icon-filter" src="./assets/images/icon-filter-circle.svg" alt="">
         <span class="name">Filtros <span class="numberCheckeds"></span></span>
         <button class="icon-checked">
            <svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M1 1.34045L5 5.34045L9 1.34045" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
         </button>
      </h3>
      <form class="form" action="#" method="get">
         <div class="wraper">
            <div class="item open">
               <h3>Pavimento
                  <button>
                     <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 5L5 0.999999L1 5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                     </svg>
                  </button>
               </h3>
               <ul class="open">
               <li><label>
                        <div class="checkbox">
                           <input type="checkbox" name="pavimento[]" value="terreo" />
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
                        Térreo
                     </label></li>
                  <li><label>
                        <div class="checkbox">
                           <input type="checkbox" name="pavimento[]" value="sobrado" />
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
                        Sobrado
                     </label></li>
               </ul>
            </div>
            <div class="item">
               <h3>Terrenos
                  <button>
                     <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 5L5 0.999999L1 5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                     </svg>
                  </button>
               </h3>
               <ul class="hStack">
                  <div class="line">
                     <div class="column">
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              5x20
                           </label></li>
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              10x20
                           </label></li>
                     </div>
                     <div class="column">
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              5x25
                           </label></li>
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              10x25
                           </label></li>
                     </div>
                     <div class="column">
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              6x20
                           </label></li>
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              10x30
                           </label></li>
                     </div>
                     <div class="column">
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              6x25
                           </label></li>
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              12x25
                           </label></li>
                     </div>
                     <div class="column">
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              7x20
                           </label></li>
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              12x30
                           </label></li>
                     </div>
                     <div class="column">
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              7x25
                           </label></li>
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              15x30
                           </label></li>
                     </div>
                     <div class="column">
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              8x20
                           </label></li>
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              20x30
                           </label></li>
                     </div>
                     <div class="column">
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              8x25
                           </label></li>
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              20x40
                           </label></li>
                     </div>
                  </div>
               </ul>
            </div>
            <div class="item">
               <h3>Quartos
                  <button>
                     <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 5L5 0.999999L1 5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                     </svg>
                  </button>
               </h3>
               <ul class="hStack">
                  <div class="line">
                     <div class="column">
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              2 Quartos
                           </label></li>
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              3 Quartos
                           </label></li>
                     </div>
                     <div class="column">
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              4 Quartos
                           </label></li>
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              5+ Quartos
                           </label></li>
                     </div>
                  </div>

               </ul>
            </div>
            <div class="item hStack">
               <h3>Banheiros
                  <button>
                     <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 5L5 0.999999L1 5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                     </svg>
                  </button>
               </h3>
               <ul class="hStack">
                  <div class="line">
                     <div class="column">
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              1 Banheiro
                           </label></li>
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              2 Banheiros
                           </label></li>
                     </div>
                     <div class="column">
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              3+ Banheiros
                           </label></li>
                     </div>
                  </div>
               </ul>
            </div>
            <div class="item hStack">
               <h3>Vagas de Garagem
                  <button>
                     <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 5L5 0.999999L1 5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                     </svg>
                  </button>
               </h3>
               <ul class="hStack">
                  <div class="line">
                     <div class="column">
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              1 Vaga
                           </label></li>
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              2 Vagas
                           </label></li>
                     </div>
                     <div class="column">
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              3 Vagas
                           </label></li>
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                              4+ Vagas
                           </label></li>
                     </div>
                  </div>
               </ul>
            </div>
            <div class="item hStack">
               <h3>Área Contruída
                  <button>
                     <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 5L5 0.999999L1 5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                     </svg>
                  </button>
               </h3>
               <ul class="hStack closed">
                  <div class="line">
                     <div class="column">
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                           </label></li>
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                           </label></li>
                     </div>
                     <div class="column">
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                           </label></li>
                        <li><label>
                              <div class="checkbox">
                                 <input type="checkbox" />
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
                           </label></li>
                     </div>
                  </div>
               </ul>
            </div>
         </div>
         <button type="submit" class="btn-primary">Filtrar</button>
      </form>
   </div>
</aside>