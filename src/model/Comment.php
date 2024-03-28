<?php

namespace App\src\model;

// classe Comment pour les getters ou setters des commentaires
class Comment
{
    private $id;
    private $pseudo;
    private $content;
    private $createdAt;
    private $article_id;


    public function getIdComment()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getArticle_id()
    {
        return $this->article_id;
    }

    public function setArticle_id($article_id)
    {
        $this->article_id = $article_id;
    }
}