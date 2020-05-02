<?php
require_once 'Modele/Eleve.php';
require_once 'Modele/Absence.php';
require_once 'Vue/Vue.php';
class ControleurEleve {
private $eleve;
private $absence;
private $Tabsences;
private $Tabsencess;

public function __construct() {
$this->eleve = new Eleve();
$this->absence = new Absence();
}
// Affiche les détails sur un élève
public function eleve($cneeleve) {
$eleve= $this->eleve->geteleve($cneeleve);
$absences = $this->absence->getabsences($cneeleve);
$Tabsences = $this->absence->totalabsence($cneeleve);
$Tabsencess = $this->absence->totalabsences($cneeleve);
$vue = new Vue("Eleve");
$vue->generer(array('eleve' => $eleve, 'absences' => $absences, 'Tabsences' => $Tabsences, 'Tabsencess' => $Tabsencess));
}
// Ajoute une absence à un billet
public function ajouter($code_matiere, $nombre_heure, $cneeleve) {
    // Sauvegarde de l'absence
    $this->absence->ajouterAbsence($code_matiere, $nombre_heure, $cneeleve);
    // Actualisation de l'affichage de l'élève
    $this->eleve($cneeleve);
    }
}