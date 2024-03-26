<?php 

class Router {

    /**
     * Loads a view file
     * @param  string $view Example: 'index', 'about', 'contact'
     * @return void
     */
    public function getView(string $urlPath) : array {
        $main = APPROOT . '/src/views/Index/main/' . ltrim($urlPath, '/') . '.php';
        $head = APPROOT . '/src/views/Index/head/' . ltrim($urlPath, '/') . '.php';

        if (is_readable($main)){
            return [
                'main' => $main,
                'head' => is_readable($head) ? $head : null 
            ];
        } else {            
            return [
                'main' => APPROOT . '/src/views/Index/404.php',
                'head' => is_readable($head) ? $head : null
            ];
        }
    }
    

    /**
     * Get URI path.
     * @return string $uri  Sanitized URI
     */
    public function getUri() : string {
        $url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $pos = strpos($url, BASEURL);
        return substr($url, $pos + strlen(BASEURL));
    }


    public static function redirect(string $url) {
        header("Location: " . '/' . BASEURL . '/' . $url);
        exit();
    }

}

?>