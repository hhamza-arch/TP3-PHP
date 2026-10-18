<?php
// Auteur : Hamza Oubkis | Objectif : profil protégé par session | Date : 17/10/2026
session_start();
if(!isset($_SESSION['login'])){header('Location: login.php');exit;}
?><!doctype html><html lang="fr"><meta charset="utf-8"><body>
<h1>Profil</h1><p>Bienvenue <?= htmlspecialchars($_SESSION['login'],ENT_QUOTES,'UTF-8') ?> !</p><a href="deconnexion.php">Déconnexion</a>
</body></html>
