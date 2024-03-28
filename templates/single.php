<?php

use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mon blog</title>
</head>

<body>
<div>
    <h1><?php $this->title = "Article"; ?></h1>

    <div>
        <!--Affichage de l'article (titre, contenu, date de création, auteur) -->
        <h2><?= htmlspecialchars($article->getTitle());?></h2>
        <p><?= htmlspecialchars($article->getContent());?></p>
        <p><?= htmlspecialchars($article->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>

        <hr>
        <!-- Affichage des commentaires pour CHAQUE article cliqué (contenu, date de publication, pseudo de l'auteur du commentaire -->
        <h3><u>Commentaires</u></h3>
        <?php foreach ($comments as $comment): ?>

            <p><?= htmlspecialchars($comment->getContent()); ?></p>
            <p><b>Publié le : </b><?= htmlspecialchars($comment->getCreatedAt()); ?>, <b>Par :</b> <?= htmlspecialchars($comment->getPseudo()); ?></p>
        <?php endforeach; ?>

    </div>
    <hr>
    <h3>Ajouter un commentaire</h3>
    <!-- formulaire pour l'ajout des commentaires -->
    <form action="index.php?route=addComment&articleId=<?php echo $article->getId()?>" method="post">
        <label for="pseudo">Pseudo :</label>
        <input type="text" id="pseudo" name="pseudo"><br><br>

        <label for="commentaire">Commentaire :</label><br>
        <textarea id="content" name="content" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Envoyer">
    </form>

    <hr>
    <br>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>
</body>
</html>
