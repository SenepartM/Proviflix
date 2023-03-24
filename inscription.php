<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Proviflix</title>
    <link rel="stylesheet" href="./style1.css">
    <link rel="shortcut icon" href="img/Proviflix.ico">
  </head>
  <body>
  <div class="login-top">
        <img src="img/logo-Proviflix.png" alt="">
    </div>

    <div class="container">
      <div class="row justify-content-center">
        
         
              <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie !
                            </div>
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe différent
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email non valide
                            </div>
                        <?php
                        break;

                        case 'email_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email trop long
                            </div>
                        <?php 
                        break;

                        case 'pseudo_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> pseudo trop long
                            </div>
                        <?php 
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte déjà existant
                            </div>
                        <?php 
                        break;

                    }
                }
              ?>
              <div class="d-flex justify-content-center align-items-center" style="width: 100vw;">
        <section class="login-box">
            <h2 class="text-white">S'inscrire</h2>
              <form action="inscription_traitement.php" method="post"class="mt-4">
              <div class="mb-3 bg-white rounded px-2" >      
              <label for="exampleInputEmail1" class="form-label small-text">Pseudo</label>
            <input type="text" name="pseudo" class="form-control border-0 p-0" id="exampleInputEmail1" required="required" autocomplete="off">
            </div>
            <div class="mb-3 bg-white rounded px-2">
            <label for="exampleInputEmail1" class="form-label small-text">Email</label>
            <input type="email" name="email" class="form-control border-0 p-0" id="exampleInputEmail1" required="required" autocomplete="off"aria-describedby="emailHelp">
            </div>
            <div class="mb-3 bg-white rounded px-2">
            <label for="exampleInputPassword1" class="form-label small-text">Mot de passe</label>
                    <input type="password" name="password" class="form-control border-0 p-0"  id="exampleInputPassword1" required="required" autocomplete="off">
            </div>
           <div class="mb-3 bg-white rounded px-2">
            <label for="exampleInputPassword1" class="form-label small-text">Confirmer le mot de passe</label>
            <input type="password" name="password_retype" class="form-control border-0 p-0"  id="exampleInputPassword1" required="required" autocomplete="off">
            </div>
            <div class="form-group text-center">
            <button type="submit"class="btn btn-danger mt-3" style="width: 100%;background-color: #e50914;">S'inscrire</button>
            </div>
          </form>
          <p class="m-0  text-white"> <span style="color: rgba(212, 212, 212, 0.75);">Déjà inscrit ?</span> <a href="index.php" style="text-decoration: none;color:white" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Connectez vous.</a>
<p class="m-0 small-text text-white  mt-2"> <span style="color: rgba(212, 212, 212, 0.75);">Cette page est protégée par Google reCAPTCHA pour s'assurer que vous n'êtes pas un robot. <a href="https://www.google.com/recaptcha/about/" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Lire plus.</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-Ql0Gzxh+4b8w4sbx4/OJgsa27hDMWh/M6UHvOF9Lr6ALIY2y2Nw8sB1dEtIzgkD6" crossorigin="anonymous"></script>
            </body>
            </html>