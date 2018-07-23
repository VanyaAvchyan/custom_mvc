<?php
namespace app;
use app\controllers;
class Application
{
    private static $_instance = null;
    private function __construct() {}
    private function __clone() {}
    public static function getInstance()
    {
        if(self::$_instance === null)
            self::$_instance = new self();
        return self::$_instance;
    }

    /*
     * We disassemble the URL into parts,
     * where the first part is controller
     * and second parts is action.
     * And the rest is action params
     * 
     * @return void
     */
    public function render ()
    {
        $uri_path = parse_url(trim($_SERVER['REQUEST_URI'],'/'), PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);

        if(!empty($uri_segments[0]) && $uri_segments[0] == 'index.php')
        {
            unset($uri_segments[0]);
            $uri_segments = array_values($uri_segments);
        }
        
        $namespace = '\app\controllers\\';
        $controller = $namespace.'DefaultController';
        $action = 'indexAction';
        $params = [];
        if($uri_segments = array_filter($uri_segments))
        {
            for($i = 0, $cnt = count($uri_segments); $i < $cnt; $i ++)
            {
                if($i === 0)
                    $controller = $namespace.$uri_segments[$i].'Controller';
                elseif($i === 1)
                    $action = $uri_segments[$i].'Action';
                else {
                    if($i%2)
                        $params[] = $uri_segments[$i];
                }
            }
        }
        return (new \ReflectionMethod($controller, $action))->invokeArgs(new $controller, $params);
    }
}

