<?php
// Auteur : Hamza Oubkis | Objectif : tableaux, statistiques et tris | Date : 17/10/2026
require_once __DIR__ . '/config.php';
function mention($note) {
    if ($note >= 16) return "Très bien";
    if ($note >= 14) return "Bien";
    if ($note >= 12) return "Assez bien";
    if ($note >= SEUIL) return "Passable";
    return "Ajourné";
}
function afficher($tab) {
    echo "<table><tr><th>Nom / clé</th><th>Valeur</th></tr>";
    foreach($tab as $k=>$v) echo "<tr><td>".htmlspecialchars((string)$k)."</td><td>".htmlspecialchars((string)$v)."</td></tr>";
    echo "</table>";
}
include __DIR__ . '/includes/entete_inc.php'; include __DIR__ . '/includes/menu_inc.php';
$notes = ["Mohamed"=>16,"Ahmed"=>14,"Hind"=>13,"Aicha"=>15,"Samir"=>13,"Zakaria"=>13,"Rafik"=>10,"Ilham"=>9,"Hamza"=>7,"Sami"=>7,"Noura"=>14];
$modules = ["PHP","HTML/CSS","JavaScript"];
echo "<h2>Modules</h2>"; foreach($modules as $m) echo htmlspecialchars($m)."<br>";
echo "<p>Par indice : ".htmlspecialchars($modules[0]).", ".htmlspecialchars($modules[1]).", ".htmlspecialchars($modules[2])."</p>";
echo "<h2>Notes</h2><table><tr><th>Nom</th><th>Note</th><th>Mention</th></tr>";
foreach($notes as $nom=>$note){$style=$note<SEUIL?' style="color:red"':'';echo "<tr$style><td>".htmlspecialchars($nom)."</td><td>$note</td><td>".mention($note)."</td></tr>";}
echo "</table>";
$somme=0;$meilleure=NOTE_MIN;$faible=NOTE_MAX;$effectifs=[];
foreach($notes as $nom=>$note){$somme+=$note;if($note>$meilleure)$meilleure=$note;if($note<$faible)$faible=$note;$m=mention($note);$effectifs[$m]=($effectifs[$m]??0)+1;}
$moyenne=$somme/count($notes);
echo "<p>Somme : $somme | Moyenne : ".round($moyenne,2)." | Meilleure : $meilleure | Plus faible : $faible</p>";
echo "<p>Vérification : somme ".array_sum($notes).", effectif ".count($notes).", max ".max($notes).", min ".min($notes)."</p>";
echo "<h3>Effectifs par mention</h3>"; afficher($effectifs);
echo "<h3>Tri par noms croissants</h3>";$t=$notes;ksort($t);afficher($t);
echo "<h3>Tri par notes décroissantes</h3>";$t=$notes;arsort($t);afficher($t);
echo "<h3>Tri par noms décroissants</h3>";$t=$notes;krsort($t);afficher($t);
echo "<h3>Tri par notes croissantes</h3>";$t=$notes;asort($t);afficher($t);
$a=["x"=>1,"y"=>2];$b=["y"=>2,"x"=>1];
echo "<h3>Opérateurs de tableaux</h3><pre>";var_dump($a+$b,$a==$b,$a===$b);echo "</pre>";
// Pour un tableau indexé, sort() trie les valeurs et réindexe les clés.
include __DIR__ . '/includes/pied_inc.php';
