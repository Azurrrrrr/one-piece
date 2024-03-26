<?php

class Logger {
    private const LOG_FILE =  APPROOT . '/src/files/log.txt';


    public static function logVisit($userName, $link, $method, $errors = '') {
        $logMessage = self::getLogMessage($userName, $link, $method, $errors);
        self::writeToLogFile($logMessage);
    }

    private static function getLogMessage($userName, $link, $method, $errors) {
        date_default_timezone_set('UTC');
        $timestamp = date('Y-m-d H:i:s');
        $host = $_SERVER['HTTP_HOST'];
        $visitor = isset($userName) ? $userName : 'Guest';

        $userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'Unknown';
        $browser = self::getBrowser($userAgent);
        $os = self::getOS($userAgent);

        $connectionTime = isset($_SESSION['connection_time']) ? $_SESSION['connection_time'] : '';
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        
        $finalLink = '<<'. $method . ' ' . $link . '>>';
        $finallErrors = '<<' . $errors . '>>';

        $logMessage = "$timestamp | Host: $host | path: $finalLink | Errors: $finallErrors | User: $visitor | Browser: $browser | OS: $os | Connection Time: $connectionTime | IP Address: $ipAddress \n";
        return $logMessage;
    }

    private static function writeToLogFile($logMessage) {
        if (!file_exists(self::LOG_FILE)) {
            $logFile = fopen(self::LOG_FILE, 'w');
            fclose($logFile);
        }
    
        file_put_contents(self::LOG_FILE, $logMessage, FILE_APPEND);
    }

    private static function getBrowser($userAgent) {
        // Parse the user agent string to extract browser information
        // Example implementation, you might need to extend this for more accurate browser detection
        if (preg_match('/(MSIE|Trident)/i', $userAgent)) {
            return 'Internet Explorer';
        } elseif (preg_match('/Firefox/i', $userAgent)) {
            return 'Firefox';
        } elseif (preg_match('/Chrome/i', $userAgent)) {
            return 'Chrome';
        } elseif (preg_match('/Safari/i', $userAgent)) {
            return 'Safari';
        } elseif (preg_match('/Opera/i', $userAgent)) {
            return 'Opera';
        } else {
            return 'Unknown';
        }
    }

    private static function getOS($userAgent) {
        // Parse the user agent string to extract OS information
        // Example implementation, you might need to extend this for more accurate OS detection
        if (preg_match('/Windows/i', $userAgent)) {
            return 'Windows';
        } elseif (preg_match('/Macintosh|Mac OS/i', $userAgent)) {
            return 'Mac OS';
        } elseif (preg_match('/Linux/i', $userAgent)) {
            return 'Linux';
        } elseif (preg_match('/Android/i', $userAgent)) {
            return 'Android';
        } elseif (preg_match('/iOS/i', $userAgent)) {
            return 'iOS';
        } else {
            return 'Unknown';
        }
    }
}

?>
