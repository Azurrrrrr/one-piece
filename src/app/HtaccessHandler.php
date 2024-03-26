<?php

class HtaccessHandler {

    private const HTACCESS_FILE = '.htaccess';

    public static function setHtaccess() : void {
        if (!file_exists(self::HTACCESS_FILE)) {
            $apppath = str_replace('\\', '/', APPROOT);
            $projectBase = str_replace($_SERVER['DOCUMENT_ROOT'], '', $apppath);
            
            $htaccessContent = <<<EOD
            RewriteEngine On
            
            RewriteBase $projectBase
            RewriteRule \.(webp|jpg|jpeg|png|gif|css|js)$ - [L]
    
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            RewriteRule ^(.*)$ index.php [L]
            EOD;
            
            file_put_contents(self::HTACCESS_FILE, $htaccessContent);
        }
    }


    public static function getHtaccessContent() : ?string {
        if (file_exists(self::HTACCESS_FILE)) {
            return file_get_contents(self::HTACCESS_FILE);
        }
        return null;
    }
}

?>