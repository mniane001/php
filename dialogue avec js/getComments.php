<?php
// Connexion à la base de données
$mysqli = new Mysqli('localhost', 'root', '', 'dialogue');

// Obtenir les commentaires les plus récents
$stmt = $mysqli->prepare("SELECT pseudo, message, DATE_FORMAT(date_enregistrement, '%d/%m/%Y') AS datefr, DATE_FORMAT(date_enregistrement, '%H:%i:%s') 
AS heurefr FROM commentaire ORDER BY date_enregistrement DESC");
$stmt->execute();
$resultat = mysqli_stmt_get_result($stmt);

// Retourner les commentaires sous forme de tableau JSON
$comments = array();
while ($commentaire = $resultat->fetch_assoc()) {
    $comments[] = $commentaire;
}

echo json_encode($comments);

$stmt->close();
