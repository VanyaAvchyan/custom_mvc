<?php
namespace app\views;
class View
{
    /**
     * Rendering view
     * 
     * @param string $path view path Separated by a slash
     */
    public static function render($path, $vars=[])
    {
        $path = __NAMESPACE__.'/'.$path.'.php';
        $layoutPath = __NAMESPACE__.'/layout.php';

        $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);
        $layoutPath = str_replace('\\', DIRECTORY_SEPARATOR, $layoutPath);


        if(!file_exists($path))
            throw new \Exception ('View '.$path.' not found');
        extract($vars);
        $_content = $path;
        ob_start();
            include $layoutPath;
        ob_end_flush();
        
    }
}