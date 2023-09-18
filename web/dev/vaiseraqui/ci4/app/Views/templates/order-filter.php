<? switch ($ordem) {
   case 'maior':
      $filtro = "Maior preço";
      break;
   case 'menor':
      $filtro = "Menor preço";
      break;
   case 'recentes':
      $filtro = "Mais recentes";
      break;
   case 'antigos':
      $filtro = "Mais antigos";
      break;
   default:
      $filtro = "Mais recentes";
   break;
} ?>

<form method="get" class="form-order">
   <a href="#" class="btn-primary">
      <img src="<?= PATHSITE ?>assets/images/icon-button-filter.svg" alt="icon filter">
      Filtros
   </a>
   <div class="input-order j-input-order-select">
      <label for="order">
         <img src="<?= PATHSITE ?>assets/images/icon-order.svg" alt="">
         <img class="active" src="<?= PATHSITE ?>assets/images/icon-order-active.svg" alt="">
         Ordenar por:
         <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 1L5 5L9 1" stroke="#404041" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
         </svg>
         <svg class="active" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 1L5 5L9 1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
         </svg>
      </label>
      <div class="modal-order">
         <input type="text" readonly value="<?= $filtro ?>">
         <div class="modal-order-select">
            <div class="wraper-scroll">
               <nav class="content">
                  <a data-select-value="Maior preço" href="<?= PATHSITE . $segments[0] ?>?ordem=maior" class="<?= $ordem == 'maior' ? 'active' : '' ?>">Maior preço</a>
                  <a data-select-value="Menor preço" href="<?= PATHSITE . $segments[0] ?>?ordem=menor" class="<?= $ordem == 'menor' ? 'active' : '' ?>">Menor preço</a>
                  <a data-select-value="Mais visto" href="<?= PATHSITE . $segments[0] ?>?ordem=recentes" class="<?= $ordem == 'recentes' ? 'active' : '' ?>">Mais recentes</a>
                  <a data-select-value="Mais perto" href="<?= PATHSITE . $segments[0] ?>?ordem=antigos" class="<?= $ordem == 'antigos' ? 'active' : '' ?>">Mais antigos</a>
               </nav>
            </div>
         </div>
      </div>
   </div>
</form>