<?php
$contenu = '';

//----------------Enregistrement---------------//
if($_POST){
    //Récupérer le saisi de l'internaute et l'afficher sur la page web
    echo "Titre : $_POST[titre] <br>";
    echo "Couleur : $_POST[couleur] <br>";
    echo "taille : $_POST[taille] <br>";
    echo "Poids : $_POST[poids] <br>";
    echo "stock : $_POST[prix] <br>";
    echo "fournisseur : $_POST[fournisseur] <br>";
    echo "description : $_POST[description] <br>";

    
}




//------------------Formulaire d'envoi de commentaire--------------------//
?>
<hr>
<!Doctype html>
<html>
    <head>
    <h1>Formulaire de profil de produit</h1>
    </head>
    <body>
        <div class="produit"><?php echo $contenu; ?></div>
        <form method="post" action="">
            <label for="titre">Titre</label><br>
            <input type="text" id="titre" name="titre" maxlength="20" pattern="[a-zA-Z0-9.-_]+" title="caractère autorisés : a-zA-Z0-9.-_"><br>

            <label for="couleur">Couleur</label><br>
            <input type="text" id="couleur" name="couleur" maxlength="20" pattern="[a-zA-Z0-9.-_]+" title="caractère autorisés : a-zA-Z0-9.-_"><br>

            <label for="taille">Taille</label><br>
            <input type="text" id="taille" name="taille" maxlength="40" pattern="[a-zA-Z0-9.-_]+" title="caractère autorisés : a-zA-Z0-9.-_"><br>

            <label for="poids">Poids</label><br>
            <input type="text" id="poids" name="poids" maxlength="20" pattern="[a-zA-Z0-9.-_]+" title="caractère autorisés : a-zA-Z0-9.-_"><br>

            <label for="prix">Prix</label><br>
            <input type="text" id="prix" name="prix" maxlength="20" pattern="[a-zA-Z0-9.-_]+" title="caractère autorisés : a-zA-Z0-9.-_"><br><br>

            <label for="stock">Stock</label><br>
            <input type="text" id="stock" name="stock" maxlength="20" pattern="[a-zA-Z0-9.-_]+" title="caractère autorisés : a-zA-Z0-9.-_"><br><br>

            <label for="fournisseur">Fournisseur</label><br>
            <input type="text" id="fournisseur" name="fournisseur" maxlength="20" pattern="[a-zA-Z0-9.-_]+" title="caractère autorisés : a-zA-Z0-9.-_"><br><br>
            

            <label for="description">Description</label><br>
            <textarea id="description" name="description" cols="50" rows="7"></textarea><br>

            <input type="submit" value="envoi">

        </form>
    </body>
</html>


