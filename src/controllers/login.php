

<?php

require_once '../../constants.php';
require_once '../app/Router.php';
require_once '../app/DbHandler.php';
require_once '../app/UserCookieHandler.php';
require_once '../app/Logger.php';


if (!isset($_POST['username']) || !isset($_POST['password'])) {
    Logger::logVisit(null, "login", "POST", "data missing");
    Router::redirect("login");
}

$username = htmlspecialchars($_POST['username']); 
$password = htmlspecialchars($_POST['password']);

if (empty($username) || empty($password)) {
    Logger::logVisit(null, "login", "POST", "data missing");
    Router::redirect("login");
}

if (!DbHandler::isUserNameExist($username)) {
    Logger::logVisit(null, "login", "POST", "username does not exist");
    Router::redirect("login?error-username=the Username Does Not Exist");
}

$user = DbHandler::getUser($username, $password);
if ($user === null) {
    Logger::logVisit(null, "login", "POST", "password incorrect");
    Router::redirect("login?error-password=the Password Is Incorrect");
}

UserCookieHandler::setUsernameCookie($user[DbHandler::USER_NAME]);
UserCookieHandler::setEmailCookie($user[DbHandler::USER_EMAIL]);

Logger::logVisit($user[DbHandler::USER_NAME], "login", "POST");
Router::redirect("");



?>

