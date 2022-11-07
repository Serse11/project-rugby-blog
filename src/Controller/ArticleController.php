<?php 

require_once dirname(__DIR__, 2) . "/lib/Controller/AbstractController.php";
require_once dirname(__DIR__) . "/Repository/ArticleRepository.php";
require_once dirname(__DIR__) . "/service/Service.php";


class ArticleController extends AbstractController
{
    
    /**
     * @var ArticleRepository $articleRepository
     */
    private ArticleRepository $articleRepository;
    
     public function __construct()
    {
        $this->articleRepository = new ArticleRepository();
    }
    
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

/*fonction pour afficher un article*/
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
 
/*fonction pour créer et ajouter un article*/    
     public function add()
    {
        if (
            Service::checkIfUserIsConnected()
        ) {
            $error = true;
            $message =  "";
            $articleRepository = new ArticleRepository();
            if (!empty($_POST) && isset($_POST["title"], $_POST["content"], $_FILES['images'])) 
            {
             if ( strlen(trim($_POST["title"])) != 0 && strlen(trim($_POST["content"])) != 0 && $_FILES["images"]['name'] != '') {
                    $title = trim($_POST["title"]);
                    $content = trim($_POST["content"]);
                    
                    /*verifier la taille du fichier 
                    le contenu du fichier avec method MIME */
                    $mime_types = array(
                            'png'   => 'image/png',
                            'jpe'   => 'image/jpeg',
                            'jpeg'  => 'image/jpeg',
                            'jpg'   => 'image/jpeg',
                    );
                    
                    $extensions = [ "png", "jpeg", 'jpg', 'jpe'];
                    
                    // Vérification de l'extension
                    $tmpNameArray = explode(".", $_FILES['images']["name"]);
                    $tmpExt = end($tmpNameArray);
                    
                    
                    // Si l'extension n'est pas dans le tableau --> error
                    if (!in_array($tmpExt, $extensions, true)) {
                       $error = false;
                       $message = "Nous n'acceptons que les fichiers aux extensions suivantes : 'png', 'jpeg',....";
                    }
                    
                    
                    // Vérification du contenu du fichier grace à MIME
                    if ($_FILES['images']['error'] == 0 ) {
                        if (!in_array(mime_content_type($_FILES['images']['tmp_name']), $mime_types, true) ) {
                            $error = false;
                            $message = "Il semble y avoir un probleme.";
                        }
                    } else {
                        $error = false;
                        $message = "Fichier trop volumineux.";
                    }
                    
                    // Vérification de la taille ( pas plus de 2Mo ) --> voir également le fichier .ini
                    if ($_FILES['images']['size'] > 2000000) {
                        $error = false;                            
                        $message = "Fichier trop volumineux.";
                    }
                    
                    if ($error) {
            
                        $file_path_image = Service::moveFile($_FILES["images"]);
                        
                        $article =  new Article();
                        $article->setTitle($title);
                        $article->setContent($content);
                        $article->setUser_id($_SESSION["user_id"]);
                        $article->setFile_path_image($file_path_image);
                        $articleRepository->add($article);
                        $article = $articleRepository->findLast();
                        
                        header("Location: ./?page=article");
                        exit;
                        
                    }    
                }
                
            }
            return $this->renderView("/views/template/article/article_add.php", [
                "error" => $error,
                "message" => $message
            ]);
        }
    }
    
/*fonction de suppression d'article*/    
    public function deleted()
    {
        $articleRepository = new ArticleRepository();
        if (
            Service::checkIfUserIsConnected()
            && isset($_GET["article_id"])
            && $article = $articleRepository->find($_GET["article_id"])
        ) {
            //supprime l'image lié à l'article 
            unlink("assets/images/upload/".$article->getFile_path_image());
            $articleRepository->deleted($article);
            // Redirect vers la page listant les articles 
            header("Location: ./?page=article");
        }
    }
    
/*fonction de la modification d'article*/    
    public function update()
    {
        $error = true;
        $message =  "";
        // Vérification de l'existence de l'article passé en paramètre d'url et déclaration, assignation de article 
        if (isset($_GET["article_id"])
        ) {
            $article = $this->articleRepository->find($_GET["article_id"]);
            // Vérification validé des data pour l'article
            if (
                array_key_exists("title", $_POST) && array_key_exists("content", $_POST) && array_key_exists("images", $_FILES)
                && strlen(trim($_POST["title"])) != 0 && strlen(trim($_POST["content"])) != 0
            ) {
                $id = $_GET['article_id'];
                $title = trim($_POST["title"]);
                $content = trim($_POST["content"]);
                $file_path_image = $article->getFile_path_image();
                
                $mime_types = array(
                            'png'   => 'image/png',
                            'jpe'   => 'image/jpeg',
                            'jpeg'  => 'image/jpeg',
                            'jpg'   => 'image/jpeg',
                    );
                    
                    $extensions = [ "png", "jpeg", 'jpg', 'jpe'];
                    
                    // Vérification de l'extension
                    $tmpNameArray = explode(".", $_FILES['images']["name"]);
                    $tmpExt = end($tmpNameArray);
                    
                    
                    // Si l'extension n'est pas dans le tableau --> error
                    if (!in_array($tmpExt, $extensions, true)) {
                       $error = false;
                       $message = "Nous n'acceptons que les fichiers aux extensions suivantes : 'png', 'jpeg',....";
                    }
                    
                    
                    // Vérification du contenu du fichier grace à MIME
                    if ($_FILES['images']['error'] == 0 ) {
                        if (!in_array(mime_content_type($_FILES['images']['tmp_name']), $mime_types, true) ) {
                            $error = false;
                            $message = "Il semble y avoir un probleme.";
                        }
                    } else {
                        $error = false;
                        $message = "Fichier trop volumineux.";
                    }
                    
                    // Vérification de la taille ( pas plus de 2Mo ) --> voir également le fichier .ini
                    if ($_FILES['images']['size'] > 2000000) {
                        $error = false;                            
                        $message = "Fichier trop volumineux.";
                    }
                
                if ($error) {
                    $article =  new Article();
                    $article->setId($id);
                    $article->setTitle($title);
                    $article->setContent($content);
                    $article->setFile_path_image($file_path_image);
                    
                      
                    if ($_FILES["images"]["name"] != ""){
                        
                        if (is_file("assets/images/upload/".$article->getFile_path_image())) {
                            unlink("assets/images/upload/".$article->getFile_path_image());
                        }
    
                        $file_path_image = Service::moveFile($_FILES['images']);
                        $article->setFile_path_image($file_path_image);
                    }
                    
                    $this->articleRepository->update($article);
                    header("Location: ./?page=article");
                    exit();
                }
            }
            return $this->renderView(
                "/views/template/article/article_update.php",
                [
                    "error" => $error,
                    "message" => $message,
                    "article" => $article
                ]
            );
        }
    }
}