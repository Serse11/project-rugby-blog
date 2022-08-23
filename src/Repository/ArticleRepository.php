<?php 

require_once dirname(__DIR__, 2) . "/lib/Repository/AbstractRepository.php";
require_once dirname(__DIR__) . "/Model/Article.php";
require_once dirname(__DIR__) . "/Model/Comment.php";

class ArticleRepository extends AbstractRepository
{
    public function findAll(){
        $query = "SELECT * FROM article;";
        return $this->executeQuery($query, "article");
    }

    public function find(int $article_id) {
        $query = "SELECT * FROM article WHERE id = :id;";
        $params = [":id" => $article_id];
        return $this->executeQuery($query, "article", $params);
    }

    public function findLast(){
        $query = 'SELECT * FROM article ORDER BY id DESC LIMIT 3;';
        return $this->executeQuery($query, "article");
    }

    public function findCommentsOnArticle(int $article_id){
        $query = 'SELECT * FROM comments WHERE article_id = :article_id ORDER BY id DESC';
        $params = [':article_id' => $article_id];
        $result = $this->executeQuery($query, 'Comment', $params);
        if (!is_array($result)){
            $comments[] = $result;
        }else{
            $comments = $result;
        }
        return $comments;
    }

    public function addComment(Comment $comment) {
        $query = 'INSERT INTO comments(username, content, article_id) VALUES (:username, :content, :article_id);';
        $params = 
        [
            ':username' => $comment->getUsername(), 
            ':content' => $comment->getContent(),
            ':article_id' => $comment->getArticle_id()
        ];
        return $this->executeQuery($query, 'Comment', $params); 
    }
}
