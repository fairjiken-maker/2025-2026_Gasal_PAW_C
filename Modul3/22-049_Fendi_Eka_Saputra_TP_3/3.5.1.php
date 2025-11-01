<?php
  $student = array (
    array("Alex","220401","0812345678"),
    array("Bianca","220401","0812345687"),
    array("Candie","220401","0812345665"),
    array("Daniel","220402","0812345699"),
    array("Eliza","220403","0812345600"),
    array("Farrel","220404","0812345611"),
    array("Gina","220405","0812345622"),
    array("Henry","220406","0812345633"),
  );

  echo "<table border='1' cellpadding='5' cellspacing='0'>";
  echo "<tr><th>Nama</th><th>NIM</th><th>No. HP</th></tr>";
  foreach($student as $s){
    echo "<tr>";
    echo "<td>".$s[0]."</td>";
    echo "<td>".$s[1]."</td>";
    echo "<td>".$s[2]."</td>";
    echo "</tr>";
  }
  echo "</table>";
?>
