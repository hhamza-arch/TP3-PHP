<?php
// Auteur : Hamza Oubkis | Objectif : conditions et boucles | Date : 17/10/2026
require_once __DIR__ . '/config.php';
include __DIR__ . '/includes/entete_inc.php'; include __DIR__ . '/includes/menu_inc.php';
function mention($note) {
    if ($note >= 16) return "Très bien";
    elseif ($note >= 14) return "Bien";
    elseif ($note >= 12) return "Assez bien";
    elseif ($note >= SEUIL) return "Passable";
    return "Ajourné";
}
echo "<h2>Mentions</h2>";
foreach ([7,10,12,14,16,18] as $n) echo "<p>$n : " . mention($n) . "</p>";
$mois = (int)date("m");
$mois_fr = [1=>"janvier",2=>"février",3=>"mars",4=>"avril",5=>"mai",6=>"juin",7=>"juillet",8=>"août",9=>"septembre",10=>"octobre",11=>"novembre",12=>"décembre"];
echo "<p>Mois courant : " . $mois_fr[$mois] . "</p>";
echo "<h3>Triangle</h3>";
for($i=1;$i<=6;$i++){ for($j=1;$j<=$i;$j++) echo "*"; echo "<br>"; }
echo "<h3>Nombres pairs avec while</h3>";
$i=0; while($i<=20){ echo ($i===10 ? "<strong>$i</strong>" : $i) . " "; $i+=2; }
echo "<h3>continue</h3>";
for($i=0;$i<=10;$i++){ if($i%2!==0) continue; echo "$i "; }
echo "<h3>break 2</h3>";
$i=1;
while($i<=12){
  switch($i){
    case 5: echo "<p>At 5</p>"; break;
    case 10: echo "<p>At 10; quitting</p>"; break 2;
    default: echo "<p>$i</p>";
  }
  $i++;
}
echo "<h3>do-while</h3>";
$i=0; do { echo ($i===10 ? "<strong>$i</strong>" : $i) . " "; $i+=2; } while($i<=20);
include __DIR__ . '/includes/pied_inc.php';
