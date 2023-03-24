<?php
    try
    {
  $ipserver="192.168.64.206";
  $nomBase="Proviflix";
  $loginPrivilege ="root";
  $passPrivilege="root";
  $BasePDO= new PDO('mysql:host=' . $ipserver . ';dbname=' . $nomBase . '', $loginPrivilege, $passPrivilege);
 }catch(Exception $e){
    die('Erreur'.$e->getMessage());
 }
 ?>