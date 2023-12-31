<? if (!function_exists('getPdStatus')) {

   function getPdStatus($status)
   {
      switch ($status) {
         case 'aprovado':
            $data['badge'] = "PAGAMENTO APROVADO";
            $data['class'] = "approved";
            break;
         case 'aguardando':
            $data['badge'] = "AGUARDANDO PAGAMENTO";
            $data['class'] = "waiting";
            break;
      }
      return $data;
   }
}

if (!function_exists('setMenuAdminTipo')) {

   function setMenuAdminTipo($tipo)
   {
      switch ($tipo) {
         case 1:
            $menuAdmin = 4;
            break;
         case 2:
            $menuAdmin = 11;
            break;
         case 3:
            $menuAdmin = 12;
            break;
         case 4:
            $menuAdmin = 13;
            break;
         case 5:
            $menuAdmin = 14;
            break;
         case 6:
            $menuAdmin = 15;
            break;
      }

      return $menuAdmin;
   }
}

if (!function_exists('getTipo')) {

   function getTipo($tipo)
   {
       
        $tipoModel = \model('App\Models\TipoModel', false);
        $tipoModel->select('titulo, tipo');
        $result = $tipoModel->find($tipo);
     
           $tipo = $result->titulo;
      
      return $tipo;
   }
}

if (!function_exists('getDateInterval')) {

   function getDateInterval($date)
   {
      $hoje = new Datetime('');
      $dataCriacao = new DateTime($date);

      $interval = $hoje->diff($dataCriacao);
      

      return $interval;
   }
}
