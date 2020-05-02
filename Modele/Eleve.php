<?php
require_once 'Modele/Modele.php';
class Eleve extends Modele {
//renvoi la liste de tous les élèves
public function geteleves(){
    $sql = 'select cne,nom,prenom,photo, etat from eleves';
    $eleves=$this->executerRequete($sql);
    return $eleves;
}
 //renvoie les informaions sur un élève
 public function geteleve($cneeleve){
    $sql='select cne,nom,prenom,photo,etat from eleves where cne=?';
    $eleve=$this->executerRequete($sql, array($cneeleve));
    if($eleve->rowCount() ==1)
        return $eleve->fetch(); //accès à la première ligne du résultat
     else
       throw new Exception("Aucun eleve ne correspond a l identifiant '$cneeleve'");
  }
// modifie l'état d 'un élève
public function activer($cneeleve){
    $eleve=$this->geteleve($cneeleve);
		    if($eleve["etat"]=="true"){
            $sql="update eleves set etat='false' where cne='".$cneeleve."'";
           $req=$this->executerRequete($sql);
		}
		else{
            $sql="update eleves set etat='true' where cne='".$cneeleve."'";
           $req=$this->executerRequete($sql);
             }
      return $req;
	}
}