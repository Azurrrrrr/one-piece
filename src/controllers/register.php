<?php

require_once '../../constants.php';
require_once '../app/UserCookieHandler.php';
require_once '../app/Router.php';
require_once '../app/DbHandler.php';
require_once '../app/Logger.php';


if (!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['email'])) {
    Logger::logVisit(null, "register", "POST", "data missing");
    Router::redirect("register");
}

$username = htmlspecialchars($_POST['username']);
$user_password = htmlspecialchars($_POST['password']);
$email = htmlspecialchars($_POST['email']);

if (empty($username) || empty($user_password) || empty($email)) {
    Logger::logVisit(null, "register", "POST", "data missing");
    Router::redirect("register");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    Logger::logVisit(null, "register", "POST", "email not valid");
    Router::redirect("register?error-email=the Email Is Not Valid");
}

$usernameRegex = '/^[a-zA-Z0-9&é~#{}\(\)\[\]\-_ç^à@]+$/u';
$passwordRegex =  '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^\w\d\s]).{12,}$/';

if (!preg_match($usernameRegex, $username)) {
    Logger::logVisit(null, "register", "POST", "username not valid");
    Router::redirect("register?error-username=the Username Must Contain Only Letters And Numbers And Special Characters");
}
if (!preg_match($passwordRegex, $user_password)) {
    Logger::logVisit(null, "register", "POST", "password not valid");
    Router::redirect("register?error-password=the Password Must Contain At Least 12 Characters Including OneUppercase One Lowercase One Digit And One Special Character");
} 


//store in the db.json file
$userExist = DbHandler::isUserNameExist($username);
if ($userExist) {
    Logger::logVisit(null, "register", "POST", "username already exists");
    Router::redirect("register?error-username=the Username Already Exists");
}
DbHandler::saveUser($email, $username, $user_password);

// set the cookies
UserCookieHandler::setUsernameCookie($username);
UserCookieHandler::setEmailCookie($email);

// redirect to the home 
Logger::logVisit(null, "register", "POST");
Router::redirect("");

?>