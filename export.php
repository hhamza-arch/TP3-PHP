<?php
// Auteur : Hamza Oubkis | Objectif : export JSON et sérialisation | Date : 17/10/2026
include __DIR__ . '/includes/entete_inc.php'; include __DIR__ . '/includes/menu_inc.php';
$fichier=__DIR__.'/data/notes.csv';$resultats=[];
if(file_exists($fichier) && ($f=fopen($fichier,'r'))){while(($ligne=fgetcsv($f,0,';'))!==false){if(count($ligne)<3)continue;[$nom,$info,$math]=$ligne;$resultats[]=['nom'=>$nom,'note_info'=>(float)$info,'note_math'=>(float)$math,'moyenne'=>(((float)$info+(float)$math)/2)];}fclose($f);}
$json=json_encode($resultats,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
if(!is_dir(__DIR__.'/data'))mkdir(__DIR__.'/data',0775,true);
file_put_contents(__DIR__.'/data/notes.json',$json);
$relu=json_decode(file_get_contents(__DIR__.'/data/notes.json'),true);
echo "<h2>Contenu JSON relu</h2><pre>";print_r($relu);echo "</pre>";
echo "<h2>serialize() vs json_encode()</h2><pre>";echo htmlspecialchars(serialize($resultats))."\n\n".htmlspecialchars($json);echo "</pre>";
echo "<p>JSON est directement exploitable par JavaScript avec JSON.parse().</p>";
include __DIR__ . '/includes/pied_inc.php';
