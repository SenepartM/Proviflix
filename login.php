<?php 
    function loginForm($password) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['password']) && $_POST['password'] === $password) {
            header('Location: index.php');
        } else {
            echo 'Mot de passe incorrect..';
        }
    }
    echo '<form method="post">Mot de passe : <input type="password" name="password" /><input type="submit" value="Se connecter" /></form>';
}
$password = 'root';
loginForm($password);
?>