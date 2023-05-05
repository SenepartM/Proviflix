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
  public static function seConnecter($email, $password) {
    require_once 'config.php';

    // Vérifier si l'adresse e-mail saisie par l'utilisateur est présente dans la base de données
    $sql = "SELECT * FROM User WHERE email=:email";
    $stmt = $BasePDO->prepare($sql);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
      // Si l'adresse e-mail est présente dans la base de données, récupérer les informations de l'utilisateur
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $id = $row['id'];
      $pseudo = $row['pseudo'];
      $email = $row['email'];
      $password_hash = $row['password'];
      $ip = $row['ip'];
      $dateInscription = $row['date_inscription'];
      $token = $row['token'];

      // Vérifier si le mot de passe saisi par l'utilisateur correspond à celui enregistré dans la base de données
      if (password_verify($password, $password_hash)) {
        // Si le mot de passe est correct, retourner un nouvel objet User avec les attributs de l'utilisateur
        return new User($id, $pseudo, $email, $password_hash, $ip, $dateInscription, $token);
      } else {
        // Si le mot de passe est incorrect, retourner null
        return null;
      }
    } else {
      // Si l'adresse e-mail n'est pas présente dans la base de données, retourner null
      return null;
    }
  }

  // Cette méthode permet de vérifier si l'adresse e-mail est présente dans la base de données
  public static function emailExists($email) {
    require_once 'config.php';

    // Vérifier si l'adresse e-mail saisie par l'utilisateur est présente dans la base de données
    $sql = "SELECT * FROM User WHERE email=:email";
    $stmt = $BasePDO->prepare($sql);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      // Si l'adresse e-mail est déjà présente dans la base de données, retourner true
      return true;
    } else {
      // Sinon, retourner false
      return false;
    }
  }

  // Cette méthode permet de créer un nouvel utilisateur dans la base de données
  public static function createUser($pseudo, $email, $password, $ip) {
    require_once 'config.php';

    // Générer un jeton unique pour l'utilisateur
    $token = bin2hex(random_bytes(32));

    // Crypter le mot de passe avant de l'enregistrer dans la base de données
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Préparer la requête SQL pour insérer un nouvel utilisateur dans la base de données
    $sql = "INSERT INTO User (pseudo, email, password, ip, date_inscription, token) VALUES (:pseudo, :email, :password, :ip, NOW(), :token)";
    $stmt = $BasePDO->prepare($sql);
    $stmt->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":password", $password_hash, PDO::PARAM_STR);
    $stmt->bindParam(":ip", $ip, PDO::PARAM_STR);
    $stmt->bindParam(":token", $token, PDO::PARAM_STR);
    $stmt->execute();

    // Récupérer l'ID de l'utilisateur nouvellement créé
    $id = $BasePDO->lastInsertId();

    // Retourner un nouvel objet User avec les attributs de l'utilisateur nouvellement créé
    return new User($id, $pseudo, $email, $password_hash, $ip, date("Y-m-d H:i:s"), $token);
  }
}
