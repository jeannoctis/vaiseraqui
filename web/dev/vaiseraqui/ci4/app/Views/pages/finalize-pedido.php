  <main>
    <form method="post" action="<?= PATHSITE ?>forma-pagamento/">
    <article>
        <div class="content" id="editarPedido">
        <h1 data-aos="fade-down">Finalize seu pedido</h1>
        <h2 data-aos="fade-down">Projeto selecionado</h2>
        <hr>
        <div class="wraper" data-aos="fade-up">
          <div class="box">
            <div class="item">
              <div class="info">
                <img src="<?=PATHSITE?>assets/images/selected-project.png" alt="" class="cover">
                <div>
                  <div class="left">
                    <button class="close">
                      <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <circle cx="16" cy="16" r="15.5" stroke="#333333" />
                          <rect y="0.537781" width="14.5536" height="0.765978" rx="0.382989" transform="matrix(0.712094 0.702084 -0.712094 0.702084 11.4738 10.3292)" fill="#333333" stroke="#333333" stroke-width="0.765978" />
                          <rect x="0.545449" y="-9.13117e-08" width="14.5536" height="0.765978" rx="0.382989" transform="matrix(0.712094 -0.702084 0.712094 0.702084 10.157 21.1386)" fill="#333333" stroke="#333333" stroke-width="0.765978" />
                      </svg>
                    </button>
                  </div>
                                        
                  <div class="right">
                      <h3><?= $projeto->titulo ?></h3>
                    <p><strong>Incluso:</strong> Projeto Arquitetônico</p>
                      <p class="price">R$ <?= number_format($projeto->valor, 2, ',', '.') ?></p>
                      <input type="hidden" name="projeto" value="<?= $get['projeto'] ?>">
                  </div>

                </div>
              </div>
                <p class="price">R$ <?= number_format($projeto->valor, 2, ',', '.') ?></p>
            </div>
          </div>

          <? if ($adicionais) { ?>
        <h2 data-aos="fade-up">Adicionais</h2>
        <hr>
        <div class="wraper" data-aos="fade-up">
              <div class="box adicionais-cont">
                <? foreach ($adicionais as $adicional) { ?>
            <div class="add-item">

                    <label>
                      <div class="checkbox light">
                          <input type="checkbox" name="adicionais[]" <?= ($get['adicional'] && in_array($adicional->id, $get['adicional'])) ? 'checked' : '' ?> value="<?= $adicional->id ?>" data-checkbox-adicional="<?= $adicional->id ?>" />
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
                    </label>

              <div class="add-info">
                      <h3><?= $adicional->titulo ?></h3>
                      <a href="#" class="more j-button-open-modal" data-adicional="<?= $adicional->id ?>">+ detalhes</a>
              </div>

              <p class="price">R$ <?= number_format($adicional->valor, 2, ',', '.') ?></p>
            </div>
              <? } ?>
          </div>          
        </div>
            <? } ?>

      </div>
    </article>

      <div class="content">
        <aside data-aos="fade-up">
          <div class="wraper">
            <div class="select-group">
              <label for="envio">Como deseja receber o pedido?</label>
              <select onchange="mudaEnvio();" name="envio" id="envio" required>
                <option value="ambos">Via e-mail e Correios</option>
                <option value="email">Via e-mail</option>
              </select>
            </div>
            <div class="select-group">
              <label for="copias">Cópias?</label>
              <select name="copias" id="copias" required data-copies>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </div>
          </div>
          <p>O email com os arquivos do seu projeto será enviado automaticamente após a liberação do pagamento.</p>
          <p><strong>Lembre-se de verificar a caixa de spam ou a lixeira do seu email.</strong></p>
        </aside>
        <div class="box-inputs">
          <div class="left" data-aos="fade-right">
            <h3>Detalhes de faturamento</h3>
            <h4>Dados pessoais</h4>
            <div class="card-input">
              <label for="full-name">Nome Completo</label>
              <input value="<?=$clienteLogado->nome?> <?=$clienteLogado->sobrenome?>" type="text" name="nome" id="full-name" placeholder="Digite aqui" required>
            </div>
            <div class="card-input">
              <label for="cpf">CPF</label>
              <input value="<?=$clienteLogado->cpf?>" name="cpf" type="text" maxlength="15" class="cpf"  id="cpf" placeholder="Digite aqui" required>
            </div>
            <div class="card-input">
              <label for="email">E-mail</label>
              <input value="<?=$clienteLogado->email?>" type="email" name="email" id="email" placeholder="Digite aqui" required>
            </div>
            <div class="card-input">
              <label for="phone">Telefone</label>
              <input value="<?=$clienteLogado->telefone?>" type="text" maxlength="16" class="phone" name="telefone" id="phone" placeholder="Digite aqui" required>
            </div>

            <h4 class="title">Informações de Endereço</h4>
            <div class="card-input">
              <label for="cep">CEP</label>
              <input onblur="buscaCep($('#cep').val())" type="text" name="cep" maxlength="9" class="cep" id="cep" placeholder="Digite aqui" required>
            </div>
            <div class="card-input">
              <label for="endereco">Endereço</label>
              <input type="text" name="endereco" id="endereco" placeholder="Digite aqui" required>
            </div>
            <div class="card-input">
              <label for="numero">Número</label>
              <input type="text" name="numero" id="numero" placeholder="Digite aqui" required>
            </div>
            <div class="card-input">
              <label for="complemento">Complemento</label>
              <input type="text" name="complemento" id="complemento" placeholder="Digite aqui" >
            </div>
            <div class="card-input">
              <label for="bairro">Bairro</label>
              <input type="text" name="bairro" id="bairro" placeholder="Digite aqui" required>
            </div>
            <div class="card-input">
              <label for="cidade">Cidade</label>
              <input type="text" name="cidade" id="cidade" placeholder="Digite aqui" required>
            </div>
            <div class="card-input">
              <label for="estado">Estado</label>
              <? if ($estados) { ?>
                <select name="estado" id="estado" required>
                  <? foreach ($estados as $estado) { ?>
                    <option value="<?= $estado->sigla ?>"><?= $estado->titulo ?></option>
                  <? } ?>
              </select>
              <? } ?>
            </div>
          </div>

          <div class="right" data-aos="fade-left">
            <div class="box">
              <h2>Resumo do Pedido</h2>
              <div class="table">
                <h3><span>Projeto</span> <span>Valores</span></h3>
                <h4><span class="name"><?= $projeto->titulo ?></span> <span class="price">R$ <span id="valorProjeto"><?= number_format($projeto->valor, 2, ",", ".") ?></span></span></h4>
                <ul id="resumo-adicionais">
                  <li><span><img src="<?=PATHSITE?>assets/images/icon-chevron-li.svg" alt=""> Projeto Arquitetônico</span></li>
                  <? if ($adicionais) {
                    foreach ($adicionais as $adicional) { ?>
                      <li data-adicional-escolhido="<?= $adicional->id ?>">
                        <span>
                          <img src="<?=PATHSITE?>assets/images/icon-chevron-li.svg" alt=""> <?= $adicional->titulo ?>
                        </span>
                        <span class="price">R$ <span class="valorAdicional"><?= number_format($adicional->valor, 2, ",", ".") ?></span></span>
                      </li>
                      <input type="hidden" name="adicional[]" value="<?= $adicional->id ?>" />
                  <? }
                  } ?>
                </ul>              
                <h4><span class="name">Entrega via <span id="metodoEnvio"></span></span> <span class="price"> <span id="valorEnvio">Cálculo a seguir</span></span></h4>
                <h4><span class="name">Impressão (<span id="quantidadeCopias"></span> cópias)</span> <span class="price">R$ <span id="valorCopias"></span></span></h4>
                
                <hr>
                <footer>
                  <span>Total</span>
                  <span>R$ <span id="totalCompra">Calculando...</span></span>
                </footer>
              </div>
              <div class="terms">
                <label>
                  <div class="checkbox">
                    <input type="checkbox" required />
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
                </label>
                <p>Li e concordo com os <a style="color: #000;" target="_blank" href="<?= PATHSITE ?>termos-de-uso/"><strong>Termos de Uso</strong></a> e
                  <a style="color: #000;" target="_blank" href="<?= PATHSITE ?>politica-de-privacidade/"><strong>Políticas de Privacidade</strong></a>
                  </p>
              </div>
              <a href="#editarPedido">
                <button type="button" class="btn-outline">
                  <span>Editar</span>
                </button>
              </a>
              <a href="<?= PATHSITE ?>forma-pagamento/">
              <button class="btn-primary">Ir para o pagamento</button>
              </a>
              <a href="<?= PATHSITE ?>forma-pagamento/">
              <button class="btn-primary only-mobile">Comprar</button>
              </a>
            </div>
          </div>
        </div>
      </div>

    </form>
  </main>

<? if (!empty($adicionais)) { ?>
   <? foreach ($adicionais as $adicional) { ?>
      <div class="modal-project" data-adicional="<?= $adicional->id ?>">
         <div class="modal-project-content">
          <div class="body">
               <h3 class="subtitle">
                  <span>Mais detalhes do adicional</span>
                  <svg class="j-button-close" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <rect y="0.702084" width="21.9795" height="1.29795" rx="0.648975" transform="matrix(0.712094 0.702084 -0.712094 0.702084 2.13667 0.463068)" fill="#333333" stroke="#333333" />
                     <rect x="0.712094" y="-1.19209e-07" width="21.9795" height="1.29795" rx="0.648975" transform="matrix(0.712094 -0.702084 0.712094 0.702084 0.205016 16.6337)" fill="#333333" stroke="#333333" />
                  </svg>
               </h3>
               <h2 class="title"><?= $adicional->titulo ?></h2>
               <p><?= $adicional->texto ?></p>
               <h3 class="subtitle-2">Imagem de Exemplo</h3>
               <img src="<?= PATHSITE ?>uploads/pj_adicional/<?= $adicional->arquivo ?>" alt="imagem exemplo do serviço adicional" class="cover" loading="lazy">
            </div>
         </div>
      </div>
   <? } ?>
<? } ?>


  <script>
    // ********** Mapeamento **********
    const valorProjeto = document.querySelector("#valorProjeto");
    const valorCopias = document.querySelector("#valorCopias");
    const valoresAdicionais = document.querySelectorAll(".valorAdicional");
    const totalCompra = document.querySelector("#totalCompra")    

    const selectEnvio = document.querySelector("#envio")
    const metodoEnvio = document.querySelector("#metodoEnvio")

    const unidadeCopia = <?= $projeto->impressao ?>;
    const selectCopias = document.querySelector("[data-copies]");
    const quantidadeCopias = document.querySelector("#quantidadeCopias");

    const adicionaisLista = document.querySelectorAll(".adicionais-cont input[type=checkbox]");
    const adicionaisEscolhidos = document.querySelectorAll("#resumo-adicionais li[data-adicional-escolhido]");

    // ********** Eventos **********
    if (adicionaisLista) {
      adicionaisLista.forEach(input => {
        input.addEventListener("change", e => {
          toggleAdicional(e.target);
          calcularTotal()
        })
        toggleAdicional(input);
      })
    }

    selectCopias.addEventListener("change", e => {
      calcularCopias()
      calcularTotal()
      console.log("entrou")
    });

    selectEnvio.addEventListener("change", atualizarEnvio)
                
    window.onload = function (){
      calcularCopias();
      calcularTotal()
    }

    // ********** Funções **********
    function strToNumber(string) {
      return +string.replace('.', '').replace(',', '.')
    }

    function calcularTotal() {
      const valorProjetoValue = strToNumber(valorProjeto.innerHTML)
      const valorCopiasValue = strToNumber(valorCopias.innerHTML)
      let extras = 0
      
      valoresAdicionais.forEach(item => {
        if (item.closest("li").style.display == "flex") {
          extras += strToNumber(item.innerHTML)
        }
      })

      const total = valorProjetoValue + valorCopiasValue + extras;
      
      console.log(total);

      totalCompra.innerHTML = total.toLocaleString('pt-BR', {
        minimumFractionDigits: 2
      });
    }

    function toggleAdicional(input) {
      const displayStyle = input.checked ? "flex" : "none";

      adicionaisEscolhidos.forEach(item => {
        if (input.dataset.checkboxAdicional == item.dataset.adicionalEscolhido) {
          item.style.display = displayStyle;
        }
      });
    }

    function calcularCopias(e) {
      quantidadeCopias.innerHTML = selectCopias.value;
      valorCopias.innerHTML = (selectCopias.value * unidadeCopia).toLocaleString('pt-BR', {
        minimumFractionDigits: 2
      })
    }

    function atualizarEnvio(e) {
      const options = Array.from(selectCopias.options);
      const value = e.target.value

      if (value == "email") {
        metodoEnvio.textContent = "email"
        selectCopias.value = "1";
        selectCopias.dispatchEvent(new Event("change"))

        options.slice(1).forEach((item, index) => {

          item.disabled = true
          item.style.color = "lightgray"
          
        })
      } else if (value == "ambos") {
        metodoEnvio.textContent = "email e SEDEX"

        options.forEach(item => {

          item.disabled = false
          item.style.color = "black"

        })
      }
      calcularTotal()
    }
  </script>
