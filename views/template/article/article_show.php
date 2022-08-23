<div class="container-article">
    <h3 class="title-article_show"><?php echo $params["article"]->getTitle(); ?></h3>
    <div class="container-img-article_show">
        <p class="paragraph-date">Publié le : <?php echo $params["article"]->getDate_published()->format("d/m/Y"); ?></p>
        <img src="<?php echo $params["article"]->getFile_path_image(); ?>" alt="">
    </div>
    <div class="container-content-article_show">
        <p><?php echo $params["article"]->getContent(); ?></p>
    </div>
</div>

<div class="container-comm-article">
    <?php include_once dirname(__DIR__) . "/article/template_part/_add_com.php"; ?>
    <?php 
            if (!is_null($params['article']->getComments()[0])) {
                foreach ($params['article']->getComments() as $comment){?>
                <div class="container-comments">
                    <p class="content-comment"><?php echo $comment->getContent();?></p>
                    <p class="username-comment"><img src="/public/assets/images/american-football-player.png" alt="" class="img-username-comm"/><?php echo $comment->getUsername();?></p>
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