<?php
include('User.php');
if (isset($_POST['email'])) {
    $email = $_POST['email'];
  
    // Vérifier si l'email existe déjà dans la base de données
    if (User::emailExists($email)) {
      // Si l'email existe déjà, rediriger l'utilisateur vers la page de connexion
      header("Location: index.php?email=" . urlencode($email));
      exit();
    } else {
       // Sinon, rediriger l'utilisateur vers la page d'inscription avec l'email pré-rempli
       header("Location: inscription.php?email=" . urlencode($email));
      exit();
    }
  }
  
?>