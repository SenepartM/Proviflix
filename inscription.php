<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="./style1.css">
            <title>Inscription</title>
        </head>
        <body>
        <div class="login-form">
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
                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte deja existant
                            </div>
                        <?php 

                    }
                }
                ?>
            
            <form action="inscription_traitement.php" method="post">
                <h2 class="text-center">Inscription</h2>       
                <div class="form-group">
                    <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                    
                </div>   
                
            </form>
            <a style="margin-left:700px;" href="loginPage.html" class="suscribe">Connexion</a>
        </div>
        <style>
        .suscribe {
    height: 4rem;
    letter-spacing: .1px;
    font-size: 1.2rem;
    text-transform: uppercase;
    background-color: #e50914;
    line-height: normal;
    color: #fff;
    padding: 0.25rem 0.75rem;
    border-radius: 0.25rem;
}
a {
  text-decoration: none;
  color: inherit;
}
a:hover {
  text-decoration: none;
  color: inherit;
}
form {
  max-width: 400px;
  margin: 50px auto;
  padding: 20px;
  background-color: #111;
  border-radius: 5px;
}

h2 {
  color: #fff;
  text-align: center;
  margin-bottom: 30px;
}

.form-group {
  position: relative;
  margin-bottom: 20px;
}

.form-control {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  font-weight: 300;
  background-color: #222;
  border: none;
  border-radius: 3px;
  color: #fff;
  box-shadow: none;
}

.form-control:focus {
  outline: none;
  box-shadow: none;
  border: none;
}

.form-control:focus + label {
  transform: translateY(-25px);
  color: #e50914;
  font-size: 12px;
}

label {
  position: absolute;
  top: 10px;
  left: 10px;
  color: #aaa;
  font-size: 16px;
  font-weight: 300;
  transition: all 0.2s ease;
}

.btn-primary {
  background-color: #e50914;
  border: none;
  border-radius: 3px;
  padding: 10px;
  font-size: 16px;
  font-weight: 300;
  color: #fff;
  cursor: pointer;
  transition: all 0.2s ease;
}

.btn-primary:hover {
  background-color: #b2070d;
}

</style>

        </body>
</html>