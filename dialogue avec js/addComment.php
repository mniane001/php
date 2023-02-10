<?php
// Connexion à la base de données
$mysqli = new Mysqli('localhost', 'root', '', 'dialogue');

if ($_POST) {
    // Échapper les entrées pour éviter les injections SQL
    $_POST['pseudo'] = addslashes($_POST['pseudo']);
    $_POST['message'] = addslashes($_POST['message']);

    // Enregistrer le commentaire s'il n'est pas vide
    if (!empty($_POST['pseudo']) && !empty($_POST['message'])) {
        $mysqli->query("INSERT INTO commentaire (pseudo, message, date_enregistrement) 
        VALUES ('$_POST[pseudo]', '$_POST[message]', NOW())") OR DIE ($mysqli->error);
    }
}
