<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=Proviflix', 'root', 'root');

// Récupération des données de la table pp
$query = "SELECT * FROM pp";
$statement = $pdo->query($query);
$pp_data = $statement->fetchAll(PDO::FETCH_ASSOC);

// Parcours des données et affichage des images
foreach ($pp_data as $row) {
    echo '<img src="'.$row['img_path'].'" alt="'.$row['id'].'">';
}
?>
