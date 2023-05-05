<?php
require_once 'modele.php';

function liste_stagiaires(){
    $stagiaires = get_all_stagiaires();
    require "templates/listestagiaires.php";
}

function supprimer_stagiaire($id){

    delete_stagiaire_by_id($id);
    $stagiaires = get_all_stagiaires();
    require "templates/listestagiaires.php";
   
}

function modifier_stagiaire($id,$nom,$prenom){

    $affectedLines = modif_stagiaire($id,$nom,$prenom);

    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier le stagiaire !');
    } else {
        header('Location: index.php');
    }
}

function ajouter_stagiaire_vue(){
    require "templates/ajout.php";
}

function ajouter_stagiaire_bdd($nom,$prenom){

    $erreurs = array();
    
    if (isset($_POST['submit'])) {
        
        $erreurs['prenom'] = "";
        $erreurs['nom'] = "";

        if (empty($_POST['prenom'])) {
            $erreurs['prenom'] = "Veuillez remplir le champ!!!";
        }
        elseif (!empty($_POST['prenom']) && !preg_match("#^[A-Za-z-']{2,}$#", $_POST['prenom'])) {
            $erreurs['prenom'] = "Veuillez rentré un Prénom valide !!!";
        }
        elseif (empty($_POST['nom'])) {
            $erreurs['nom'] = "Veuillez remplir le champ!!!";
        }
        elseif (!empty($_POST['nom']) && !preg_match("#^[A-Za-z-']{2,}$#", $_POST['nom'])) {
            $erreurs['nom'] = "Veuillez rentré un Nom valide !!!";
        }
        else {
            ajout_stagiaire($nom,$prenom);
            header('Location: index.php');
        }
        
        require "templates/ajout.php";
    }
}



function select_stagiaire(){

    $stagiaire = get_stagiaire_by_id($_GET['id']);
    require "templates/modif.php";
}

// Affiche une erreur dans une vue erreur.php 
// qui centralise toutes les levées d'Exceptions 
function erreur($msgErreur) {
    require 'templates/erreur.php';
}
?>



