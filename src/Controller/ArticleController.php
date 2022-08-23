<?php

require_once dirname(__DIR__, 2) . "/lib/Controller/AbstractController.php";
require_once dirname(__DIR__) . "/Repository/ArticleRepository.php";

class ArticleController extends AbstractController
{

    /**
     * @return string utilise la methode renderView() définie dans la classe abstrait parent abstractController 
     */
    public function index(): string
    {
        $articleRepository = new ArticleRepository();
        return $this->renderView("/views/template/article/article.php", 
        [
            "article" => $articleRepository->findAll()
        ]);
    }

    public function show() {
        if (isset($_GET["article_id"])) {
            $articleRepository = new ArticleRepository();
            $article = $articleRepository->find(intval($_GET["article_id"]));
            if (!empty($_POST)){
                if (isset($_POST['submit_comment']) && (isset($_POST['username']) && isset($_POST['content']))){
                    $pseudo = htmlspecialchars($_POST['username']);
                    $content = htmlspecialchars($_POST['content']);

                    $comment = new Comment();
                    $comment->setUsername($pseudo);
                    $comment->setContent($content);
                    $comment->setArticle_Id($article->getId());
                    $articleRepository->addComment($comment);
                }
            }        
            $article->setComments($articleRepository->findCommentsOnArticle($article->getId()));
        }

        return $this->renderView("/views/template/article/article_show.php", 
        [
            "article" => $article
        ]);
    }
}

?>