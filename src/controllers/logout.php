<?php 

require_once '../../constants.php';
require_once '../app/UserCookieHandler.php';
require_once '../app/Router.php';
require_once '../app/Logger.php';

$userName = UserCookieHandler::getUsernameCookie();
UserCookieHandler::deleteAllCookies();
Logger::logVisit($userName, "logout", "GET", "user logged out");
Router::redirect("");

?>