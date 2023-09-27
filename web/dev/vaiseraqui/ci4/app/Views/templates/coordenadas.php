

<script>
    
   function esconderMostrarPins() {
       var bounds = map.getBounds();
      
        for (var i = 0; i < locations.length; i++) {
            
       if(bounds.contains( markers[i]._latlng ) ) {
            $(".coord-"+markers[i].identificador).show();
       } else {
           $(".coord-"+markers[i].identificador).hide();
       }
        }
   }
    
  <? if (is_array($coordenadas)) { ?>
      var markers = [];
    var map = new L.Map('map', {
      center: [0, 0],
      zoom: 0,
      layers: [
        new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          'attribution': 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
        })
      ]
    });

    map.setView([<?= array_values($coordenadas)[0]["coord"] ?>], 12);

 map.on('zoomend',function(e){
      esconderMostrarPins();
    });     

 map.on('move',function(e){
      esconderMostrarPins();
    });     

    var locations = [
      <? foreach ($coordenadas as $ind => $coord) {
          
          $explode = explode(",",$coord['coord']);
          
          if(is_numeric($explode[0]) && is_numeric($explode[1]) ) {
          
          
        if (is_numeric($coord["preco"])) {
          $preco = "R$ " . number_format($coord["preco"], 2, ',', ' ');
        } else {
          $preco = $coord["preco"];
        }
      ?>["<a href='<?= PATHSITE ?>espaco/<?= $coord["identificador"] ?>'><div style='width:240px; height: 130px; background-size: cover; background-image:url(<?= PATHSITE ?>uploads/produto/<?= $coord["id"] ?>/<?= $coord["foto"]->arquivo ?>)' ></div></a> <div class='cobretudo'> " +
          "<div><?= $coord["titulo"] ?></div><div><?= ($preco) ? "A partir de" : "" ?> <b> <?= $preco ?></b></div></div>", <?= $coord["coord"] ?>,'<?=$coord['identificador']?>'],
          <? } }  ?>
    ];

    for (var i = 0; i < locations.length; i++) {
      marker = new L.marker([locations[i][1], locations[i][2]])
        .bindPopup(locations[i][0])
        .addTo(map);    
    //    locations[i].identificador = '<?=$coord['identificador']?>';
        marker.identificador = locations[i][3];
        
        markers[i] = marker;       
    }

  <? } ?>
</script>