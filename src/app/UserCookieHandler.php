<?php 

class UserCookieHandler {
    // Set the cookie expiration time to 30 days
    private const COOKIE_EXPIRATION = 2592000; // 30 * 24 * 60 * 60 seconds

    private const USERNAME_COOKIE_NAME = 'username';
    private const EMAIL_COOKIE_NAME = 'email';



    public static function getUsernameCookie() {
        return self::getCookie(self::USERNAME_COOKIE_NAME);
    }

    public static function getEmailCookie() {
        return self::getCookie(self::EMAIL_COOKIE_NAME);
    }


    public static function setUsernameCookie($username) {
        self::setCookie(self::USERNAME_COOKIE_NAME, $username);
    }


    public static function setEmailCookie($email) {
        self::setCookie(self::EMAIL_COOKIE_NAME, $email);
    }

    public static function deleteAllCookies() {
        self::deleteCookie(self::USERNAME_COOKIE_NAME);
        self::deleteCookie(self::EMAIL_COOKIE_NAME);
    }



    private static function getCookie($name) {
        return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
    } 
    private static function setCookie($name, $value) {
        setcookie($name, $value, time() + self::COOKIE_EXPIRATION, '/');
    }

    private static function deleteCookie($name) {
        setcookie($name, '', time() - 3600, '/');
    }
}

?>