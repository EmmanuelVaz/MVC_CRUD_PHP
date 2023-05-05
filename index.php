<?php
require_once 'controller.php';

try{
    if (!isset($_GET["action"])) {
        
        liste_stagiaires();

    }else if(isset($_GET["action"])){
        if($_GET["action"] == "suppr"){
           
            if(isset($_GET["id"])){
                supprimer_stagiaire($_GET["id"]);
            }else{
                throw new Exception("<span style='color:red'>Aucun identifiant de stagiaire envoyé</span>");
            }
        }
        if ($_GET["action"] == "select") {
            
            // Action pour séléctionner le stagiaire en vue de la modification + affichage de la vue
            if (isset($_GET["id"])) {
                select_stagiaire(); 
            } else {
                throw new Exception ("<span style='color:red'>Aucun identifiant de stagiaire envoyé</span>");
            } 

            // Action de modification du stagiaire 
        } elseif ($_GET['action'] == "modifier") {
            if (isset($_GET["id"])) {
                if (!empty($_POST['nom']) && !empty($_POST["prenom"])) {
                    modifier_stagiaire($_GET["id"], $_POST["nom"], $_POST["prenom"]);
                }
            }
        }
            // Action pour afficher la vue de la page ajouter stagiaire
        if ($_GET["action"] == "ajouter") {
            ajouter_stagiaire_vue();

            // Action pour ajouter le stagiaire dans la bdd
        } elseif ($_GET["action"] == "ajouterbdd") {
            
            ajouter_stagiaire_bdd($_POST["nom"],$_POST["prenom"]);

        }

    } else {

        throw new Exception("<h1>Page non trouvée !!!</h1>");
    }
}catch(Exception $e){

    $msgErreur = $e->getMessage();
    echo erreur($msgErreur);
}
?>
