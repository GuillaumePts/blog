<?php 

require('./inc/function.php');
require('./inc/pdo.php');

include ('./inc/header.php'); 

$select_articles = "SELECT * FROM articles WHERE id= :id" ;
$query = $pdo->prepare($select_articles);
$query->execute();
$articles = $query->fetchAll();



include ('./inc/footer.php'); ?>