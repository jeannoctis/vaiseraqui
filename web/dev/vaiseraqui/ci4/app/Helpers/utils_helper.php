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
