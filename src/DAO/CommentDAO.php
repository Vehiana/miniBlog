<?php

namespace App\src\DAO;

use App\src\model\Comment;

class CommentDAO extends DAO
{
    // Méthode privée pour construire un objet Comment à partir d'une ligne de résultat
    private function buildObject($row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setCreatedAt($row['createdAt']);
        $comment->setArticle_id($row['article_id']); // Assurez-vous que cette méthode existe dans votre classe Comment
        return $comment;
    }

    // Méthode pour récupérer tous les commentaires associés à un article spécifique
    public function getCommentsForArticle($articleId)
    {


        $sql = 'SELECT * FROM comment WHERE article_id = ? ORDER BY id DESC';
        $result = $this->createQuery($sql, [$articleId]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }

    // fonction qui insérera le commentaire dans la base de données
    public function addComment($articleId, $pseudo, $comment){
        $sql = 'INSERT INTO comment (pseudo, content, createdAt, article_id) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [$pseudo, $comment, $articleId]);
    }
}
