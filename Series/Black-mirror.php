<?php 
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
  <h2 class="title">Black Mirror</h2>
  <div id="episode-navigation">
  <span style="margin-left: 639px;">
  <button id="prev-episode">Episode précédent</button>
</span>
<span style="margin-left: 347px;">
  <button id="next-episode">Episode suivant</button>
</span>

</div>
<iframe id="video-player" src="https://uqload.co/embed-gkuxt4jktxve.html" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="640" height="360" allowfullscreen></iframe>

</div>

    <select id="episode-selector">
    <optgroup label="Saison 1"style="font-size:30px;background-color:#181716;">
        <option value="https://uqload.co/embed-gkuxt4jktxve.html">S1 Episode 1</option>
        <option value="https://uqload.co/embed-1ndmjkwqm7z2.html">S1 Episode 2</option>
        <option value="https://uqload.co/embed-83h0rh4jt0v3.html">S1 Episode 3</option>
    </optgroup>
    <optgroup label="Saison 2"style="font-size:30px;background-color:#181716;">
        <option value="https://uqload.co/embed-lkz1q6q2x6rg.html">S2 Episode 1</option>
        <option value="https://uqload.co/embed-8se5xm1leyme.html">S2 Episode 2</option>
        <option value="https://uqload.co/embed-x5gecuzcdo2e.html">S2 Episode 3</option>
        <option value="https://uqload.co/embed-8euhluhst9cq.html">S2 Episode 4</option>

        <!-- Ajouter les autres épisodes de la saison 2 ici -->
    </optgroup>
    <!-- Ajouter les autres saisons ici -->
    <optgroup label="Saison 3"style="font-size:30px;background-color:#181716;">
        <option value="https://uqload.co/embed-4r52yt2h3dzt.html">S3 Episode 1</option>
        <option value="https://uqload.co/embed-3xupsfgwwp7l.html">S3 Episode 2</option>
        <option value="https://uqload.co/embed-acmzd36fpk8x.html">S3 Episode 3</option>
        <option value="https://uqload.co/embed-smv4pg2nrkak.html">S3 Episode 4</option>
        <option value="https://uqload.co/embed-l3bc5y1qjvgg.html">S3 Episode 5</option>
        <option value="https://uqload.co/embed-iqp4zb41svyh.html">S3 Episode 6</option>

    </optgroup>
    <optgroup label="Saison 4"style="font-size:30px;background-color:#181716;">
        <option value="https://uqload.co/embed-fhz67yyj5ixl.html">S4 Episode 1</option>
        <option value="https://uqload.co/embed-no3gwo6pbnqi.html">S4 Episode 2</option>
        <option value="https://uqload.co/embed-jkyd92zle5zh.html">S4 Episode 3</option>
        <option value="https://uqload.co/embed-5qswi8dwcjnv.html">S4 Episode 4</option>
        <option value="https://uqload.co/embed-z8l6hovq0j08.html">S4 Episode 5</option>
        <option value="https://uqload.co/embed-s6kawa8gsirp.html">S4 Episode 6</option>

    </optgroup>
    <optgroup label="Saison 5"style="font-size:30px;background-color:#181716;">
        <option value="https://uqload.co/embed-djaq5p538tmv.html">S5 Episode 1</option>
        <option value="https://uqload.co/embed-bi1wtr2nfk7z.html">S5 Episode 2</option>
        <option value="https://uqload.co/embed-28mks9vkemqe.html">S5 Episode 3</option>
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