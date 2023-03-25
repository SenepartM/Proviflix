<form action="update_pp.php" method="post">
    <?php
    // Connexion à la base de données
    $pdo = new PDO('mysql:host=localhost;dbname=Proviflix', 'root', 'root');

    // Récupération des données de la table pp
    $query = "SELECT * FROM pp";
    $statement = $pdo->query($query);
    $pp_data = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Parcours des données et affichage des images
    foreach ($pp_data as $row) {
        echo '<label>';
        echo '<input type="radio" name="pp_id" value="'.$row['id'].'"';
        if ($row['id'] == $user_pp_id) {
            echo ' checked';
        }
        echo '>';
        echo '<img src="'.$row['img_path'].'" alt="Image '.$row['id'].'">';
        echo '</label>';
    }
    ?>
    <button type="submit">Enregistrer</button>
</form>
