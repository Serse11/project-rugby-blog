<nav>
    <img src="/public/assets/images/logo2.jpeg" alt="logo ballon de rugby" class="logo">
    <label for="toggle" class="nav_label">☰</label>
    <input type="checkbox" id="toggle">
    <ul class="main_pages">
        <li><a href="./?page=home" class="home-link">Accueil</a></li>
        <li><a href="./?page=article" class="article-link">Top 14 & XV de France</a></li>
        <li><a href="./?page=contact" class="contact-link">Contact</a></li>
    </ul> 
    <?php if (isset($_SESSION["user_is_connected"]) && $_SESSION["user_is_connected"]) { ?>
        <a href="./?page=user_disconnect"><input type="button" value="Déconnexion" class="btn-disconnect-user"></a>
    <?php } else { ?>
        <a href="./?page=user_connexion">
            <img src="/public/assets/images/rugby-player(2).png" alt="Lien vers page de connexion" class="user_logo">
        </a>    
    <?php } ?>
</nav>
