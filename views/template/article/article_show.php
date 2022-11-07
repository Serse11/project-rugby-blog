<div class="container-article">
    <h3 class="title-article_show"><?php echo htmlspecialchars($params["article"]->getTitle()); ?></h3>
    <div class="container-img-article_show">
        <p class="paragraph-date">Publié le : <?php echo htmlspecialchars($params["article"]->getDate_published()->format("d/m/Y")); ?></p>
        <img src="/public/assets/images/upload/<?php echo htmlspecialchars($params["article"]->getFile_path_image()); ?>" 
        alt="image télécharger de l'article">
    </div>
    <div class="container-content-article_show">
        <p><?php echo htmlspecialchars($params["article"]->getContent()); ?></p>
    </div>
</div>

<div class="container-comm-article">
    <?php include_once dirname(__DIR__) . "/article/template_part/_add_com.php"; ?>
    <?php 
            if (!is_null($params['article']->getComments()[0])) {
                foreach ($params['article']->getComments() as $comment)
    {?>
                <div class="container-comments">
                    <p class="content-comment"><?php echo htmlspecialchars($comment->getContent());?></p>
                    <p class="username-comment"><img src="/public/assets/images/american-football-player.png" 
                    alt="" class="img-username-comm"/><?php echo htmlspecialchars($comment->getUsername());?></p>
                </div>
                <?php
                }
            } else { ?>  
                <div class="not-comm-message">Cet article n'a pas de commentaire</div> 
            <?php
            }
            ?>
                </div>
</div>
