<?php
require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurEleve.php';
require_once 'Vue/Vue.php';
class Routeur {
    private $ctrlAccueil;
    private $ctrlEleve; 

// Affiche la liste de tous les élèves
public function __construct() {
    $this->ctrlAccueil = new ControleurAccueil();
    $this->ctrlEleve = new ControleurEleve();
    }
// Recherche un paramètre dans un tableau
private function getParametre($tableau, $nom) {
    if (isset($tableau[$nom])) {
    return $tableau[$nom];
    }
    else
    throw new Exception("Paramètre '$nom' absent");
    } 
// Traite une requête entrante
public function routerRequete() {
    try {
        if (isset($_GET['action'])) {
        if ($_GET['action'] == 'eleve') {
        if (isset($_GET['cneeleve'])) {
        $cneeleve = intval($this->getParametre($_GET, 'cneeleve'));
        if ($cneeleve != 0)
        $this->ctrlEleve->eleve($cneeleve);
        else
        throw new Exception("Identifiant d eleve non valide");
        }
        else
        throw new Exception("Identifiant d eleve non défini");
        }
        elseif ($_GET['action'] == 'activer'){
            if (isset($_GET['cneeleve'])) {
                $cneeleve = intval($this->getParametre($_GET, 'cneeleve'));
                if ($cneeleve != 0)
                $this->ctrlAccueil->activation($cneeleve);
                else
                throw new Exception("Identifiant d eleve non valide");
                }
                else
                throw new Exception("Identifiant d eleve non défini");    
        }
        else if ($_GET['action'] == 'ajouter') {
            $code_matiere = $this->getParametre($_POST, 'matiere');
            $nombre_heure = $this->getParametre($_POST, 'heure');
            $cneeleve = $this->getParametre($_POST, 'cneeleve');
            $this->ctrlEleve->ajouter($code_matiere, $nombre_heure, $cneeleve);
        }
        else
        throw new Exception("Action non valide");
        }
        else {
            $this->ctrlAccueil->accueil(); // action par défaut
        }
        }
        catch (Exception $e) {
       $this-> erreur($e->getMessage());
        }
    }
    // Affiche une erreur
private function erreur($msgErreur) {
    $vue = new Vue("Erreur");
$vue->generer(array('msgErreur' => $msgErreur));
}
    }

