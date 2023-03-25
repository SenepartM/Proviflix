<?php
    try
    {
  $ipserver="localhost";  // Mettre l'ip
  $nomBase="Proviflix";
  $loginPrivilege ="root";
  $passPrivilege="root";
  $BasePDO= new PDO('mysql:host=' . $ipserver . ';dbname=' . $nomBase . '', $loginPrivilege, $passPrivilege);
 }catch(Exception $e){
    die('Erreur'.$e->getMessage());
 }
 ?>