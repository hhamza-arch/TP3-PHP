<?php
// Auteur : Hamza Oubkis | Objectif : validation et enregistrement des notes | Date : 17/10/2026
require_once __DIR__ . '/config.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: saisie.html'); exit; }
$champs = ['nom','note_info','note_math'];
foreach($champs as $champ) if(!isset($_POST[$champ]) || trim((string)$_POST[$champ])===''){ http_response_code(400); exit('Erreur : tous les champs sont obligatoires.'); }
$nom=trim($_POST['nom']); $info=filter_var($_POST['note_info'], FILTER_VALIDATE_FLOAT); $math=filter_var($_POST['note_math'], FILTER_VALIDATE_FLOAT);
if($info===false || $math===false || $info<NOTE_MIN || $info>NOTE_MAX || $math<NOTE_MIN || $math>NOTE_MAX){http_response_code(400);exit('Erreur : les notes doivent être comprises entre 0 et 20.');}
$moyenne=($info+$math)/2;
$dir=__DIR__.'/data'; if(!is_dir($dir)) mkdir($dir,0775,true);
$f=fopen($dir.'/notes.csv','a'); if(!$f) exit("Impossible d'ouvrir le fichier CSV.");
fputcsv($f,[$nom,$info,$math],';'); fclose($f);
?><!doctype html><html lang="fr"><meta charset="utf-8"><body>
<h1>Enregistrement réussi</h1><p>Nom : <?= htmlspecialchars($nom,ENT_QUOTES,'UTF-8') ?></p>
<p>Info : <?= $info ?> | Math : <?= $math ?> | Moyenne : <?= number_format($moyenne,2) ?></p>
<p><a href="saisie.html">Ajouter un autre apprenant</a> | <a href="liste.php">Voir la liste</a></p></body></html>
