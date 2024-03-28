<?php

use App\src\DAO\ArticleDAO;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mon blog</title>
</head>
<body>
<div>
    <?php $this->title = "Accueil"; ?>
    <h1>Mon blog</h1>
    <p>En construction</p>

    <?php
    /* parcourir le tableau array représenté par la variable
    $articles et affiché chacune des informations
    contenues à l'intérieur. */
    foreach ($articles as $article)
    {
        ?>
        <div>
            <!--Chaque article sont affichés avec la fonction htmlspecialchars()
            -> éviter les attaques XSS en codant les caracSpec-->
            <!--redirection vers la page index.php-->
            <h2><a href="../public/index.php?route=article&articleId=<?=htmlspecialchars($article->getId());?>"><?=
                    htmlspecialchars($article->getTitle());?></a></h2>
            <p><?=htmlspecialchars($article->getContent());?></p>
            <p><?=htmlspecialchars($article->getAuthor());?></p>
            <p>Créé le : <?=htmlspecialchars($article->getCreatedAt());?></p>
        </div>
        <br>
        <?php
    }
    ?>
</div>
</body>
</html>
