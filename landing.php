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
  
  <title>Hello, world!</title>
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
                    <button style="height: 50px; width: 150px; margin-right: 2px; font-weight:bold; font-size:1.1rem;">Home</button>
<button style="height: 50px; width: 150px; margin-right: 2px; font-weight:bold; font-size:1.1rem;">TV Shows</button>
<button style="height: 50px; width: 150px; margin-right: 2px; font-weight:bold; font-size:1.1rem;">Movies</button>
<button style="height: 50px; width: 200px; margin-right: 2px; font-weight:bold; font-size:1.1rem;">News & Popular</button>
<button style="height: 50px; width: 150px; font-weight:bold; font-size:1.1rem;">My List</button>


                    </section>
                </div>
                <div class="netflix-dropdown-box dropdown" style="font-size: 1.2rem;">
                    <button class="netflix-dropdown dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"> Browse </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Home</a></li>
                        <li><a class="dropdown-item" href="#">TV Shows</a></li>
                        <li><a class="dropdown-item" href="#">Movies</a></li>
                        <li><a class="dropdown-item" href="#">News & Popular</a></li>
                        <li><a class="dropdown-item" href="#">My List</a></li>
                    </ul>
                </div>
            </div>
            <div class="right d-flex align-items-center" style="gap:0.5rem">
                <a href="./notification.php" style="font-size: 1.5rem;"><i class="bi bi-bell-fill"></i></a>
                <div class="profile-menu">
                  <a class="bi bi-person-fill" id="profile-button" style="font-size: 1.5rem;"><i class="bi bi-person-fill"></i></a>
                  <div class="profile-menu-content">
                    <div class="profile-menu-header">
                      <img class="profile-picture" src="path/to/default-profile-picture.png">
                      <button class="change-picture-button">Change Picture</button>
                    </div>
                    <ul class="profile-menu-options">
                      <li><a href="#">Edit Profile</a></li>
                      <li><a href="#">Account Settings</a></li>
                      <li><a href="./deconnexion.php">Sign Out</a></li>
                      </ul>
              </div>
            </div>
        </div>
    </div>
</div>
</nav>
<script>
    const profileMenu = document.querySelector('.profile-menu');
    const profileMenuContent = document.querySelector('.profile-menu-content');
    const changePictureButton = document.querySelector('.change-picture-button');
    const profileButton = document.querySelector('#profile-button');
    
    // Toggle profile menu
    profileButton.addEventListener('click', () => {
        profileMenuContent.classList.toggle('show');
    });
    
    // Change profile picture
    changePictureButton.addEventListener('click', () => {
        // Implement code to change profile picture here
    });
</script>



    <!-- /header -->


    <!-- video -->
    <div class="">
      <section class="netflix-home-video">
        <div class="top"></div>
        <div class="bottom"></div>
        <video src="./video/video1.mp4" autoplay loop></video>
<script>
  // Récupération de la vidéo
  const video = document.querySelector("video[src='./video/video1.mp4']");

  // Configuration de l'observer pour observer la vidéo
  const observer = new IntersectionObserver((entries) => {
    // Si la vidéo est visible, on joue la vidéo avec le son
    if (entries[0].isIntersecting) {
      video.play();
      video.muted = false;
    } else {
      // Si la vidéo n'est pas visible, on met en pause la vidéo et on désactive le son
      video.pause();
      video.muted = true;
    }
  });

  // On observe la vidéo
  observer.observe(video);
</script>

        <div class="content" style="padding-top:100px">
          <section class="left">
            <img src="./images/WednesdayLogo1.png" alt="" width="600px">

            <div class="d-flex mt-2">
              <button class="btn btn-light m-2"> <i class="bi bi-play-fill" style="color: black; padding: 0%;"></i> Play
                Now </button>
              <button class="btn btn-secondary m-2"><i class="bi bi-info-circle" style=" padding: 0%;"></i> More
                Info</button>
            </div>
          </section>

        </div>
      </section>

    </div>
    <!-- video -->

    <!-- sliders -->
    <div class="slider-box" >
      <div class="container-fluid slider">
        <section class="d-flex justify-content-between margin-right">
          <p class="text-white"> <b>Trending</b> </p>
          <div class="">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
              class="active tab-change-btn" aria-current="true" aria-label="Slide 1"></button>
            <button class="tab-change-btn" type="button" data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button class="tab-change-btn" type="button" data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
        </section>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

          <div class="carousel-inner" style="position: relative; overflow: visible;">
            <div class="carousel-item active">
              <section class="d-flex">
                
                
                <div class="card">
                  <img src="./images/trending/img3.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img4.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img1.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img2.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img6.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <a href="test.html"><i class="bi bi-play-circle-fill card-icon"></i></a>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">52% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 te  xt-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img6.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <a href="test.html"><i class="bi bi-play-circle-fill card-icon"></i></a>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">07% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 te  xt-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
              </section>
            </div>
            <div class="carousel-item">
              <section class="d-flex">
                <div class="card">
                  <img src="./images/trending/img1.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img2.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img3.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img4.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img1.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img2.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
              </section>
            </div>
            <div class="carousel-item">
              <section class="d-flex">
                <div class="card">
                  <img src="./images/trending/img7.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img2.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img3.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img4.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img1.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img2.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
              </section>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <div class="container-fluid slider2">
        <section class="d-flex justify-content-between margin-right margin-title">
          <p class="text-white"> <b>Hollywood</b> </p>
          <div class="">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
              class="active tab-change-btn" aria-current="true" aria-label="Slide 1"></button>
            <button class="tab-change-btn" type="button" data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button class="tab-change-btn" type="button" data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
        </section>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

          <div class="carousel-inner" style="position: relative; overflow: visible;">
            <div class="carousel-item active">
              <section class="d-flex">
                <div class="card">
                  <img src="./images/trending/img6.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img2.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img3.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img4.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img1.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img2.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
              </section>
            </div>
            <div class="carousel-item">
              <section class="d-flex ">
                <div class="card">
                  <img src="./images/trending/img1.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img2.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img3.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img4.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img1.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img2.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
              </section>
            </div>
            <div class="carousel-item">
              <section class="d-flex ">
                <div class="card">
                  <img src="./images/trending/img7.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img2.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img3.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img4.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img1.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img2.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
              </section>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <div class="container-fluid slider3">
        <section class="d-flex justify-content-between margin-right margin-title2">
          <p class="text-white"> <b>Bollywood</b> </p>
          <div class="">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
              class="active tab-change-btn" aria-current="true" aria-label="Slide 1"></button>
            <button class="tab-change-btn" type="button" data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button class="tab-change-btn" type="button" data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
        </section>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

          <div class="carousel-inner" style="position: relative; overflow: visible;">
            <div class="carousel-item active">
              <section class="d-flex ">
                <div class="card">
                  <img src="./images/trending/img6.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img2.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img3.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img4.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img1.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img2.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
              </section>
            </div>
            <div class="carousel-item">
              <section class="d-flex">
                <div class="card">
                  <img src="./images/trending/img1.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img2.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img3.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img4.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img1.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img2.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
              </section>
            </div>
            <div class="carousel-item">
              <section class="d-flex ">
                <div class="card">
                  <img src="./images/trending/img7.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img2.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img3.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img4.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img1.webp" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
                <div class="card">
                  <img src="./images/trending/img2.jpeg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <section class="d-flex justify-content-between">
                      <div>
                        <i class="bi bi-play-circle-fill card-icon"></i>
                        <i class="bi bi-plus-circle card-icon"></i>
                      </div>
                      <div>
                        <i class="bi bi-arrow-down-circle card-icon"></i>
                      </div>
                    </section>
                    <section class="d-flex align-items-center justify-content-between">
                      <p class="netflix-card-text m-0" style="color: rgb(0, 186, 0);">97% match</p>
                      <span class="m-2 netflix-card-text text-white">Limited Series</span> <span
                        class="border netflix-card-text p-1 text-white">HD</span>

                    </section>
                    <span class="netflix-card-text text-white">Provocative • Psychological • Thriller</span>
                  </div>
                </div>
              </section>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
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
                <li>Media Center</li>
                <li>Privacy</li>
                <li>Contact Us</li>
              </ul>
            </div>
            <div class="col-md-3">
              <ul>
                <li>Audio description</li>
                <li>Investor Relation</li>
                <li>Terms and Conditions</li>
                <li>Legal Notices</li>
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
                <li>Subscription</li>

              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-10 mx-auto">
          <div class="row">

            <div class="col">
              <p class="copy-right">@netflix copyright</p>
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