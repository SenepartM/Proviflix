<?php
// La classe User représente un utilisateur avec ses attributs et méthodes
class User {
  private $id;
  private $pseudo;
  private $email;
  private $password;
  private $ip;
  private $dateInscription;
  private $token;

  // Le constructeur initialise les attributs de l'utilisateur
  public function __construct($id, $pseudo, $email, $password, $ip, $dateInscription, $token) {
    $this->id = $id;
    $this->pseudo = $pseudo;
    $this->email = $email;
    $this->password = $password;
    $this->ip = $ip;
    $this->dateInscription = $dateInscription;
    $this->token = $token;
  }

  // Cette méthode permet de vérifier si l'adresse e-mail est présente dans la base de données
  public static function emailExists($email) {
    // Connexion à la base de données
    $ipserver = "192.168.64.206";
    $nomBase = "Proviflix";
    $loginPrivilege = "root";
    $passPrivilege = "root";
    $pdo = new PDO("mysql:host=$ipserver;dbname=$nomBase", $loginPrivilege, $passPrivilege);

    // Vérifier la connexion
    if (!$pdo) {
      die("Connection failed: " . $pdo->errorInfo());
    }

    // Vérifier si l'adresse e-mail saisie par l'utilisateur est présente dans la base de données
    $sql = "SELECT * FROM User WHERE email=:email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      // Si l'adresse e-mail est déjà présente dans la base de données, fermer la connexion et retourner true
      $pdo = null;
      return true;
    } else {
      // Sinon, fermer la connexion et retourner false
      $pdo = null;
      return false;
    }
  }

  // Cette méthode permet de créer un nouvel utilisateur dans la base de données
  public static function createUser($pseudo, $email, $password, $ip) {
    // Générer un jeton unique pour l'utilisateur
    $token = bin2hex(random_bytes(32));

    // Crypter le mot de passe avant de l'enregistrer dans la base de données
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Connexion à la base de données
    $ipserver = "192.168.64.206";
    $nomBase = "Proviflix";
    $loginPrivilege = "root";
    $passPrivilege = "root";
    $pdo = new PDO("mysql:host=$ipserver;dbname=$nomBase", $loginPrivilege, $passPrivilege);

    // Vérifier la connexion
    if (!$pdo) {
      die("Connection failed: " . $pdo->errorInfo());
    }

    // Préparer la requête SQL pour insérer un nouvel utilisateur dans la base de données
    $sql = "INSERT INTO User (pseudo, email, password, ip, date_inscription, token) VALUES (:pseudo, :email, :password, :ip, NOW(), :token)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":password", $password_hash, PDO::PARAM_STR);
    $stmt->bindParam(":ip", $ip, PDO::PARAM_STR);
    $stmt->bindParam(":token", $token, PDO::PARAM_STR);
    $stmt->execute();

    // Récupérer l'ID de l'utilisateur nouvellement créé
    $id = $pdo->lastInsertId();

    // Fermer la connexion à la base de données
    $pdo = null;

    // Retourner un nouvel objet User avec les attributs de l'utilisateur nouvellement créé
    return new User($id, $pseudo, $email, $password_hash, $ip, date("Y-m-d H:i:s"), $token);
  }
}
