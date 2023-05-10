<?php 
 ob_start();
    session_start();
    require_once '../config.php'; // ajout connexion bdd 
   // si la session existe pas soit si l'on est pas connecté on redirige
   if(!isset($_SESSION['user'])){
    header('Location:index.php');
    die();
}
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tagss for new branch -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../landing.css">
  <link rel="stylesheet" href="../responsive.css">
  <link rel="shortcut icon" href="../img/Proviflix.ico">
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/log-in.css' rel='stylesheet'>
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/log-out.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glyphter/glyphter.min.css">
  <link href='https://unpkg.com/css.gg@2.0.0/icons/css/bell.css' rel='stylesheet'>
  
  <title>Proviflix</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <a href="../landing.php"><img src="../img/logo-Proviflix.png" alt="Responsive image LOGO" style="width:150px;"></a>
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
                <a href="../notification.php" style="font-size: 1.5rem;"><i class="bi bi-bell-fill"></i></a>
                <a class="bi bi-door-closedd-fill" href="../deconnexion.php" style="font-size: 1.5rem;"><i class="bi bi-door-closed-fill"></i></a>
                <button class="profile-button">
             <?php   $query = $BasePDO->prepare('SELECT img_path FROM User WHERE pseudo = ?');
    $query->execute(array($_SESSION['user']));
    $data = $query->fetch();
    $img_path = $data['img_path'];?>
                <?php
$query = $BasePDO->prepare('SELECT img_path FROM User WHERE pseudo = ?');
$query->execute(array($_SESSION['user']));
$data = $query->fetch();
$img_path = $data['img_path'];

// Ajouter un point devant le chemin d'image actuel
$img_path = '.' . dirname($img_path) . '/' . basename($img_path);
?>

<img src="<?php echo $img_path; ?>" alt="Image de profil actuelle" class="profile-photo">

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


<div class="content"style="padding-top:100px";>
  <h2 class="title">Game Of Thrones</h2>
  <div id="episode-navigation">
  <span style="margin-left: 639px;">
  <button id="prev-episode">Episode précédent</button>
</span>
<span style="margin-left: 347px;">
  <button id="next-episode">Episode suivant</button>
</span>

</div>
<iframe id="video-player" src="https://uqload.co/embed-m6e9e73bay96.html" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="640" height="360" allowfullscreen></iframe>

</div>

<select id="episode-selector">
  <optgroup label="Saison 1"style="font-size:30px;">
    <option value="https://uqload.co/embed-m6e9e73bay96.html">S1 Episode 1</option>
    <option value="https://uqload.co/embed-k709x56ds6ts.html">S1 Episode 2</option>
    <option value="https://uqload.co/embed-i92s9c92vrbk.html">S1 Episode 3</option>
    <option value="https://uqload.co/embed-chwvwiv1cwrw.html">S1 Episode 4</option>
    <option value="https://uqload.co/embed-4iprwx7p5zrx.html">S1 Episode 5</option>
    <option value="https://uqload.co/embed-k562huscrz5w.html">S1 Episode 6</option>
    <option value="https://uqload.co/embed-hv00dvp4til9.html">S1 Episode 7</option>
    <option value="https://uqload.co/embed-i549qchgtrxw.html">S1 Episode 8</option>
    <option value="https://uqload.co/embed-o6iplhey1vtf.html">S1 Episode 9</option>
    <option value="https://uqload.co/embed-p8efqruw8y2k.html">S1 Episode10</option>
  </optgroup>
  <optgroup label="Saison 2"style="font-size:30px;">
    <option value="https://uqload.co/embed-w3y48mrrv8ei.html">S2 Episode 1</option>
    <option value="https://uqload.co/embed-m5mytjiwg53i.html">S2 Episode 2</option>
    <option value="https://uqload.co/embed-9146002phq46.html">S2 Episode 3</option>
    <option value="https://uqload.co/embed-rrtgqljdp5hu.html">S2 Episode 4</option>
    <option value="https://uqload.co/embed-x49fisz5t5nf.html">S2 Episode 5</option>
    <option value="https://uqload.co/embed-wr6y1etwm3i1.html">S2 Episode 6</option>
    <option value="https://uqload.co/embed-2c9959tbujvl.html">S2 Episode 7</option>
    <option value="https://uqload.co/embed-uu9qbiqiylex.html">S2 Episode 8</option>
    <option value="https://uqload.co/embed-xrfbs14qt5wx.html">S2 Episode 9</option>
    <option value="https://uqload.co/embed-80wkvbb3zlk0.html">S2 Episode10</option>
  </optgroup>
  <optgroup label="Saison 3"style="font-size:30px;">
    <option value="https://uqload.co/embed-d89a4alh2iwf.html">S3 Episode 1</option>
    <option value="https://uqload.co/embed-a58vkw00g87i.html">S3 Episode 2</option>
    <option value="https://uqload.co/embed-v1i6h2cexyur.html">S3 Episode 3</option>
    <option value="https://uqload.co/embed-pe7ug0s5otcw.html">S3 Episode 4</option>
    <option value="https://uqload.co/embed-7oew7pszofrh.html">S3 Episode 5</option>
    <option value="https://uqload.co/embed-ddsb7qee4z5t.html">S3 Episode 6</option>
    <option value="https://uqload.co/embed-orem6kzf37gn.html">S3 Episode 7</option>
    <option value="https://uqload.co/embed-sgcig3oa6ytz.html">S3 Episode 8</option>
    <option value="https://uqload.co/embed-exqjcounopul.html">S3 Episode 9</option>
    <option value="https://uqload.co/embed-7joeqkpcrta3.html">S3 Episode10</option>
  </optgroup>
  <optgroup label="Saison 4"style="font-size:30px;">
    <option value="https://uqload.co/embed-mwa1u7zb9lwj.html">S4 Episode 1</option>
    <option value="https://uqload.co/embed-r1dy0pc1q7lo.html">S4 Episode 2</option>
    <option value="https://uqload.co/embed-qwx9nk98is23.html">S4 Episode 3</option>
    <option value="https://uqload.co/embed-mnyq15641cej.html">S4 Episode 4</option>
    <option value="https://uqload.co/embed-8fodp3on6h04.html">S4 Episode 5</option>
    <option value="https://uqload.co/embed-mur67na07xb1.html">S4 Episode 6</option>
    <option value="https://uqload.co/embed-dyxz4amkz3pv.html">S4 Episode 7</option>
    <option value="https://uqload.co/embed-v48e12obs6oo.html">S4 Episode 8</option>
    <option value="https://uqload.co/embed-te62lh2a5kgg.html">S4 Episode 9</option>
    <option value="https://uqload.co/embed-2fjwr50fvzjr.html">S4 Episode10</option>
  </optgroup>
  <optgroup label="Saison 5"style="font-size:30px;">
    <option value="https://uqload.co/embed-4xxsmxwo2mpp.html">S5 Episode 1</option>
    <option value="https://uqload.co/embed-5ok7bdj48w6r.html">S5 Episode 2</option>
    <option value="https://uqload.co/embed-blpwm2xsrxab.html">S5 Episode 3</option>
    <option value="https://uqload.co/embed-tpkdbpcekhoz.html">S5 Episode 4</option>
    <option value="https://uqload.co/embed-5328zm1niv1e.html">S5 Episode 5</option>
    <option value="https://uqload.co/embed-rzkoflm0fqim.html">S5 Episode 6</option>
    <option value="https://uqload.co/embed-ludl8581k9ym.html">S5 Episode 7</option>
    <option value="https://uqload.co/embed-99e61cji64gp.html">S5 Episode 8</option>
    <option value="https://uqload.co/embed-n5k5i87n2vi8.html">S5 Episode 9</option>
    <option value="https://uqload.co/embed-b855vqhg7lol.html">S5 Episode10</option>
  </optgroup>
  <optgroup label="Saison 6"style="font-size:30px;">
    <option value="https://uqload.co/embed-orm5fuj1fwzi.html">S6 Episode 1</option>
    <option value="https://uqload.co/embed-9f47ayg2543q.html">S6 Episode 2</option>
    <option value="https://uqload.co/embed-dt6hj7r7ccup.html">S6 Episode 3</option>
    <option value="https://uqload.co/embed-yffecr1cx3s5.html">S6 Episode 4</option>
    <option value="https://uqload.co/embed-s88uvvvqmcqc.html">S6 Episode 5</option>
    <option value="https://uqload.co/embed-e04rmif65z7s.html">S6 Episode 6</option>
    <option value="https://uqload.co/embed-pbr30j2cj1ru.html">S6 Episode 7</option>
    <option value="https://uqload.co/embed-d0vemayfrzpe.html">S6 Episode 8</option>
    <option value="https://uqload.co/embed-ygxzjn0a3vj3.html">S6 Episode 9</option>
    <option value="https://uqload.co/embed-jyd3mgmtpnrg.html">S6 Episode10</option>
  </optgroup>
  <optgroup label="Saison 7"style="font-size:30px;">
    <option value="https://uqload.co/embed-uirvz7wiuz6t.html">S7 Episode 1</option>
    <option value="https://uqload.co/embed-he1cs8tcb8v8.html">S7 Episode 2</option>
    <option value="https://uqload.co/embed-d3v2uonuojv6.html">S7 Episode 3</option>
    <option value="https://uqload.co/embed-dap4gumucsd0.html">S7 Episode 4</option>
    <option value="https://uqload.co/embed-035glulzmq44.html">S7 Episode 5</option>
    <option value="https://uqload.co/embed-a39ooe7i3wpr.html">S7 Episode 6</option>
    <option value="https://uqload.co/embed-e0tmb6t21sd3.html">S7 Episode 7</option>
  </optgroup>
  <optgroup label="Saison 8"style="font-size:30px;">
    <option value="https://uqload.co/embed-prwvbk97ny1i.html">S8 Episode 1</option>
    <option value="https://uqload.co/embed-uhisw1eubw3x.html">S8 Episode 2</option>
    <option value="https://uqload.co/embed-2b78zzhs4ujk.html">S8 Episode 3 = Banger</option>
    <option value="https://uqload.co/embed-wfoa24eoi2r7.html">S8 Episode 4</option>
    <option value="https://uqload.co/embed-cuquca29p4wm.html">S8 Episode 5</option>
    <option value="https://uqload.co/embed-g1ggpqiwa01e.html">S8 Episode 6</option>

  </optgroup>
</select>

	<script>
	  var episodeSelector = document.getElementById('episode-selector');
	  var videoPlayer = document.getElementById('video-player');
	  var prevEpisodeBtn = document.getElementById('prev-episode');
	  var nextEpisodeBtn = document.getElementById('next-episode');
	  var selectedIndex = episodeSelector.selectedIndex;

	  // Fonction pour changer l'épisode
	  function changeEpisode(index) {
	    episodeSelector.selectedIndex = index;
	    videoPlayer.src = episodeSelector.options[selectedIndex].value;
}  // Gestion des clics sur les boutons "Episode précédent" et "Episode suivant"
  prevEpisodeBtn.addEventListener('click', function() {
    selectedIndex = Math.max(selectedIndex - 1, 0);
    changeEpisode(selectedIndex);
  });

  nextEpisodeBtn.addEventListener('click', function() {
    selectedIndex = Math.min(selectedIndex + 1, episodeSelector.options.length - 1);
    changeEpisode(selectedIndex);
  });

  // Gestion du changement d'épisode depuis la liste déroulante
  episodeSelector.addEventListener('change', function() {
    selectedIndex = episodeSelector.selectedIndex;
    videoPlayer.src = episodeSelector.options[selectedIndex].value;
  });

</script>
<?php

// Récupérer l'ID de l'utilisateur
$query = "SELECT id FROM User WHERE pseudo = ?";
$stmt = $BasePDO->prepare($query);
$stmt->execute([$_SESSION['user']]);
$row = $stmt->fetch();
$id_user = $row['id'];

$id_film = 16; // Remplacez 1 par l'identifiant du film/série

// Vérifier si le film est déjà dans les favoris de l'utilisateur
$query = "SELECT * FROM favoris WHERE id_utilisateur = ? AND id_film = ?";
$stmt = $BasePDO->prepare($query);
$stmt->execute([$id_user, $id_film]);
$row = $stmt->fetch();

if ($row) {
    // Le film est déjà dans les favoris de l'utilisateur
    echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="post">';
    echo '<input type="hidden" name="id_film" value="' . $id_film . '">';
    echo '<button type="submit" name="supprimer_favori" class="btn-favori">';
    echo '<i class="fa fa-heart"></i> Supprimer des favoris';
    echo '</button>';
    echo '</form>';
} else {
    // Le film n'est pas encore dans les favoris de l'utilisateur
    echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="post">';
    echo '<input type="hidden" name="id_film" value="' . $id_film . '">';
    echo '<button type="submit" name="ajouter_favori" class="btn-favori">';
    echo '<i class="fa fa-heart-o"></i> Ajouter aux favoris';
    echo '</button>';
    echo '</form>';
}

if (isset($_POST['ajouter_favori'])) {
    // Ajouter le film aux favoris de l'utilisateur
    $id_film = $_POST['id_film'];
    $query = "INSERT INTO favoris (id_utilisateur, id_film) VALUES (?, ?)";
    $stmt = $BasePDO->prepare($query);
    $stmt->execute([$id_user, $id_film]);
    echo '<div style="background-color: green; color: white; padding: 10px;">Le film a été ajouté aux favoris!</div>';
    header("Location: GoT.php");
    exit();

}

if (isset($_POST['supprimer_favori'])) {
    // Supprimer le film des favoris de l'utilisateur
    $id_film = $_POST['id_film'];
    $query = "DELETE FROM favoris WHERE id_utilisateur = ? AND id_film = ?";
    $stmt = $BasePDO->prepare($query);
    $stmt->execute([$id_user, $id_film]);
    echo '<div style="background-color: red; color: white; padding: 10px;">Le film a été supprimé des favoris!</div>';
    header("Location: GoT.php");
    exit();

}




?>



    <style>
    iframe {
  display: block;
  margin: 0 auto;
}

.content {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
}

.title {
  flex-basis: 100%;
  text-align: center;
  font-size: 2rem;
  font-weight: bold;
  margin: 0;
  color:#ffff;
}

#episode-buttons {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-basis: 100%;
  margin-top: 1rem;
}

#episode-navigation {
  display: flex;
  align-items: center;
  flex-basis: 100%;
  margin-top: 1rem;
}

#prev-episode,
#next-episode {
  padding: 10px;
  border-radius: 3px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  background-color: #333;
  color: #fff;
  font-size: 16px;
  font-weight: bold;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  cursor: pointer;
  text-align: center;
  border: none;
  margin: 0;
}


#episode-selector {
    display: block;
  margin: 0 auto;
  width: 640px;
  padding: 10px;
  border: none;
  border-radius: 3px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  background-color: #333;
  color: #fff;
  font-size: 16px;
  font-weight: bold;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  cursor: pointer;
  text-align:center;

}

#episode-selector option {
  background-color: #333;
  color: #fff;
  border: none;
  border-radius: 3px;
  font-size: 16px;
  font-weight: bold;
}

#episode-selector:focus {
  outline: none;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2), 0 0 10px rgba(255, 255, 255, 0.2);
}

#season-selector {
  display: block;
  margin: 0 auto;
  width: 640px;
  padding: 10px;
  border: none;
  border-radius: 3px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  background-color: #333;
  color: #fff;
  font-size: 16px;
  font-weight: bold;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  cursor: pointer;
  text-align:center;
}

#season-selector option {
  background-color: #333;
  color: #fff;
  border: none;
  border-radius: 3px;
  font-size: 16px;
  font-weight: bold;
}

#season-selector:focus {
  outline: none;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2), 0 0 10px rgba(255, 255, 255, 0.2);
}

</style>
<style>
    /* Style personnalisé pour le bouton "ajouter aux favoris" */
    .btn-favori {
      background-color: transparent;
      border: none;
      color: #e74c3c;
      cursor: pointer;
      font-size: 16px;
    }
    
    .btn-favori:hover {
      color: #c0392b;
    }
  </style>
</head>
<?php
ob_end_flush();
?>