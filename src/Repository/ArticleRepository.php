<?php 

require_once dirname(__DIR__, 2) . "/lib/Repository/AbstractRepository.php";
require_once dirname(__DIR__) . "/Model/Article.php";
require_once dirname(__DIR__) . "/Model/Comment.php";

class ArticleRepository extends AbstractRepository
{
/*fonction qui permet de retourner tout ce que contiennent les articles*/    
    public function findAll(){
        $query = "SELECT * FROM article ORDER BY id DESC LIMIT 50";
        return $this->executeQuery($query, "article");
    }

/*fonction qui permet de retourner un article depuis son id*/
    public function find(int $article_id) {
        $query = "SELECT * FROM article WHERE id = :id";
        $params = [":id" => $article_id];
        return $this->executeQuery($query, "article", $params);
    }

/*fonction qui permet de retourner les 3 derniers articles poster*/
    public function findLast(){
        $query = 'SELECT * FROM article ORDER BY id DESC LIMIT 3';
        return $this->executeQuery($query, "article");
    }
    
/*fonction qui permet d'afficher les commentaires sous les articles*/    
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

/*fonction qui permet de poster un commentaire sous un article*/
    public function addComment(Comment $comment) {
        $query = 'INSERT INTO comments(username, content, article_id) VALUES (:username, :content, :article_id)';
        $params = 
        [
            ':username' => $comment->getUsername(), 
            ':content' => $comment->getContent(),
            ':article_id' => $comment->getArticle_id()
        ];
        return $this->executeQuery($query, 'Comment', $params); 
    }
    
/*fonction qui permet d'ajouter un article*/    
    public function add(Article $article)
    {
        $query = "INSERT INTO article(title, content, user_id, file_path_image) 
                  VALUES(:title, :content, :user_id, :file_path_image);";
        $params = [
            ":title" => $article->getTitle(),
            ":content" => $article->getContent(),
/*            ":date_published" => $article->getDate_published()->format("Y-m-d H:i:s"),
*/          ":user_id" => $article->getUser_id(),
            ":file_path_image" => $article->getFile_path_image()
        ];

        return $this->executeQuery($query, "Article", $params);
    }

/*fonction qui permet de supprimer un article*/
    public function deleted(Article $article)
    {
        $query = "DELETE FROM article WHERE id = :id";
        $params = [
            ":id" => $article->getId()
        ];
        return $this->executeQuery($query, "Article", $params);
    }
    
/*fonction qui permet de modifier un article*/
    public function update(Article $article)
    {
        $query = "UPDATE article SET title = :title, content = :content
        ,file_path_image = :file_path_image WHERE id = :id";
        $params = [
            ":title" => $article->getTitle(),
            ":content" => $article->getContent(),
            ":file_path_image" => $article->getFile_path_image(),
            ":id" => $article->getId()

        ];
        return $this->executeQuery($query, "Article", $params);
    }
}