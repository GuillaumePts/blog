<?php 

require('./inc/function.php');
require('./inc/pdo.php');



$select_articles = "SELECT * FROM articles WHERE status = 'publish'  ORDER BY created_at DESC";
$query = $pdo->prepare($select_articles);
$query->execute();
$articles = $query->fetchAll();
?>


<?php include ('./inc/header.php'); ?>

<h2>Listes des articles</h2>
<?php foreach ($articles as $article) { ?>
        

<div id="card">
    <p class="fondnoir"><?=$article['title']?></p>
    <p class="fondnoir"><?=$article['auteur']?></p>
    <p class="fondnoir"><?=$article['created_at']?></p>
    <a class="fondnoir" href="single.php">détail</a>
</div>
 <?php  }
  
  include ('./inc/footer.php'); ?>