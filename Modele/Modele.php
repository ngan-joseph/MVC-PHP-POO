<?php
abstract class Modele{
 //objet PDO d'accès à la BD
 private $bdd;
 // Exécute une requête SQL éventuellement paramétrée
protected function executerRequete($sql, $params = null) {
  if ($params == null) {
  $resultat = $this->getBdd()->query($sql); // exécution directe
  }
  else {
  $resultat = $this->getBdd()->prepare($sql); // requête préparée
  $resultat->execute($params);
  }
  return $resultat;
  }
   //Effectue la connexion à la BDD, instancie et renvoie l'objet PDO associé
 private function getBdd(){
   if($this->bdd==null){
     //création de la connexion
    $this->bdd = new PDO('mysql:host=localhost;dbname=ensat2;charset=utf8','root'
             , '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
   }
   return $this->bdd;
   } 
}