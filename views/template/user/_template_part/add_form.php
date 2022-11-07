<div class="container-form-user">
    <form method="post" class="form-user">
        <div class="form-field-user">
            <label for="lastname" class="form-label">Nom</label>
            <input type="text" class="form-input-user" id="lastname" name="lastname" placeholder="Votre nom...">
        </div>
        <div class="form-field-user">
            <label for="firstname" class="form-label">Prénom</label>
            <input type="text" class="form-input-user" id="firstname" name="firstname" placeholder="Votre prénom...">
        </div>
        <div class="form-field-user">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input type="text" class="form-input-user" id="username" name="username" placeholder="Votre nom d'utilisateur...">
        </div>
        <div class="form-field-user">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-input-user" id="password" name="password" placeholder="Votre mot de passe...">
        </div>
        <div class="form-field-user" id="btn-user">
            <input class="input-btn" type="submit" value="Créer">
        </div>
    </form>
</div>

<div>
    <?php if (isset($params["error"]) && !empty($params)) { ?>
        <?php if (!$params["error"]) { ?>
            <div class="error-message" role="alert">
                <?php echo $params["message"]; ?>
            </div>
        <?php } ?>
        <?php if ($params["error"]) { ?>
            <div class="valid-message" role="alert">
                <?php echo $params["message"]; ?>
            </div>
        <?php } ?>
    <?php } ?>
</div>