<!-- ------------------------------------------------------------------------------- -->
<!-- Partie php -->
<!-- ---------------------------------------------------------------------------------- -->

<?php






require('../inc/pdo.php');
require('../inc/function.php');
require('../inc/request.php');

// traitement Formulaire
$success = false;
$errors = array();
if(!empty($_POST['submitted'])) {
    // Faille XSS
    $title = trim(strip_tags($_POST['title']));
    $content = trim(strip_tags($_POST['content']));
    $auteur = trim(strip_tags($_POST['auteur']));
    $status = trim(strip_tags($_POST['status']));
   
    // Validation
    $errors = validText($errors,$title,'title',3,100);
    $errors = validText($errors,$content,'content',10,1000);
    $errors = validText($errors, $auteur, 'auteur', 2, 50);
    $errors = validText($errors, $status, 'status', 3, 10);
    

    if(count($errors) === 0) {
        $sql = "INSERT INTO articles (title,content,auteur,created_at,modified_at,status) VALUES (:title,:content,:auteur,NOW(),NOW(),:status)";
        $query = $pdo->prepare($sql);
        $query->bindValue(':title',$title, PDO::PARAM_STR);
        $query->bindValue(':content',$content, PDO::PARAM_STR);
        $query->bindValue(':auteur',$auteur, PDO::PARAM_STR);
        $query->bindValue(':status',$status, PDO::PARAM_STR);
    
        $query->execute();
        header('Location: newpost.php');
        $success = true;
    }
}


?>









<!-- ----------------------------------------------------------------------------------------------- -->
<!-- partie html -->
<!-- --------------------------------------------------------------------------------------------------- -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style-back.css">

    <title>Document</title>
</head>

<body>

    <header>

        <h1>Back-Office</h1>
        <nav>
            <ul>
                <li><a class="fondblanc" href="../index.php">Front</a></li>
                <li><a class="fondblanc" href="index-back.php">Back</a></li>

            </ul>
        </nav>


    </header>

    <div id="newpost">



        <h2>Ajouter un article</h2>

        <form action="" method="POST" novalidate>

            <label class="fondnoir" for="title">Titre</label>
            <input class="fondnoir" type="text" name="title" id="title">
            <span class="error"><?php if(!empty($errors['title'])) { echo $errors['title']; } ?></span>

            <label class="fondnoir" for="content">Contenu</label>
            <textarea class="fondnoir" name="content" id="content" cols="30" rows="5" style="resize:none"></textarea>
            <span class="error"><?php if(!empty($errors['content'])) { echo $errors['content']; } ?></span>

            <label class="fondnoir " for="auteur">auteur</label>
            <input class="fondnoir " type="text" name="auteur" id="auteur">
            <span class="error"><?php if(!empty($errors['auteur'])) { echo $errors['auteur']; } ?></span>

            <?php
        $status = array(
            'draft' => 'brouillon',
            'publish' => 'Publié'
        );

        ?>

            <label class="fondnoir" for="status">Status</label>
            <select name="status">
                <option value=""></option>
                <?php foreach ($status as $key => $value) {
        $selected = '';
        if(!empty($_POST['status'])) {
            if($_POST['status'] == $key) {
                $selected = ' selected="selected"';
            }
        }

?>
                <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                <?php } ?>
            </select>
            <span class="error"><?php if(!empty($errors['status'])) { echo $errors['status']; } ?></span>

            <input class="fondnoir " id="submit" type="submit" name="submitted" value="GO">
        </form>

        <script>
            const btn = document.querySelector('#submit')
            btn.addEventListener('click', aller)

            function aller() {

                btn.style.transform = 'perspective(500px) translateZ(-100px)'
            }
        </script>

    </div>
</body>

</html>