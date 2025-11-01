<?php
$height = array("Andy"=>"176","Barry"=>"165","Charlie"=>"170");
  echo "Andy is ".$height['Andy']. " cm tall<br><br>";

  $height["David"] = "180";
  $height["Edward"] = "168";
  $height["Fiona"] = "159";
  $height["George"] = "172";
  $height["Helen"] = "166";

  unset($height["Charlie"]);

  echo " Nilai indeks terakhir setelah penghapusan: ";
  $lastKey = array_key_last($height);
  echo $lastKey." is ".$height[$lastKey]." cm tall<br><br>";
?>