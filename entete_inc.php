<?php
// Auteur : Hamza Oubkis | Objectif : en-tête commun | Date : 17/10/2026
require_once __DIR__ . '/../config.php';
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Suivi des notes</title>
  <style>
    body{font-family:Arial,sans-serif;max-width:950px;margin:2rem auto;padding:0 1rem;color:#222}
    nav a{margin-right:12px} table{border-collapse:collapse;width:100%;margin:1rem 0}
    th,td{border:1px solid #aaa;padding:8px;text-align:left} th{background:#eee}
    .erreur{color:#b00020}.ok{color:#087443} footer{margin-top:2rem;border-top:1px solid #ddd;padding-top:1rem}
    input,select,button{padding:7px;margin:4px 0}
  </style>
</head>
<body>
<header><h1>Suivi des notes — <?= htmlspecialchars(ETABLISSEMENT, ENT_QUOTES, 'UTF-8') ?></h1></header>
