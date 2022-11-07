<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= getPageTitle() ?> - Oval'Actu</title>
    <meta name="description" content="<?= getPageDescription() ?>">
    <link rel="shortcut icon" href="/public/assets/images/goal.png" type="image/x-icon">
    <link rel="stylesheet" href="/public/css/main.css">
    <script src="/public/js/form.js" defer></script>
    <script src="/public/js/main.js" defer></script>
  </head>
  <body>
    <header>
      
    <?php include_once("template_part/_navbar.php"); ?>
    
    </header>
    
    <main>
      
    <?php getRouteFromUrl(); ?>
    
    </main>
    
    <footer>
    
    <?php include_once("template_part/_footer.php"); ?>
       
    </footer> 
    
  </body>
</html>