<h1>Toute l' actu 🏉</h1>
<div class="container-title-page">
	<img src="/public/assets/images/Top_14.svg" alt="logo top 14">
	<img src="/public/assets/images/Logo_FFR_2019.svg.png" alt="logo xv de france">
</div>

<div class="container-btn-create">
<?php if (isset($_SESSION["user_is_connected"]) && $_SESSION["user_is_connected"]) { ?>
		<a href="./?page=article_add">
	         <div class="btn-link-create-article">
	         	Créer un article
	         </div>
	    </a> 
<?php }  ?>
</div>


<div class="container-card-article">
	<?php foreach ($params["article"] as $key => $article) { ?>
		<div class="card-article">
		<a href="./?page=article_show&article_id=<?= $article->getId();?>">
		    <img src="/public/assets/images/upload/<?php echo htmlspecialchars($article->getFile_path_image()); ?>" alt="image télécharger pour l'article">
		</a>	
			<h3><?php echo htmlspecialchars($article->getTitle());?></h3>
			<div class="container-btn-date">
				<a href="./?page=article_show&article_id=<?php echo htmlspecialchars($article->getId());?>">
					<button class="btn-link-show-article">VOIR</button>
				</a>
				<?php if(Service::checkIfUserIsConnected()) { ?>
				
					<?php if($_SESSION['role'] == 'admin'): ?>
					
						<button type="button" onclick="dialog.showModal()" class="btn-delete-article js_article_btn_delete"
						data-article_id="<?php echo $article->getId() ?>">Supprimer</button>
						
						<a href="./?page=article_update&article_id=<?= $article->getId();?>">
							<button type="button" class="btn-update-article">Modifier</button>
						</a>
						
					<?php endif; ?>
					
				
				<?php }?>
				<p class="paragraph-date">Publié le : <?php echo htmlspecialchars(($article->getDate_published())->format("d/m/Y")); ?></p>
			</div>
		</div>
	<?php } ?>
</div>

<div class="centerpoint">
<?php include_once dirname(__DIR__) . "/article/template_part/_delete_modal.php"; ?>
</div>