<?php
// Auteur : Hamza Oubkis | Objectif : connexion simple par session | Date : 17/10/2026
session_start();
if($_SERVER['REQUEST_METHOD']==='POST'){
  $login=trim($_POST['login']??'');
  if($login!==''){
    session_regenerate_id(true); $_SESSION['login']=$login;
    setcookie('dernier_login',$login,time()+86400,'/');
    header('Location: profil.php'); exit;
  }
  $erreur="Veuillez saisir un login.";
}
?><!doctype html><html lang="fr"><meta charset="utf-8"><body><h1>Connexion</h1>
<?php if(isset($erreur)) echo '<p style="color:red">'.htmlspecialchars($erreur).'</p>'; ?>
<form method="post"><label>Login <input name="login" required value="<?= htmlspecialchars($_COOKIE['dernier_login']??'',ENT_QUOTES,'UTF-8') ?>"></label><button>Se connecter</button></form>
</body></html>
