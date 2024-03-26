<?php 
    require_once "./constants.php";
    require_once "./src/app/Router.php";
    require_once "./src/app/HtaccessHandler.php";
    require_once "./src/app/UserCookieHandler.php";
    require_once "./src/app/Logger.php";

    HtaccessHandler::setHtaccess();

    $router = new Router();
    $uri = $router->getUri();
    $page = $uri === '' ? $router->getView("home") : $router->getView($uri);

    $userName = UserCookieHandler::getUsernameCookie();
    
    Logger::logVisit(
        $userName,
        $uri ? $uri : "/",
        "GET"
    );
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content=" index, follow">
        <meta name="author" content="Clément GUILLORÉ">

        <link rel="icon" type="image/x-icon" href="./public/assets/images/logo.png">
        <link rel="stylesheet" href="./public/styles/global.css">
        <script src="./public/scripts/app.js" defer></script>

        <?php $page['head'] && require_once $page['head']; ?>
    </head>


    <body>
        <?php require_once "./src/views/include/header.php"; ?>
        <?php require_once "./src/views/include/flash.php"; ?>

        <?php $page['main'] && require_once $page['main']; ?>
        <?php require_once "./src/views/include/footer.php"; ?>
    </body>
</html>

