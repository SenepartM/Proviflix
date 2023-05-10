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
  <h2 class="title">Rick et Morty</h2>
  <div id="episode-navigation">
  <span style="margin-left: 639px;">
  <button id="prev-episode">Episode précédent</button>
</span>
<span style="margin-left: 347px;">
  <button id="next-episode">Episode suivant</button>
</span>

</div>
<iframe id="video-player" src="https://uqload.co/embed-86e31mkpn463.html" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="640" height="360" allowfullscreen></iframe>

</div>

    <select id="episode-selector">
    <optgroup label="Saison 1"style="font-size:30px;background-color:#181716;">
        <option value="https://uqload.co/embed-86e31mkpn463.html">S1 Episode 1</option>
        <option value="https://uqload.co/embed-ocvai21scfpe.html">S1 Episode 2</option>
        <option value="https://uqload.co/embed-k492frem8vz5.html">S1 Episode 3</option>
        <option value="https://uqload.co/embed-n5dh2b83si84.html">S1 Episode 4</option>
        <option value="https://uqload.co/embed-jgbkpm89drlx.html">S1 Episode 5</option>
        <option value="https://uqload.co/embed-faqmu3gkk7y0.html">S1 Episode 6</option>
        <option value="https://uqload.co/embed-kv2ui8st8why.html">S1 Episode 7</option>
        <option value="https://uqload.co/embed-0u2qvvu6xvla.html">S1 Episode 8</option>
        <option value="https://uqload.co/embed-9yxe2e6a0ypj.html">S1 Episode 9</option>
        <option value="https://uqload.co/embed-nwlswn0lzops.html">S1 Episode10</option>
        <option value="https://uqload.co/embed-85n22yawg8ad.html">S1 Episode11</option>
    </optgroup>
    <optgroup label="Saison 2"style="font-size:30px;background-color:#181716;">
        <option value="https://uqload.co/embed-apdtba63t7b3.html">S2 Episode 1</option>
        <option value="https://uqload.co/embed-0qdh6i2rwq2e.html">S2 Episode 2</option>
        <option value="https://uqload.co/embed-p50r56tjvhtb.html">S2 Episode 3</option>
        <option value="https://uqload.co/embed-aa72rtv5dbzg.html">S2 Episode 4</option>
        <option value="https://uqload.co/embed-6cskyewgm8nb.html">S2 Episode 5</option>
        <option value="https://uqload.co/embed-eal67gfz7098.html">S2 Episode 6</option>
        <option value="https://uqload.co/embed-ccavpllmeysz.html">S2 Episode 7</option>
        <option value="https://uqload.co/embed-ovwmxe4pj2el.html">S2 Episode 8</option>
        <option value="https://uqload.co/embed-1h5j1b5ero0l.html">S2 Episode 9</option>
        <option value="https://uqload.co/embed-b3s7g9dv2brw.html">S2 Episode 10</option>
        <!-- Ajouter les autres épisodes de la saison 2 ici -->
    </optgroup>
    <!-- Ajouter les autres saisons ici -->
    <optgroup label="Saison 3"style="font-size:30px;background-color:#181716;">
        <option value="https://uqload.co/embed-xroqf61pj4yh.html">S3 Episode 1</option>
        <option value="https://uqload.co/embed-ptqlc34um5n4.html">S3 Episode 2</option>
        <option value="https://uqload.co/embed-vvhdh37oguk6.html">S3 Episode 3</option>
        <option value="https://uqload.co/embed-mugvt7ootwnz.html">S3 Episode 4</option>
        <option value="https://uqload.co/embed-bblirr749azn.html">S3 Episode 5</option>
        <option value="https://uqload.co/embed-78pz0zpfx3ux.html">S3 Episode 6</option>
        <option value="https://uqload.co/embed-u84owo2mq198.html">S3 Episode 7</option>
        <option value="https://uqload.co/embed-pob46lshizmz.html">S3 Episode 8</option>
        <option value="https://uqload.co/embed-4la6dm7jl7b7.html">S3 Episode 9</option>
        <option value="https://uqload.co/embed-wn22t54pvsuj.html">S3 Episode 10</option>
    </optgroup>
    <optgroup label="Saison 4"style="font-size:30px;background-color:#181716;">
        <option value="https://uqload.co/embed-5kzgiwckpc23.html">S4 Episode 1</option>
        <option value="https://uqload.co/embed-q0z3p10nrumk.html">S4 Episode 2</option>
        <option value="https://uqload.co/embed-eco82qip4r2u.html">S4 Episode 3</option>
        <option value="https://uqload.co/embed-e4jgpkc3yoak.html">S4 Episode 4</option>
        <option value="https://uqload.co/embed-s67204x7armf.html">S4 Episode 5</option>
        <option value="https://uqload.co/embed-7lka69b22p8r.html">S4 Episode 6</option>
        <option value="https://uqload.co/embed-2fdnl12upk81.html">S4 Episode 7</option>
        <option value="https://uqload.co/embed-wt3wb0fik666.html">S4 Episode 8</option>
        <option value="https://uqload.co/embed-lsprpmd22gi8.html">S4 Episode 9</option>
        <option value="https://uqload.co/embed-989wpusccmrv.html">S4 Episode 10</option>
    </optgroup>
    <optgroup label="Saison 5"style="font-size:30px;background-color:#181716;">
        <option value="https://uqload.co/embed-fx23hg38k308.html">S5 Episode 0</option>
        <option value="https://uqload.co/embed-falvou5k78i5.html">S5 Episode 1</option>
        <option value="https://uqload.co/embed-ps808rfz5twi.html">S5 Episode 2</option>
        <option value="https://uqload.co/embed-1uy1djix2em5.html">S5 Episode 3</option>
        <option value="https://uqload.co/embed-i4pmzbgn47g7.html">S5 Episode 4</option>
        <option value="https://uqload.co/embed-4xspr1f3ydjh.html">S5 Episode 5</option>
        <option value="https://uqload.co/embed-tz72oeec3mx5.html">S5 Episode 6</option>
        <option value="https://uqload.co/embed-bxllyp1ps1xy.html">S5 Episode 7</option>
        <option value="https://uqload.co/embed-d729eoz2ef21.html">S5 Episode 8</option>
        <option value="https://uqload.co/embed-sn5118vcprsh.html">S5 Episode 9</option>
        <option value="https://uqload.co/embed-ege8oeh7bp6g.html">S5 Episode 10</option>
    </optgroup>
    <optgroup label="Saison 6"style="font-size:30px;background-color:#181716;">
        <option value="https://uqload.co/embed-z456d1tjs34a.html">S6 Episode 1</option>
        <option value="https://uqload.co/embed-564qwmppsmqn.html">S6 Episode 2</option>
        <option value="https://uqload.co/embed-stgk6fpuqac1.html">S6 Episode 3</option>
        <option value="https://uqload.co/embed-puklzxcbfdnm.html">S6 Episode 4</option>
        <option value="https://uqload.co/embed-ryem6wyyq9nm.html">S6 Episode 5</option>
        <option value="https://uqload.co/embed-vf7v3ihgrt8p.html">S6 Episode 6</option>
        <option value="https://uqload.co/embed-j11urazcfj2p.html">S6 Episode 7</option>
        <option value="https://uqload.co/embed-qrd304q32igp.html">S6 Episode 8</option>
        <option value="https://uqload.co/embed-9yb6bt1bir0v.html">S6 Episode 9</option>
        <option value="https://uqload.co/embed-6dwu7gi4ebfv.html">S6 Episode 10</option>
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

$id_film = 5; // Remplacez 1 par l'identifiant du film/série

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
    header("Location: RickandMorty.php");
    exit();

}

if (isset($_POST['supprimer_favori'])) {
    // Supprimer le film des favoris de l'utilisateur
    $id_film = $_POST['id_film'];
    $query = "DELETE FROM favoris WHERE id_utilisateur = ? AND id_film = ?";
    $stmt = $BasePDO->prepare($query);
    $stmt->execute([$id_user, $id_film]);
    echo '<div style="background-color: red; color: white; padding: 10px;">Le film a été supprimé des favoris!</div>';
    header("Location: RickandMorty.php");
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