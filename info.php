<?php
// Auteur : Hamza Oubkis | Objectif : traitement d'un formulaire GET | Date : 17/10/2026
$nom = trim($_GET['nom'] ?? ''); $prenom = trim($_GET['prenom'] ?? ''); $sexe = $_GET['sexe'] ?? '';
$salutation = $sexe === 'F' ? 'Bonjour Madame' : 'Bonjour Monsieur';
?><!doctype html><html lang="fr"><meta charset="utf-8"><body>
<p><?= htmlspecialchars($salutation . ' ' . $prenom . ' ' . $nom, ENT_QUOTES, 'UTF-8') ?></p>
<a href="info.html">Retour</a></body></html>
