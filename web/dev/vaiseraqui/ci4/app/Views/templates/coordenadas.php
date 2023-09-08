<script>
  
  <? if($coordenadas) {  
  ?>
  
 var map = new L.Map('map', {
    center: [0, 0],
    zoom: 0,
    layers: [
        new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            'attribution': 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
        })
    ]
}); 
  
  map.setView([<?=array_values($coordenadas)[0]["coord"]?>], 12);
  
  var locations = [
    <? foreach($coordenadas as $ind => $coord) {
      if(is_numeric($coord["preco"] )) {
        $preco = "R$ " . number_format($coord["preco"], 2, ',', ' ');
      }else {
        $preco = $coord["preco"];
      }
    ?>
  ["<a href='<?=PATHSITE?><?=$coord["pagina"]?>/<?=$coord["identificador"]?>'><div style='width:240px; height: 130px; background-size: cover; background-image:url(<?=PATHSITE?>uploads/produto/<?=$coord["id"]?>/<?=$coord["foto"]->arquivo?>)' ></div></a> <div class='cobretudo'> "
   +"<div><?=$coord["titulo"]?></div><div><?=($preco) ? "A partir de" : "" ?> <b> <?=$preco ?></b></div></div>", <?=$coord["coord"]?>],
    <? } ?>
];
  
  for (var i = 0; i < locations.length; i++) {
  marker = new L.marker([locations[i][1], locations[i][2]])
    .bindPopup(locations[i][0])
    .addTo(map);
}
 
<? } ?>

    
    </script>