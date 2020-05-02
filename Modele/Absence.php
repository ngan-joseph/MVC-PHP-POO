<?php
class Absence extends Modele {
    // Renvoie la liste des absences associées à un élève
 public function getabsences($cneeleve){
     $sql='select code_matiere,date,nombre_heure from absence where cne=?';
    $absences=$this->executerRequete($sql, array($cneeleve));
    return $absences;
  }
   //renvoie le total des absences par matière
public function totalabsence($cneeleve){
$sql='select code_matiere, sum(nombre_heure) from absence where cne=? group by code_matiere';
 $Tabsences=$this->executerRequete($sql, array($cneeleve));
 return $Tabsences;
 }
    //renvoie le total des absences
public function totalabsences($cneeleve){
$sql='select sum(nombre_heure) from absence where cne=?';
 $Tabsencess=$this->executerRequete($sql, array($cneeleve));
 return $Tabsencess;
 } 
 // Ajoute une absence dans la base
public function ajouterAbsence($code_matiere, $nombre_heure, $cneeleve) {
    $sql = 'insert into absence(code_matiere, date, nombre_heure, cne) values(?, ?, ?, ?)';
    $date = date(DATE_W3C); // Récupère la date courante
$this->executerRequete($sql, array($code_matiere, $date, $nombre_heure, $cneeleve));
}
}