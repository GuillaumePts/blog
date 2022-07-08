


<?php

require('../inc/function.php');
require('../inc/pdo.php');

$select_articles = "SELECT * FROM articles ORDER BY created_at DESC";
$query = $pdo->prepare($select_articles);
$query->execute();
$articles = $query->fetchAll();


?>







<!-- ------------------------------------------------------------------- ------------------------->
<!-- HTML -->
<!-- ------------------------------------------------------------------------------------------ -->


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style-back.css">
    <title>back</title>
</head>

<body>
    <header>
        <h1>Back-Office</h1>
        <nav>
            <ul>
                <li><a class="fondblanc" href="../index.php">Front</a></li>
                <li><a class="fondblanc" href="index-back.php">Back</a></li>
                <li><a class="fondblanc" href="newpost.php">Ajouter-article</a></li>
            </ul>
        </nav>

    </header>
    <div id="content" >

    <h1 class="fondnoir">Listes des articles</h1>
    <?php foreach ($articles as $article) { ?>
    <div id="articles">
        <p class="fondnoir"><?=$article['id']?></p>
        <p class="fondnoir"><?=$article['title']?></p>
        <p class="fondnoir"><?=$article['content']?></p>
        <p class="fondnoir"><?=$article['auteur']?></p>
        <p class="fondnoir"><?=$article['created_at']?></p>
        <p class="fondnoir"><?=$article['status']?></p>
        <p class="fondnoir"><a href="edit_user.php?id=<?=$article['id']?>">Editer</a></p>
        <p class="fondnoir"><a href="supp_user.php?id=<?=$article['id']?>">Supprimer</a></p>
            
    </div>
   
<?php } ?>
    </div>
    <footer></footer>
</body>
</html>