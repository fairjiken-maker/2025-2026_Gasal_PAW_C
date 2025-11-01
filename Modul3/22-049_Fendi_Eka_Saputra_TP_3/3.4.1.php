<?php
   $height = array(
      "Andy"=>"176",
      "Barry"=>"165",
      "Charlie"=>"170",
      "David" => "180",
      "Evan"  => "160",
      "Fiona" => "168",
      "George"=> "175",
      "Helen" => "162"
   );

   foreach($height as $x => $x_value){
      echo "key=" . $x . ", Value=" . $x_value;
      echo "<br>";
   }
?>
