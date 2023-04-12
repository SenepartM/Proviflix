<?php 
    session_start();
    require_once 'config.php'; // ajout connexion bdd 
   // si la session existe pas soit si l'on est pas connecté on redirige
   if(!isset($_SESSION['user'])){
    header('Location:index.php');
    die();
}
// Vérification de la soumission du formulaire
if (isset($_POST['submit'])) {
    // Récupération de l'ID de la nouvelle image de profil
    $new_pp_id = $_POST['pp_id'];

    // Mise à jour de la base de données
    $update_query = $BasePDO->prepare('UPDATE User SET img_path = ? WHERE pseudo = ?');
    $update_query->execute(array($new_pp_id, $_SESSION['user']));

    // Mise à jour de la variable $img_path pour afficher la nouvelle image de profil
    $img_path = $new_pp_id;
}
else {
    // Récupération de l'image de profil actuelle
    $query = $BasePDO->prepare('SELECT img_path FROM User WHERE pseudo = ?');
    $query->execute(array($_SESSION['user']));
    $data = $query->fetch();
    $img_path = $data['img_path'];
}
?>
<script>
    // Quand l'utilisateur clique sur l'image, la fonction topFunction est appelée
function topFunction() {
  // Faites défiler la page jusqu'en haut, avec une animation de 500 millisecondes
  document.body.scrollTop = 0; // Pour Safari
  document.documentElement.scrollTop = 0; // Pour Chrome, Firefox, IE et Opera
}
</script>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tagss for new branch -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="./landing.css">
  <link rel="stylesheet" href="./responsive.css">
  <link rel="shortcut icon" href="img/Proviflix.ico">
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/log-in.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/log-out.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glyphter/glyphter.min.css">
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/bell.css' rel='stylesheet'>
  
  <title>Proviflix</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
<?php
if(isset($_POST['logout'])) {
    header('Location: deconnexion.php');
    exit();
  }
?>
  <div style="position: relative;">
    <!-- header -->
    <nav class="navbar navbar-expand-lg netflix-navbar netflix-padding-left netflix-padding-right" style="font-size: 1.2rem;">
    <div class="container-fluid">
        <div class="netflix-row">
            <div class="left d-flex align-items-center">
                <a class="navbar-brand" href="#">
                    <a href="landing.php"><img src="img/logo-Proviflix.png" alt="Responsive image LOGO" style="width:150px;"></a>
                </a>
                <div class="netflix-nav" style="font-size: 1.2rem;">
                    <section>
                    <button style="height: 50px; width: 150px; margin-right: 2px; font-weight:bold; font-size:1.1rem;">Menu</button>
<button style="height: 50px; width: 150px; margin-right: 2px; font-weight:bold; font-size:1.1rem;">Séries</button>
<button style="height: 50px; width: 150px; margin-right: 2px; font-weight:bold; font-size:1.1rem;">Films</button>
<button style="height: 50px; width: 200px; margin-right: 2px; font-weight:bold; font-size:1.1rem;">Nouveautés</button>
<button style="height: 50px; width: 150px; font-weight:bold; font-size:1.1rem;">Ma liste</button>


                    </section>
                </div>
                <div class="netflix-dropdown-box dropdown" style="font-size: 1.2rem;">
                    <button class="netflix-dropdown dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"> Browse </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Menu</a></li>
                        <li><a class="dropdown-item" href="#">Série</a></li>
                        <li><a class="dropdown-item" href="#">Film</a></li>
                        <li><a class="dropdown-item" href="#">Nouveauté</a></li>
                        <li><a class="dropdown-item" href="#">Ma liste</a></li>
                    </ul>
                </div>
            </div>
            <div class="right d-flex align-items-center" style="gap:0.5rem">
                <a href="./notification.php" style="font-size: 1.5rem;"><i class="bi bi-bell-fill"></i></a>
                <a class="bi bi-door-closedd-fill" href="./deconnexion.php" style="font-size: 1.5rem;"><i class="bi bi-door-closed-fill"></i></a>
                <form action="./update_pp.php">
                <button class="profile-button">
                </form> 
             <?php   $query = $BasePDO->prepare('SELECT img_path FROM User WHERE pseudo = ?');
    $query->execute(array($_SESSION['user']));
    $data = $query->fetch();
    $img_path = $data['img_path'];?>
                <img src="<?php echo $img_path; ?>" alt="Image de profil actuelle" class="profile-photo"onclick="topFunction()">
</button>
<style>
  .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  
  .profile-button {
    display: flex;
    align-items: center;
    background-color: transparent;
    border: none;
    cursor: pointer;
  }
  
  .profile-photo {
    position:relative;
    width: 52px;
    height: 52px;
    object-fit: cover;   
    border-radius:12px;
    margin-right: 1px;
  }
</style>
            </div>
        </div>
    </div>
</nav>


    <!-- /header -->
    <div class="content"style="padding-top:200px";>


<style>


        /* formulaire */
        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        form p {
            margin: 2rem 0 1rem;
            font-size: 1.5rem;
            text-align: center;
            width: 100%;
        }

        form label {
            display: block;
            margin: 0 1rem 1.5rem;
            font-size: 1.2rem;
            text-align: center;
            cursor: pointer;
        }

        form img {
            position:relative;
            width: 200px;
            height: 200px;
            object-fit: cover;   
            border-radius:12px;;
            box-shadow: 0px 0px 10px #000;
            transition: transform 0.3s ease-in-out;
        }

        form input[type="radio"] {
            display: none;
        }

        form input[type="radio"]:checked + img {
            transform: scale(1.1);
            box-shadow: 0px 0px 20px #fff;
        }

        form button {
            margin: 2rem auto;
            padding: 1rem 2rem;
            border: none;
            border-radius: 5px;
            font-size: 1.2rem;
            font-weight: bold;
            text-transform: uppercase;
            background-color: #e50914;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        form button:hover {
            background-color: #ff3e3e;
        }
    </style>
</head>
<body>


    <p style="flex-basis: 100%;
  text-align: center;
  font-size: 2rem;
  font-weight: bold;
  margin: 0;
  color:#ffff;">Bonjour <?php echo $_SESSION['user']; ?> !</p>

    <p style="flex-basis: 100%;
  text-align: center;
  font-size: 1.5rem;
  font-weight: bold;
  margin: 0;
  color:#ffff;margin-bottom: 1rem;">Image de profil actuelle :</p>
<img src="<?php echo $img_path; ?>" alt="Image de profil actuelle" style="display: block; margin: 0 auto; width: 200px; height: 200px; border-radius: 12px; box-shadow: 0px 0px 10px #000; transition: transform 0.3s ease-in-out;">


    <form method="post">
    <button type="submit" name="submit">Changer d'image de profil</button>
        <p style="flex-basis: 100%;
  text-align: center;
  font-size: 1rem;
  font-weight: bold;
  margin: 0;
  color:#ffff;">Nouvelle image de profil :</p>
        <?php
            // Affichage des images de profil disponibles
            for ($i = 1; $i <= 120; $i++) {
                $pp_path = "./ppN/avatar (" . $i . ").png";
                echo '<label><input type="radio" name="pp_id" value="' . $pp_path . '"';
                if ($img_path == $pp_path) {
                    echo ' checked';
                }
                echo '><img src="' . $pp_path . '" alt="Image de profil ' . $i . '" onclick="topFunction()"></label>';
            }
        ?>
        <br>
        
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->


  <script src="./javaScript.js"></script>
</html>
