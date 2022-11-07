<?php
$title = null;
$content = null;
$file_path_image = null;
if (isset($params["article"])) {
    $title = $params["article"]->getTitle();
    $content = $params["article"]->getContent();
    $file_path_image = $params["article"]->getFile_path_image();
    $id = $params["article"]->getId();
}
?>

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

<form method="post" class="form-add-article" enctype="multipart/form-data" <?php if (!empty($title)) { echo "action='./?page=article_update&article_id=$id'"; } ?>>
    <div class="container-form-add-article">
        Titre <input type="text" name="title" id="title" value="<?php if (!empty($title)) echo $title; ?>">
        Image <input type="file" name="images" id="images" 
        value="<?php if (!empty($file_path_image)) echo $file_path_image; ?>">
        Contenu <textarea type="textarea" name="content" id="content" class="textarea-form-add"><?php if (!empty($content)) echo $content; ?></textarea>
    </div>
    <input type="submit" <?php if (!empty($title)) { echo "value='Modifier'"; } else { echo "value='Créer'"; } ?> class="valid-add-article-btn">
</form>

