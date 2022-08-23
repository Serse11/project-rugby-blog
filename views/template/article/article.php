<h1>Toute l' actu </h1>
<div class="container-title-page">
	<img src="/public/assets/images/Top_14.svg" alt="logo top 14">
	<img src="/public/assets/images/Logo_FFR_2019.svg.png" alt="logo xv de france">
</div>

<div class="container-card-article">
	<?php foreach ($params["article"] as $key => $article) { ?>
		<div class="card-article">
		<a href="/public/?page=article_show&article_id=<?= $article->getId();?>">
		    <img src="<?php echo $article->getFile_path_image(); ?>" alt="">
		</a>	
			<h3><?php echo $article->getTitle();?></h3>
			<div class="container-btn-date">
				<a href="/public/?page=article_show&article_id=<?php echo $article->getId();?>"><button class="btn-link-show-article">VOIR</button></a>
				<p class="paragraph-date">Publié le : <?php echo ($article->getDate_published())->format("d/m/Y"); ?></p>
			</div>
		</div>
	<?php } ?>
</div>
