<div class="container-form-user">
    <div class="container-text-form-user">
       <p class="text-form-user">Connectez vous 🏉</p>
    </div>
    <form action="" method="post" class="form-user">
        <div class="form-field-user">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input type="text" class="form-input-user" id="username" name="username" placeholder="Votre nom  d'utilisateur...">
        </div>
        <div class="form-field-user">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-input-user" id="password" name="password" placeholder="Votre not de passe...">
        </div>
        <div class="form-field-user" id="btn-user">
            <input class="input-btn" type="submit" value="Connexion">
        </div>
    </form>
    <div class="to-create-acount">
        <p class="text-create-user">Si vous n'avez pas de compte, créez le en quelques étapes en cliquant <a href="/public/?page=user_add" class="link-create-acount">ici</a> 👈</p>
    </div>
</div>

<div class="">
    <?php if (isset($params["error"]) && !empty($params)) { ?>
        <?php if (!$params["error"]) { ?>
            <div class="error-message" role="alert">
                <p>Erreur: l'utilisateur ou le mot de passe ne sont pas valide.</p>
            </div>
        <?php } ?>
        <?php if ($params["error"]) { ?>
            <div class="valid-message" role="alert">
                <p>Vous étes connecté.</p>
            </div>
        <?php } ?>
    <?php } ?>
</div>