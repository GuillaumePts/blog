<?php
require('../inc/pdo.php');

if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql_supprimer = "DELETE FROM articles WHERE id= :id";
    $query = $pdo->prepare($sql_supprimer);
    $query->bindValue(':id',$id, PDO::PARAM_INT);
    $query->execute();
    header('Location: liste-articles.php');
} else {
    die("Aucun parametre n'est passé à la page de suppression");
}