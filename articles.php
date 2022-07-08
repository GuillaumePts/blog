<?php 

require('./include/function.php');
require('./include/pdo.php');

$select_articles = "SELECT * FROM articles ORDER BY created_at DESC";
$query = $pdo->prepare($select_articles);
$query->execute();
$articles = $query->fetchAll();
?>


<?php include ('./inc/header.php'); ?>

<h2>Listes des articles</h2>
    <?php foreach ($articles as $article) { 
        if($article[''])
    }









<?php include ('./inc/footer.php'); ?>