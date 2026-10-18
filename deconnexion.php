<?php
// Auteur : Hamza Oubkis | Objectif : fermeture de session | Date : 17/10/2026
session_start(); session_unset(); session_destroy(); header('Location: login.php'); exit;
