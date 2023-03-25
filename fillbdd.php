<?php

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Proviflix";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Chemin d'accès au répertoire contenant les images
$dir_path = "./ppN/";

// Boucle pour parcourir tous les fichiers d'images dans le répertoire
for ($i = 1; $i <= 316; $i++) {
    // Chemin d'accès au fichier d'image
    $file_path = $dir_path . "pp (" . $i . ").png";
    
    // Insertion du chemin d'accès de l'image dans la base de données
    $sql = "INSERT INTO pp (img_path) VALUES ('$file_path')";
    if (mysqli_query($conn, $sql)) {
        echo "Chemin d'accès de l'image $i inséré avec succès.\n";
    } else {
        echo "Erreur lors de l'insertion du chemin d'accès de l'image $i : " . mysqli_error($conn) . "\n";
    }
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);

?>
