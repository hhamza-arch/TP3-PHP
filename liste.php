<?php
// Auteur : Hamza Oubkis | Objectif : lecture et affichage du CSV | Date : 17/10/2026
require_once __DIR__ . '/config.php';
include __DIR__ . '/includes/entete_inc.php'; include __DIR__ . '/includes/menu_inc.php';
$fichier=__DIR__.'/data/notes.csv';
if(!file_exists($fichier)){echo "<p>Aucune note enregistrée. <a href='saisie.html'>Saisir une note</a></p>";include __DIR__.'/includes/pied_inc.php';exit;}
$f=fopen($fichier,'r');if(!$f){echo "<p class='erreur'>Erreur d'ouverture du fichier.</p>";include __DIR__.'/includes/pied_inc.php';exit;}
$somme=0;$n=0;
echo "<table><tr><th>Nom</th><th>Info</th><th>Math</th><th>Moyenne</th><th>Mention</th></tr>";
while(($ligne=fgetcsv($f,0,';'))!==false){if(count($ligne)<3)continue;[$nom,$info,$math]=$ligne;$m=(((float)$info)+((float)$math))/2;$somme+=$m;$n++;$mention=$m>=16?'Très bien':($m>=14?'Bien':($m>=12?'Assez bien':($m>=SEUIL?'Passable':'Ajourné')));
echo "<tr><td>".htmlspecialchars($nom,ENT_QUOTES,'UTF-8')."</td><td>".htmlspecialchars($info)."</td><td>".htmlspecialchars($math)."</td><td>".number_format($m,2)."</td><td>$mention</td></tr>";}
fclose($f);echo "</table><p>Moyenne générale de la classe : ".($n?number_format($somme/$n,2):'N/A')."</p>";
echo "<h3>Lecture bas niveau avec fgets / explode</h3><pre>";
$f=fopen($fichier,'r');while(!feof($f)){ $ligne=fgets($f);if($ligne!==false) echo htmlspecialchars(trim($ligne))."\n"; }fclose($f);echo "</pre>";
include __DIR__ . '/includes/pied_inc.php';
