    <section class="hero-section">
        <div class="container-text">
            <div>
                <p class="title-hero-section">OVAL' ACTU</p>
            </div>
            <div>
                <p class="text-hero-section">Plus d'excuse pour manquer l'actu !</p>
            </div>
        </div>
        <img src="/public/assets/images/stadeFrance.jpeg" alt="Stade de france" class="img-hero-section">
    </section>
    <section class="story-telling">
        <h1 class="title-story">Bienvenue sur Oval'Actu</h1>
        <div class="container-shedule-img">
            <div class="schedule-last-results">
                <h3 class="">Derniers résultats</h3>
                <div class="container-game">
                    <div class="games">
                        <p class="">Autumn Nation Series 2022</p>
                        <p class="">Journée 1  —  05/11/2022</p>
                        <div class="container-score-club">
                            <div class="match__club">
                                <p class="french-team">France
                                    <img src="https://api.www.ffr.fr/wp-content/uploads/2020/05/logo_FRANCE_RUGBY_corpo_2coul-Fond-blanc-cmjn-1.png" 
                                    alt="blason equipe de france" class="icon-team">
                                </p>
                            </div>
                            <div class="match__info">
                                <p class="match__score">
                                    <span class="french-score">30</span>
                                    <span class="match__colon">:</span>
                                    <span class="">29</span>
                                </p>
                            </div>
                            <div class="match__club">
                                <p class="">
                                    <img src="https://api.www.ffr.fr/wp-content/uploads/2020/04/Logo-Australie.jpg" 
                                    alt="blason equipe australier" class="icon-team">Australie
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-game">
                    <div class="games">
                        <p class="">Test-match 2022</p>
                        <p class="">Journée 2  —  09/07/2022</p>
                        <div class="container-score-club">
                            <div class="match__club">
                                <p class="">Japon
                                <img src="https://api.www.ffr.fr/wp-content/uploads/2019/01/France-Japon-samedi-25-novembre-2017-21-00-00-1.jpg" 
                                alt="blason equipe du japon" class="icon-team">
                                </p>
                            </div>
                            <div class="match__info">
                                <p class="match__score">
                                    <span class="">15</span>
                                    <span class="match__colon">:</span>
                                    <span class="french-score">20</span>
                                </p>
                            </div>
                            <div class="match__club">
                                <p class="french-team">
                                    <img src="https://api.www.ffr.fr/wp-content/uploads/2019/08/logo_FRANCE_RUGBY_corpo_2coul-Fond-blanc-cmjn-1.png" 
                                    alt="blason equipe de france" class="icon-team">France
                                    </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-game">
                    <div class="games">
                        <p class=""></p>
                        <p class="">Journée 1  —  02/07/2022</p>
                        <div class="container-score-club">
                            <div class="match__club">
                                <p class="">Japon
                                    <img src="https://api.www.ffr.fr/wp-content/uploads/2019/01/France-Japon-samedi-25-novembre-2017-21-00-00-1.jpg" 
                                    alt="blason equipe du japon" class="icon-team">
                                </p>
                            </div>
                            <div class="match__info">
                                <p class="match__score">
                                    <span class="">23</span>
                                    <span class="match__colon">:</span>
                                    <span class="french-score">42</span>
                                </p>
                            </div>
                            <div class="match__club">
                                <p class="french-team">
                                    <img src="https://api.www.ffr.fr/wp-content/uploads/2020/05/logo_FRANCE_RUGBY_corpo_2coul-Fond-blanc-cmjn-1.png" 
                                    alt="blason equipe de france" class="icon-team">France
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-img-in-shedule">
                <div>
                    <img src="/public/assets/images/FranceAustralie.jpeg" alt="match france australie" class="img-shedule">
                    <p class="text-img-shedule">Match France-Australie</p>
                </div>
                <div>
                    <img src="/public/assets/images/img-score-schedule.jpeg" alt="image de match" class="img-shedule">
                    <p class="text-img-shedule">Match Japon-France</p>
                </div>
            </div>
        </div>
    </section>
    <div class="container-title-last-articles">
        <h3>actus récentes</h3>
    </div>
    <section class="container-card-article">
        <?php foreach ($params["article"] as $key => $article) { ?>
            <div class="card-article">
			    <img src="/public/assets/images/upload/<?php echo $article->getFile_path_image(); ?>"alt="image télécharger de l'article">
			    <h3><?php echo $article->getTitle();?></h3>
                <div class="container-btn-date">
                    <button class="btn-link-show-article"><a href="./?page=article_show&article_id=<?php echo $article->getId();?>">VOIR</a></button>
                    <p class="paragraph-date">Publié le : <?php echo $article->getDate_published()->format("d/m/Y"); ?></p>
                </div>
            </div>
        <?php } ?>
    </section>