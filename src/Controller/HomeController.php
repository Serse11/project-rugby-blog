<?php

require_once dirname(__DIR__, 2) . "/lib/Controller/AbstractController.php";
require_once dirname(__DIR__) . "/Repository/ArticleRepository.php";

class HomeController extends AbstractController
{

    /**
     * @return string utilise la methode renderView() définie dans la classe abstrait parent abstractController 
     */
    public function index(): string
    {
        $articleRepository = new ArticleRepository();
        $article = $articleRepository->findLast();
        return $this->renderView("/views/template/home/home.php", 
        [
            'article' => $article
        ]);
    }
}

?>