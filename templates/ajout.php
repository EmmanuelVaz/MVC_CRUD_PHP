<?php
 
$title = "Ajouter un Stagiaire";

ob_start();
?>
<h1>Ajouter un Stagiaire</h1>
<form class="container" action="index.php?action=ajouterbdd" method="POST">
    <table class="table">
        <tr>
            <td><label for="prenom">Prénom</label></td>
            <td><input type="text" name="prenom" id="login_membre" value="<?php
                                                                            if (isset($_POST["submit"])) {
                                                                                echo $_POST['prenom'];
                                                                            }?>"></td>
            <td>
                <?php 
                if (isset($_POST['submit'])) {
                    echo $erreurs['prenom'];
                }?>
            </td>
        </tr>
        <tr>
            <td><label for="nom">Nom</label></td>
            <td><input type="text" name="nom" id="nom_membre" value="<?php 
                                                                    if (isset($_POST["submit"])) {
                                                                        echo $_POST['nom'];
                                                                    }?>"></td>
            <td>
            <?php 
                if (isset($_POST['submit'])) {
                    echo $erreurs['nom'];
                }?>                                                    
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