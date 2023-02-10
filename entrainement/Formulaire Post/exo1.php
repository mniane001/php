<?php
$contenu = '';


//----------------Enregistrement---------------//
if($_POST){
    //Récupérer le saisi de l'internaute et l'afficher sur la page web
    echo "nom : $_POST[nom] <br>";
    echo "prenom : $_POST[prenom] <br>";
    echo "adresse : $_POST[adresse] <br>";
    echo "ville : $_POST[ville] <br>";
    echo "cp : $_POST[cp] <br>";
    echo "sexe : $_POST[sexe] <br>";
    echo "description : $_POST[description] <br>";

    
}




//------------------Formulaire d'envoi de commentaire--------------------//
?>
<hr>
<!Doctype html>
<html>
    <head>
    <h1>Formulaire de profil</h1>
    </head>
    <body>
        <div class="profil"><?php echo $contenu; ?></div>
        <form method="post" action="">
            <label for="nom">Nom</label><br>
            <input type="text" id="nom" name="nom" maxlength="20" pattern="[a-zA-Z0-9.-_]+" title="caractère autorisés : a-zA-Z0-9.-_"><br>

            <label for="prenom">Prenom</label><br>
            <input type="text" id="prenom" name="prenom" maxlength="20" pattern="[a-zA-Z0-9.-_]+" title="caractère autorisés : a-zA-Z0-9.-_"><br>

            <label for="adresse">Adresse</label><br>
            <input type="text" id="adresse" name="adresse" maxlength="40" pattern="[a-zA-Z0-9.-_]+" title="caractère autorisés : a-zA-Z0-9.-_"><br>

            <label for="ville">Ville</label><br>
            <input type="text" id="ville" name="ville" maxlength="20" pattern="[a-zA-Z0-9.-_]+" title="caractère autorisés : a-zA-Z0-9.-_"><br>

            <label for="cp">Code Postal</label><br>
            <input type="text" id="cp" name="cp" maxlength="20" pattern="[a-zA-Z0-9.-_]+" title="caractère autorisés : a-zA-Z0-9.-_"><br><br>

            <label for="sexe">Sexe</label>
            <select id="sexe" name="sexe">
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
            </select><br><br>
            

            <label for="description">Description</label><br>
            <textarea id="description" name="description" cols="50" rows="7"></textarea><br>

            <input type="submit" value="envoi">

        </form>
    </body>
</html>


