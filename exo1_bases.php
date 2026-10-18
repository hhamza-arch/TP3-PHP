<?php
// Auteur : Hamza Oubkis | Objectif : variables, constantes, types et chaînes | Date : 17/10/2026
require_once __DIR__ . '/config.php';
include __DIR__ . '/includes/entete_inc.php';
include __DIR__ . '/includes/menu_inc.php';

echo "<h2>Hello PHP</h2>";
// Variables valides : $x, $_x, $Prix_HT, $état (PHP accepte les lettres Unicode dans les identifiants).
// Invalides : $2x (commence par un chiffre), $x-y (le tiret est un opérateur), $prix ht (espace).
$x = 1; $_x = 2; $Prix_HT = 3; $état = "valide";
$a = "minuscule"; $A = "majuscule";
echo "<p> a = $a ; A = $A (variables distinctes)</p>";

echo "<h3>Constantes</h3>";
echo ETABLISSEMENT . " | " . NOTE_MIN . " | " . NOTE_MAX . " | " . SEUIL;
echo "<p>SEUIL défini ? " . (defined('SEUIL') ? 'oui' : 'non') . "</p>";
echo "<p>INCONNUE définie ? " . (defined('INCONNUE') ? 'oui' : 'non') . "</p>";
// Une constante non définie déclenche généralement un avertissement et est interprétée comme chaîne selon le contexte.
// const se déclare dans le code, define() permet une déclaration à l'exécution.

$prix_ht = 60; $tva = 20;
$prix_ttc = $prix_ht * (1 + $tva / 100);
echo "<p>Le prix TTC du produit est de " . $prix_ttc . " €.</p>";

$test = (string) 42; var_dump($test);
echo "<h3>Conversions booléennes</h3>";
foreach ([0, 0.0, "0", "", "abc", [], null] as $v) { echo "<pre>"; var_dump((bool)$v); echo "</pre>"; }
echo "<h3>Conversions numériques</h3><pre>";
var_dump((int)3.9, (int)"12abc", (float)"1.5e3", (int)true);
echo "</pre>";
echo "<p>255 décimal, hexadécimal, octal, binaire : " . 255 . ", " . dechex(255) . ", " . decoct(255) . ", " . decbin(255) . "</p>";

$traitees = "égales à"; $ici = 2;
echo '<p>' . 'Ahmed a dit : "J\'ai réussi"' . '</p>';
echo '<p>Voulez-vous supprimer C:\*.*?</p>';
echo '<p>Ceci n\'affichera pas \n de nouvelle ligne</p>';
echo '<p>Les variables ne seront pas $traitees $ici</p>';
echo "<p>Les variables seront $traitees $ici</p>";
echo "<p>" . trim("*Bonjour les développeurs*", "*") . "</p>";
$mot = "PHP";
for ($i=0; $i<strlen($mot); $i++) echo htmlspecialchars($mot[$i]) . "<br>";

include __DIR__ . '/includes/pied_inc.php';
