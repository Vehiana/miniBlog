<?php

namespace App\src\DAO;

use App\src\model\Article;

class ArticleDAO extends DAO
{

    //permet de convertir chaque champ de la table en propriété de notre Objet Article
    private function buildObject($row)
    {
        //instanciation d'un article
        $article = new Article();
        //ajouts des infos de la propriété ['...']
        $article->setId($row['id']);
        $article->setTitle($row['title']);
        $article->setContent($row['content']);
        $article->setAuthor($row['author']);
        $article->setCreatedAt($row['createdAt']);
        return $article;
    }

    //renvoie tous les articles
    public function getArticles()
    {
        $sql = 'SELECT id, title, content, author, createdAt FROM article ORDER BY id DESC';
        $result = $this->createQuery($sql);
        $articles = [];
        foreach ($result as $row) {
            $articleId = $row['id'];
            $articles[$articleId] = $this->buildObject($row);
        }
        //fin d'exécution de la fonction getArticles()
        $result->closeCursor();
        return $articles;

    }

    //obenir un seul article (et ses infos) grâce à son id
    public function getArticle($articleId)
    {
        //sélectionne uniquement l'article de l'id ... et affiche ses infos
        $sql = 'SELECT id, title, content, author, createdAt FROM article WHERE id = ?';
        $result = $this->createQuery($sql, [$articleId]);
        $article = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($article);

    }
}
