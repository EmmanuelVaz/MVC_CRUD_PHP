<?php
 
$title = "Modifier un stagiaire";
ob_start();
?>
<h1>Modif Stagiaire</h1>
<form class="container" action="index.php?action=modifier&id=<?=$stagiaire["id_membre"]?>" method="POST">
    <table class="table">
        <tr>
            <td><label for="prenom">Prénom</label></td>
            <td><input type="text" name="prenom" id="login_membre" value="<?php echo $stagiaire['login_membre']?>"></td>
            <td>

            </td>
        </tr>
        <tr>
            <td><label for="nom">Nom</label></td>
            <td><input type="text" name="nom" id="nom_membre" value="<?php echo $stagiaire['nom_membre']?>"></td>
            <td>

            </td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" id="submit" value="Envoyer"></td>
            <td><input type="reset" id="annuler" value="Annuler"></td>
        </tr>
    </table>
</form>
<?php
$content = ob_get_clean();
include "baselayout.php";
?>