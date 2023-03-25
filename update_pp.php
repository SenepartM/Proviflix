<?php
session_start();
require_once 'config.php';

// si la session n'existe pas, c'est-à-dire si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion
if(!isset($_SESSION['user'])){
    header('Location: index.php');
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

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Changer l'image de profil</title>
    <style>
        /* arrière-plan et couleurs */
        body {
            background-color: #141414;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        /* en-tête */
        h1 {
            font-size: 3rem;
            margin: 0 0 2rem;
        }

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

    <p style="text-align:center; font-size:2.5rem;">Bonjour <?php echo $_SESSION['user']; ?> !</p>

    <p style="text-align: center; font-size: 2rem; margin-bottom: 1rem;">Image de profil actuelle :</p>
<img src="<?php echo $img_path; ?>" alt="Image de profil actuelle" style="display: block; margin: 0 auto; width: 200px; height: 200px; border-radius: 12px; box-shadow: 0px 0px 10px #000; transition: transform 0.3s ease-in-out;">


    <form method="post">
    <button type="submit" name="submit">Changer d'image de profil</button>
        <p>Nouvelle image de profil :</p>
        <?php
            // Affichage des images de profil disponibles
            for ($i = 1; $i <= 198; $i++) {
                $pp_path = "./ppN/avatar (" . $i . ").png";
                echo '<label><input type="radio" name="pp_id" value="' . $pp_path . '"';
                if ($img_path == $pp_path) {
                    echo ' checked';
                }
                echo '><img src="' . $pp_path . '" alt="Image de profil ' . $i . '"></label>';
            }
        ?>
        <br>
        
    </form>
</body>
</html>
