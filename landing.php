<?php 
    session_start();
    require_once 'config.php'; // ajout connexion bdd 
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
  <link rel="stylesheet" href="package/css/swiper.min.css">
  <link rel="stylesheet" href="css/styles.css">
  
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
                    <a href=""><img src="img/logo-Proviflix.png" alt="Responsive image LOGO" style="width:150px;"></a>
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




  body{
    background-color: #141414;
    overflow-x: hidden;
    width: 100vw;
    /* position: relative; */
}

.netflix-padding-left{
    padding-left: 57px;
}


.netflix-padding-right{
    padding-right: 57px;
}

.netflix-navbar{
    /* background-color: #0C0C0C !important; */
    z-index: 1000;
    transition: background 0.2s linear;
    position: fixed;
    width: 100vw;
}

.navbar-brand img{
     width: 100px;
}

.netflix-row{
    width: 100%;
    display: flex;
    justify-content: space-between !important;
    align-items: center;
}
.netflix-row .left{
    width: max-content
}
.netflix-row .right{
    width: max-content
}

.netflix-dropdown-box{
    display: none;
}

.netflix-dropdown{
    background-color: transparent;
    color: #fff;
    border: none;
    font-size: 9px !important;
}

.netflix-dropdown-box .dropdown-menu{
    background-color: rgba(0, 0, 0, 0.784);
    font-size: 9px !important;
    color: #fff !important;
    margin-left: -80px;
    border-top: 3px solid #fff;
    margin-top: 30px;
}

.netflix-dropdown-box .dropdown-menu .dropdown-item{
     color: rgba(255, 255, 255, 0.646);
     text-align: center;
     width: 250px;
     font-size: 15px;
     padding: 10px 20px;
}

.netflix-dropdown-box .dropdown-menu .dropdown-item:hover{
    background-color: rgba(255, 255, 255, 0.133);
    color: #fff;
}

i{
    font-size: 20px;
    color: #fff;
    padding: 5px 20px;
}

.netflix-profile{
    width: 30px;
    height: 30px;
    background-color: gray;
    border-radius: 4px;
    margin-left: 20px;
    cursor: pointer;
}
.netflix-nav{
    display: block ;
    align-items: center;
}

.netflix-nav button{
    background-color: transparent;
    color: rgba(255, 255, 255, 0.623);
    border: none;
    font-size: 13px;
}

.netflix-nav button:hover{
    color: #fff;
}


.netflix-home-video{
    width: 100%;
    z-index: 10;
    position: relative;
}

.netflix-home-video .top{
    position: absolute;
    top: 0%;
    width: 100%;
    height: 40px;
    background: linear-gradient(to top, rgba(255, 255, 255, 0), rgb(0, 0, 0));
}

.netflix-home-video .bottom{
    position: absolute;
    bottom: 0%;
    width: 100%;
    height: 30px;
    background: linear-gradient(to bottom, rgba(255, 255, 255, 0), #141414);
}
.netflix-home-video video{
    width: 100%;
}


.netflix-home-video .content{
    position: absolute;
    top: 0%;
    width: 100%;
    /* background-color: #fff; */
    z-index: 100;
    display: flex;
}

.netflix-home-video .content .left{
    margin-left: 80px;
}
.netflix-home-video .content .left img{
   margin-top: 190px;
   
}
.netflix-home-video .content .right{
    width: 50%;
}


/*slider*/

.slider{
    /* position: absolute;
    top: 600px ;
    z-index: 500; */
    margin-left: 60px; 
}



.slider2{
    /* position: absolute;
    top: 600px ;
    z-index: 500; */
    margin-left: 60px; 
} 

.slider3{
    /* position: absolute;
    top: 600px ;
    z-index: 500; */
    margin-left: 60px;
}


.card{
    width: 250px;
    background-color: #141414;
    border-radius: 4px;
    transition: 0.2s linear;
    margin: 3px;
    position: relative;
}


.card:hover{
    transform: scaleX(1.4) scaleY(1.4);
    z-index: 10;
}


.card-body{
    display: none;
    /* height: 0px; */
    padding: 10px 15px;
    position: absolute;
    background-color: #141414;
    top: 120px;
    width: 100%;
}


.card-icon{
    color: #fff;
    padding: 0px !important;
    font-size: 28px;
    border-radius: 50%;
    cursor: pointer;
}

.card:hover > .card-body{
    display: block;
    /* height: max-content !important; */
}

.carousel-control-prev{
    display: none;
}

.carousel-control-next{
    display: none;
}

.tab-change-btn{
    border: none;
    width: 30px !important;
}


.margin-right{
    margin-right: 100px;
}

.netflix-card-text{
    font-size: 12px ;
}

.position-slider2{
    top: 10px !important;
    position: absolute !important;
}

.margin-title2{
    margin-top: 33px;
}

.position-slider3{
    top: 10px !important;
    position: absolute !important;
}


.footer{
    margin-top: 150px;
    margin-bottom: 100px;
}

ul{
    list-style: none;
    font-size: 15px ;
    color: rgba(255, 255, 255, 0.367);
    font-weight: 100;
}


.service-btn{
    background-color: transparent;
     margin-left: 30px;
      color: rgba(255, 255, 255, 0.367);
      border: 1px solid rgba(255, 255, 255, 0.367);
      font-size: 15px;
      font-weight: 100;
}

.copy-right{
    font-size: 15px;
      font-weight: 200;
      color: rgb(249, 14, 14);
      margin-left: 28px;
}
.swiper-slide {
  width: 391px;
  height: 192px;
  background-color: #141414;
}


</style>
            </div>
        </div>
    </div>
</nav>



    <!-- /header -->


    <!-- video -->
    <div class="">
      <section class="netflix-home-video">
        <div class="top"></div>
        <div class="bottom"></div>
        <video src="./video/video2.mp4" autoplay loop preload="auto"></video>
<script>
  // Récupération de la vidéo
  const video = document.querySelector("video[src='./video/video2.mp4']");

 // Configuration de l'observer pour observer la vidéo
const observer = new IntersectionObserver((entries) => {
  // Si la vidéo est visible, on joue la vidéo avec le son
  if (entries[0].isIntersecting) {
    video.play();
    video.muted = false;
    video.volume = 1;
  } else {
    // Si la vidéo n'est pas visible, on met en pause la vidéo et on désactive le son
    video.pause();
    video.muted = true;
  }
}, { threshold: 0.3 }); // Utilisation d'un seuil de 0,8 (80%)
observer.observe(video);

</script>

        <div class="content" style="padding-top:100px">
          <section class="left">
            <img src="./images/WednesdayLogo1.png" alt="" width="600px">

            <div class="d-flex mt-2">
              <a href="Series/Mercredi.php"><button class="btn btn-light m-2"> <i class="bi bi-play-fill" style="color: black; padding: 0%;"></i>Regarder</button></a>
              <button class="btn btn-secondary m-2"><i class="bi bi-info-circle" style=" padding: 0%;"></i> Plus d'info</button>
            </div>
          </section>

        </div>
      </section>

    </div>
    <!-- video -->

      


  <!-- Swiper -->

  <div class="netflix-slider">
    <h2>Série</h2>
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><a href="./Series/PrisonBreak.php"><img src="img/1.jpg" alt="Movie Title"></div></a>
        <div class="swiper-slide"><a href="./Series/HoD.php"><img src="img/2.jpg" alt="Movie Title"></div>
        <div class="swiper-slide"><a href="./Series/TheWitcher.php"><img src="img/3.jpg" alt="Movie Title"></div></a>
        <div class="swiper-slide"> <a href="./Series/RickandMorty.php"><img src="img/4.jpg" alt="Movie Title"></div></a>
        <div class="swiper-slide"> <a href="./Series/Mercredi.php"><img src="img/wednesdayaff.jpg" alt="Movie Title"></div></a>
        <div class="swiper-slide"><a href="./Series/Narcos.php"><img src="img/6.jpg" alt="Movie Title"></div></a>
        <div class="swiper-slide"><a href="./Series/Black-mirror.php"><img src="img/black-mirror.jpg" alt="Movie Title"></div></a>
        <div class="swiper-slide"><img src="img/8.jpg" alt="Movie Title"></div>
        <div class="swiper-slide"><img src="img/9.jpg" alt="Movie Title"></div>
        <div class="swiper-slide"><img src="img/10.jpg" alt="Movie Title"></div>
      </div>
      <!-- Add Pagination -->
      <!-- <div class="swiper-pagination"></div> -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>

  <div class="netflix-slider">
    <h2>Films</h2>
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><a href="./Series/HP1.php"><img src="img/harry.jpg" alt="Movie Title"></div></a>
        <div class="swiper-slide"><a href="./Series/EEAAO.php"><img src="img/EEAAO.jpg" alt="Movie Title"></div></a>
        <div class="swiper-slide"><a href="./Series/Interstellar.php"><img src="img/Interstellar.jpg" alt="Movie Title"></div></a>
        <div class="swiper-slide"><a href="./Series/Irishman.php"><img src="img/Irishman.jpg" alt="Movie Title"></div></a>
        <div class="swiper-slide"><a href="./Series/scream6.php"><img src="img/scream6.jpg" alt="Movie Title"></div></a>
        <div class="swiper-slide"><img src="img/7.jpg" alt="Movie Title"></div>
        <div class="swiper-slide"><img src="img/8.jpg" alt="Movie Title"></div>
        <div class="swiper-slide"><img src="img/9.jpg" alt="Movie Title"></div>
        <div class="swiper-slide"><img src="img/10.jpg" alt="Movie Title"></div>
      </div>
      <!-- Add Pagination -->
      <!-- <div class="swiper-pagination"></div> -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>

  <!-- Swiper JS -->
  <script src="package/js/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 6,
      spaceBetween: 10,
      slidesPerGroup: 2,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
















      
    </div>
    <!-- sliders-end -->


    <!-- footer  -->
    <div class="container footer">
      <div class="row">
        <div class="col-md-10 mx-auto">
          <div class="row">
            <div class="col-md-3">
              <ul>
                <li>Audio and Subtitle</li>
                <li>Damien le plus bo  Center</li>
                <li>Privacy</li>
                <li>Contact Us</li>
              </ul>
            </div>
            <div class="col-md-3">
              <ul>
                <li>en vrai mathias c un boloss </li>
                <li>Investor Relation</li>
                <li>Terms and Conditions</li>
                <li>Damien le bg </li>
              </ul>
            </div>
            <div class="col-md-3">
              <ul>
                <li>Help Center</li>
                <li>Jobs</li>

              </ul>
            </div>
            <div class="col-md-3">
              <ul>
                <li>Gift card</li>
                <li>vas te faire foutre mathias c est tom bisous</li>

              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-10 mx-auto">
          <div class="row">

            <div class="col">
              <p class="copy-right">@Proviflix copyright</p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->


  <script src="./javaScript.js"></script>
</body>

</html>