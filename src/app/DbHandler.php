<?php 

class DbHandler {
    private const DB_FILE = APPROOT . '/src/files/db.json';

    public const USER_EMAIL = 'email';
    public const USER_NAME = 'username';
    public const USER_PASSWORD = 'password';


    public static function getDb() {
        return json_decode(file_get_contents(self::DB_FILE), true);
    }

    public static function saveUser(string $email, string $username, string $password) {
        if (!self::isDbFileExist()) {
            self::createDbFile();
        } 

        $users = self::getDb();
        $users[] = [
            self::USER_EMAIL => $email,
            self::USER_NAME => $username,
            self::USER_PASSWORD => password_hash($password, PASSWORD_DEFAULT)
        ];

        file_put_contents(self::DB_FILE, json_encode($users));
    }

    public static function isUserNameExist(string $username) {
        $db = self::getDb();
        foreach ($db as $user) {
            if ($user[self::USER_NAME] === $username) {
                return true;
            }
        }
        return false;
    }

    public static function getUser(string $username, string $password) {
        $db = self::getDb();
        foreach ($db as $user) {
            if ($user[self::USER_NAME] === $username && password_verify($password, $user[self::USER_PASSWORD])) {
                return $user;
            }
        }
        return null;
    }


    private static function createDbFile() {
        file_put_contents(self::DB_FILE, '[]');
    }

    private static function isDbFileExist() {
        return file_exists(self::DB_FILE);
    }
}

?> 