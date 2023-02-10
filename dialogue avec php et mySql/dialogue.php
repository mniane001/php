<?php
//----------------Connexion à la BD------------------//
$mysqli = new Mysqli('localhost', 'root', '', 'dialogue');
$contenu = '';

//----------------Enregistrement---------------//
if($_POST){
    //Récupérer le saisi de l'internaute et l'afficher sur la page web
    //echo "pseudo posté : $_POST[pseudo] <br>";
    //echo "message posté : $_POST[message] <br>";

    //Récupérer le saisi de l'internaute et l'afficher sur la BD dialogue
    // $mysqli->query("INSERT INTO commentaire (pseudo, message, date_enregistrement) 
    // VALUES ('$_POST[pseudo]', '$_POST[message]', NOW())") OR DIE ($mysqli->error);
    // echo '<div class="validation"> Votre message a bien été enregistré.</div>';

    //éviter les injections sql avec htmlentities()
    $_POST['pseudo'] = htmlentities($_POST['pseudo'], ENT_QUOTES);
    $_POST['message'] = htmlentities($_POST['message'], ENT_QUOTES); 
    //Permettre les messages avec apostrophe et vérifie que l'utilisateur a bien saisie quelques choses avant de l'envoyer dans la BD
    $_POST['pseudo'] = addslashes($_POST['pseudo']);
    $_POST['message'] = addslashes($_POST['message']);
    if(!empty($_POST['pseudo']) && !empty($_POST['message'])){
        $mysqli->query("INSERT INTO commentaire (pseudo, message, date_enregistrement) 
        VALUES ('$_POST[pseudo]', '$_POST[message]', NOW())") OR DIE ($mysqli->error);
        echo '<div class="validation"> Votre message a bien été enregistré.</div>';
    }
    else{
        echo '<div class="erreur"> Afin de déposer un commentaire, veuilles s\'il vous plait remplir tous les champs du formulaire.</div>';
    }
}

//-----------------Affichage des commentaires-----------------//

//Améliorer l'affichage : Ordonner et mettre les derniers commentaires en tête de liste, afficher la date au format Français,
//Afficher le nombre total de commentaires.
//$stmt = $mysqli->prepare("SELECT  * FROM commentaire");
$stmt = $mysqli->prepare("SELECT pseudo, message, DATE_FORMAT(date_enregistrement, '%d/%m/%Y') AS datefr, DATE_FORMAT(date_enregistrement, '%H:%i:%s') 
AS heurefr FROM commentaire ORDER BY date_enregistrement DESC"); 
// verification de la valeur retournée pour permettre de trouver l'erreur et de le debugguer au cas ou il y a en
if($stmt===false){
    echo "Error: " . mysqli_error($mysqli);
}
else {
    $stmt->execute();
    $resultat=mysqli_stmt_get_result($stmt);
    echo '<h2>'  . $resultat->num_rows . ' commentaire(s)</h2>';
    while($commentaire = $resultat->fetch_assoc()){
        echo '<div class="message">';
            //echo '<div class="titre">Par : ' . $commentaire['pseudo'] . ', ' . $commentaire['date_enregistrement'] . '</div>';
            echo '<div class="titre">Par: ' . $commentaire['pseudo'] . ', le ' . $commentaire['datefr'] . ' à ' . $commentaire['heurefr'] . '</div>';
            echo '<div class="contenu">' . $commentaire['message'] . '</div> ';
        echo '</div>';
}

$stmt->close();
}


//------------------Formulaire d'envoi de commentaire--------------------//
?>



<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="commentaire"><?php echo $contenu; ?></div>
        <form method="post" action="">
            <label for="pseudo">Pseudo</label><br>
            <input type="text" id="pseudo" name="pseudo" maxlength="20" pattern="[a-zA-Z0-9.-_]+" title="caractère autorisés : a-zA-Z0-9.-_"><br>

            <label for="message">Message</label><br>
            <textarea id="message" name="message" cols="50" rows="7"></textarea><br>

            <input type="submit" value="Envoyer le message">

        </form>
    </body>
</html>


