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
  <a href="index.html"> <img src="img/logo-Proviflix.png" alt="Responsive image LOGO" class="img-fluid" /></a>
    </div>
        <div class="login-form">
             <?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email ou password incorrect
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                              <strong>Erreur</strong> email ou password incorrect 
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?>
                <style>
                .alert {
  background-color: #000;
  color: #fff;
  padding: 10px;
  margin: 0 auto 15px;
  border-radius: 5px;
  text-align: center;
  max-width: 500px;
}

.alert-danger {
  background-color: #e50914;
  border-color: #d50a11;
}
<?php
$email = '';
if (isset($_GET['email'])) {
  $email = htmlspecialchars($_GET['email']);
}?>
</style> 

            <div class="d-flex justify-content-center align-items-center" style="width: 100vw;">
        <section class="login-box">
            <h2 class="text-white">Se connecter</h2>
            <form action="connexion.php" method="post" class="mt-4">
            <div class="mb-3 bg-white rounded px-2" >
            <label for="exampleInputEmail1" class="form-label small-text">Email</label>
            <input type="email" name="email" class="form-control border-0 p-0" id="exampleInputEmail1"value="<?php echo $email;?>" required="required" autocomplete="off"aria-describedby="emailHelp">
            </div>
            <div class="mb-3 bg-white rounded px-2">
                <label for="exampleInputPassword1" class="form-label small-text">Mot de passe</label>
                    <input type="password" name="password" class="form-control border-0 p-0"  id="exampleInputPassword1" required="required" autocomplete="off">
                </div>
                
<button type="submit"class="btn btn-danger mt-3" style="width: 100%;background-color: #e50914;">Se connecter</button>
                
                <div class="mb-3 mt-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label text-white small-text" for="exampleCheck1">Se souvenir de moi.</label><h9 class="nobreak">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h9>
            </form>
            <style> .nobreak {
                    user-select: none; /* empêche la sélection de l'élément */
                    pointer-events: none; /* désactive les événements de souris sur l'élément */
                  }</style>
                <a href="help.php" style="text-decoration: none;color:white" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Besoin d'aide?</a>

</div>
<p class="m-0  text-white"> <span style="color: rgba(212, 212, 212, 0.75);">Nouveau sur Proviflix ?</span> <a href="inscription.php" style="text-decoration: none;color:white" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">S'inscrire maintenant.</a>
<p class="m-0 small-text text-white  mt-2"> <span style="color: rgba(212, 212, 212, 0.75);">Cette page est protégée par Google reCAPTCHA pour s'assurer que vous n'êtes pas un robot. <a href="https://www.google.com/recaptcha/about/" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Lire plus.</a>
                    </span> </p></div>
        <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>