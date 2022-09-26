<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= getPageTitle() ?></title>
    <link rel="stylesheet" href="/public/css/nav_bar.css">
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/footer.css">
    <link rel="stylesheet" href="/public/css/form.css">
    <link rel="stylesheet" href="/public/css/article.css">
    <link rel="stylesheet" href="/public/css/form_user.css">
    <link rel="shortcut icon" href="/public/assets/images/goal.png" type="image/x-icon">
    <script src="/public/js/form.js" defer></script>
  </head>
  <body>
    <?php 
    include_once("template_part/_navbar.php");
    getRouteFromUrl();
    include_once("template_part/_footer.php");
    ?>
  </body>
</html>