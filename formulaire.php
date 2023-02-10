<?php
if(!empty($_POST))
{
    echo 'Recuperation des données saisies : <br>';
    echo 'pseudo : ' . $_POST['pseudo'] . '<br>';
    echo 'email : ' . $_POST['email'] . '<br>';

    $f = fopen("save.txt","a");
    fwrite($f, $_POST['pseudo'] . " - "); 
    fwrite($f, $_POST['email'] . "\n");
    $f = fclose($f); 
}

?>