<?php

namespace App\src\controller;
use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
use App\src\model\View;

class FrontController
{
    private $articleDAO;
    // ajout de la variable $commentDAO
    private $commentDAO;
    private $view;
    private $errorController;

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        // instanciation de la classe CommentDAO
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
        $this->errorController = new ErrorController();
    }

    //gérer l'affichage de la page d'accueil du site
    public function home()
    {
        $articles = $this->articleDAO->getArticles();
        //renvoie la page d'accueil
        return $this->view->render('home', ['articles' => $articles]);
    }

    public function article($articleId)
    {

        $article = $this->articleDAO->getArticle($articleId);
        // Récupérer les commentaires associés à cet article
        $comments = $this->commentDAO->getCommentsForArticle($articleId);
        // Renvoie la vue de l'article avec ses commentaires
        return $this->view->render('single', ['article' => $article, 'comments' => $comments]);

    }

    // fonction qui récupère les données du formulaire via _POST, validera et utilisera CommentDAO
    // pour insérer le commentaire dans la bdd
    public function addComment($articleId, $pseudo, $content) {

        if (!$this->validateCommentData($articleId, $pseudo, $content)) {
            $this->errorController->errorNotFound();
            return;
        }

        // ajouter le commentaire à la base de données
        $this->commentDAO->addComment($articleId, $pseudo, $content);
        // Rediriger vers l'article pour voir le commentaire ajouté
        header('Location: index.php?route=article&articleId=' . $articleId);
        exit;
    }

    private function validateCommentData($articleId, $pseudo, $content) {
        return isset($pseudo) && isset($content) && isset($articleId) && $_SERVER['REQUEST_METHOD'] === 'POST';
    }

}